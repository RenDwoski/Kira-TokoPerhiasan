<?php

declare(strict_types=1);

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';

$rootUrl = rtrim(getenv('PAGES_ROOT_URL') ?: 'https://rendwoski.github.io/Kira-TokoPerhiasan', '/');
$basePath = rtrim(getenv('PAGES_BASE_PATH') ?: (parse_url($rootUrl, PHP_URL_PATH) ?: ''), '/');
$distDir = $projectRoot . '/dist';

// Ensure public/hot does not exist so @vite uses production public/build/manifest.json
$hotFile = $projectRoot . '/public/hot';
if (file_exists($hotFile)) {
    @unlink($hotFile);
}

$manifestFile = $projectRoot . '/public/build/manifest.json';
if (!file_exists($manifestFile)) {
    fwrite(STDERR, "ERROR: public/build/manifest.json not found. Run `npm run build` first.\n");
    exit(1);
}

// Helper: recursively remove directory
function removeDirectory(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($items as $item) {
        if ($item->isDir()) {
            rmdir($item->getPathname());
        } else {
            unlink($item->getPathname());
        }
    }
    rmdir($dir);
}

// Helper: recursively copy directory
function copyDirectory(string $src, string $dst): void
{
    if (!is_dir($src)) {
        return;
    }
    if (!is_dir($dst)) {
        mkdir($dst, 0775, true);
    }
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($src, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($items as $item) {
        $targetPath = $dst . DIRECTORY_SEPARATOR . $items->getSubPathName();
        if ($item->isDir()) {
            if (!is_dir($targetPath)) {
                mkdir($targetPath, 0775, true);
            }
        } else {
            copy($item->getPathname(), $targetPath);
        }
    }
}

// Clean & create dist/
removeDirectory($distDir);
mkdir($distDir, 0775, true);

// Boot Laravel application
$app = require $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$routes = [
    '/' => 'index.html',
    '/about' => 'about/index.html',
    '/products' => 'products/index.html',
    '/gallery' => 'gallery/index.html',
    '/contact' => 'contact/index.html',
];

$escapedBasePath = str_replace('/', '\/', $basePath);
$scheme = parse_url($rootUrl, PHP_URL_SCHEME) ?: 'https';

echo "Exporting KIRA static site to dist/ (rootUrl={$rootUrl}, basePath={$basePath})\n";

foreach ($routes as $uri => $outputFile) {
    // Configure URL & asset root before each request
    $app['config']->set('app.url', $rootUrl);
    $app['config']->set('app.asset_url', $rootUrl);
    $app['config']->set('session.driver', 'array');
    $app['config']->set('cache.default', 'array');

    $request = Request::create($uri, 'GET');
    $app->instance('request', $request);

    URL::forceRootUrl($rootUrl);
    URL::forceScheme($scheme);

    $response = $kernel->handle($request);
    $status = $response->getStatusCode();

    if ($status !== 200) {
        fwrite(STDERR, "ERROR: Route {$uri} returned HTTP {$status}\n");
        exit(1);
    }

    $html = (string) $response->getContent();
    $kernel->terminate($request, $response);

    // Rewrite root-relative /assets/kira/ references for GitHub Pages subpath hosting
    if ($basePath !== '') {
        $html = str_replace(
            ['"/assets/kira/', "'/assets/kira/", '\/assets\/kira\/'],
            ['"' . $basePath . '/assets/kira/', "'" . $basePath . '/assets/kira/', $escapedBasePath . '\/assets\/kira\/'],
            $html
        );
    }

    $targetPath = $distDir . '/' . $outputFile;
    $targetDir = dirname($targetPath);
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0775, true);
    }

    file_put_contents($targetPath, $html);
    echo "  ✓ {$uri} -> dist/{$outputFile} (" . strlen($html) . " bytes)\n";
}

// Copy static assets and Vite build output
copyDirectory($projectRoot . '/public/build', $distDir . '/build');
copyDirectory($projectRoot . '/public/assets', $distDir . '/assets');

foreach (['favicon.ico', 'robots.txt'] as $publicFile) {
    if (file_exists($projectRoot . '/public/' . $publicFile)) {
        copy($projectRoot . '/public/' . $publicFile, $distDir . '/' . $publicFile);
    }
}

// Disable Jekyll on GitHub Pages and provide 404 fallback
file_put_contents($distDir . '/.nojekyll', '');
copy($distDir . '/index.html', $distDir . '/404.html');

echo "Static export complete!\n";
