<?php

use App\Data\KiraCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = KiraCatalog::products();
    $featured = array_values(array_filter($products, fn ($p) => $p['featured']));

    return view('home', [
        'featuredProducts' => $featured,
        'allProducts' => $products,
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/products', function (Request $request) {
    $products = KiraCatalog::products();
    $selectedId = $request->query('item', 'lotus-crown-solitaire');
    $selectedCategory = $request->query('category', 'all');

    $selectedProduct = collect($products)->firstWhere('id', $selectedId) ?? $products[0];

    return view('products', [
        'products' => $products,
        'selectedProduct' => $selectedProduct,
        'selectedCategory' => $selectedCategory,
    ]);
})->name('products');

Route::get('/gallery', function () {
    return view('gallery', [
        'lookbookItems' => KiraCatalog::lookbookItems(),
        'products' => KiraCatalog::products(),
    ]);
})->name('gallery');

Route::get('/contact', function (Request $request) {
    $products = KiraCatalog::products();
    $preselectedCollection = $request->query('collection', 'The Lotus Crown Solitaire');

    return view('contact', [
        'products' => $products,
        'faqs' => KiraCatalog::faqs(),
        'preselectedCollection' => $preselectedCollection,
        'bookingConfirmation' => session('booking_confirmation'),
    ]);
})->name('contact');

Route::post('/contact/book', function (Request $request) {
    $validated = $request->validate([
        'full_name' => 'required|string|max:120',
        'email' => 'required|email|max:120',
        'whatsapp' => 'required|string|max:40',
        'collection' => 'required|string|max:150',
        'visit_date' => 'required|string|max:60',
        'time_slot' => 'required|string|max:80',
        'notes' => 'nullable|string|max:500',
    ]);

    $products = KiraCatalog::products();
    $matchedProduct = collect($products)->first(function ($p) use ($validated) {
        return str_contains(strtolower($validated['collection']), strtolower($p['name']))
            || $validated['collection'] === $p['name'];
    }) ?? $products[0];

    $bookingCode = '#KIRA-VIP-2026-' . str_pad((string) rand(89, 989), 3, '0', STR_PAD_LEFT);

    $confirmation = [
        'code' => $bookingCode,
        'full_name' => $validated['full_name'],
        'email' => $validated['email'],
        'whatsapp' => $validated['whatsapp'],
        'collection' => $matchedProduct['name'] . ' (' . $matchedProduct['carat'] . ')',
        'gia_report' => $matchedProduct['gia_report'],
        'visit_date' => $validated['visit_date'],
        'time_slot' => $validated['time_slot'],
        'notes' => $validated['notes'] ?? 'Standar 18K Champagne Gold • Inspeksi Loupe 10x',
        'location' => 'KIRA Flagship Boutique, Plaza Indonesia Level 1 #108',
    ];

    return redirect()->route('contact', ['confirmed' => 1])
        ->with('booking_confirmation', $confirmation);
})->name('contact.book');
