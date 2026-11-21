import * as THREE from 'three';
import { RoomEnvironment } from 'three/examples/jsm/environments/RoomEnvironment.js';

/**
 * Builds a mathematically faceted 58-facet style Round Brilliant Diamond geometry
 * with flat normals so every crown (34.5°) and pavilion (40.8°) facet sparkles sharply.
 */
function createBrilliantDiamondGeometry() {
    const segments = 16; // 16-fold radial symmetry producing 64 crisp crystal facets
    const positions = [];

    // Ring Y heights and radii matching GIA Ideal Cut proportions (Crown 34.5°, Pavilion 40.8°)
    const yTable = 0.56;
    const rTable = 0.56;

    const yCrownMid = 0.31;
    const rCrownMid = 0.84;

    const yGirdleTop = 0.045;
    const yGirdleBot = -0.045;
    const rGirdle = 1.04;

    const yPavMid = -0.36;
    const rPavMid = 0.58;

    const yCulet = -0.88;

    const pt = (r, theta, y) => [r * Math.cos(theta), y, r * Math.sin(theta)];
    const pushTri = (a, b, c) => {
        positions.push(a[0], a[1], a[2], b[0], b[1], b[2], c[0], c[1], c[2]);
    };

    const step = (Math.PI * 2) / segments;
    const halfStep = step * 0.5;

    for (let i = 0; i < segments; i++) {
        const a0 = i * step;
        const a1 = (i + 1) * step;
        const aMid = a0 + halfStep;
        const aPrevMid = a0 - halfStep;

        // 1. Flat octagonal/16-sided Table top fan
        const centerTop = [0, yTable, 0];
        const t0 = pt(rTable, a0, yTable);
        const t1 = pt(rTable, a1, yTable);
        pushTri(centerTop, t1, t0);

        // 2. Star & Bezel Crown facets (Table -> CrownMid staggered -> GirdleTop)
        const cmMid = pt(rCrownMid, aMid, yCrownMid);
        const cmPrev = pt(rCrownMid, aPrevMid, yCrownMid);
        const gt0 = pt(rGirdle, a0, yGirdleTop);
        const gt1 = pt(rGirdle, a1, yGirdleTop);

        // Star facet triangle
        pushTri(t0, t1, cmMid);
        // Upper bezel kite split into 2 crisp triangles
        pushTri(t0, cmMid, gt0);
        pushTri(t0, gt0, cmPrev);
        // Upper girdle facet
        pushTri(cmMid, t1, gt1);

        // 3. Faceted Girdle belt
        const gb0 = pt(rGirdle, a0, yGirdleBot);
        const gb1 = pt(rGirdle, a1, yGirdleBot);
        pushTri(gt0, gt1, gb1);
        pushTri(gt0, gb1, gb0);

        // 4. Lower Girdle & Pavilion Main facets (40.8° Pavilion Cone)
        const pmMid = pt(rPavMid, aMid, yPavMid);
        const pmPrev = pt(rPavMid, aPrevMid, yPavMid);
        const culet = [0, yCulet, 0];

        pushTri(gb0, gb1, pmMid);
        pushTri(gb0, pmMid, pmPrev);
        pushTri(pmPrev, pmMid, culet);
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.Float32BufferAttribute(positions, 3));
    geometry.computeVertexNormals();
    return geometry;
}

/**
 * Builds KIRA's signature 18K Champagne Gold "The Lotus Crown Solitaire" 3D object:
 * - 58-Facet GIA D-Color Round Brilliant Diamond with internal prism refraction
 * - 8 Sculpted 18K Champagne Gold Lotus Petals cradling the pavilion with 360° light windows
 * - Hidden 18K Gold gallery rail, lotus calyx collar, and upper cathedral solitaire shoulders
 * - Floating sacred geometry compass ring
 */
function buildLotusCrownModel(goldMaterial, platinumMaterial, diamondMaterial, diamondCoreMaterial) {
    const root = new THREE.Group();

    // 1. Primary 58-Facet Round Brilliant Diamond (situated in the lotus crown)
    const diamondGeo = createBrilliantDiamondGeometry();
    const diamondGroup = new THREE.Group();
    diamondGroup.position.y = 0.42;

    const diamondOuter = new THREE.Mesh(diamondGeo, diamondMaterial);
    diamondGroup.add(diamondOuter);

    // Internal high-fire refractive core for brilliant sparkle depth
    const diamondCore = new THREE.Mesh(diamondGeo, diamondCoreMaterial);
    diamondCore.scale.set(0.92, 0.92, 0.92);
    diamondGroup.add(diamondCore);

    // Subtle crisp facet edge highlights
    const facetEdges = new THREE.EdgesGeometry(diamondGeo, 14);
    const facetLines = new THREE.LineSegments(
        facetEdges,
        new THREE.LineBasicMaterial({
            color: 0xfff3d1,
            transparent: true,
            opacity: 0.28,
        })
    );
    diamondGroup.add(facetLines);
    root.add(diamondGroup);

    // 2. 18K Champagne Gold Sculpted Lotus Petal Crown Gallery (8 interwoven petals)
    const petalsGroup = new THREE.Group();
    const petalCount = 8;

    for (let i = 0; i < petalCount; i++) {
        const isPrimary = i % 2 === 0;
        const baseAngle = (i / petalCount) * Math.PI * 2;
        const spread = isPrimary ? 0.24 : 0.19;
        const reachY = isPrimary ? 0.52 : 0.44;
        const flareR = isPrimary ? 1.12 : 1.05;

        // Each lotus petal arch consists of left and right sculpted gold ribs meeting at a claw tip
        [-1, 1].forEach((side) => {
            const p0 = new THREE.Vector3(
                0.44 * Math.cos(baseAngle + side * 0.06),
                -0.54,
                0.44 * Math.sin(baseAngle + side * 0.06)
            );
            const p1 = new THREE.Vector3(
                0.86 * Math.cos(baseAngle + side * spread),
                -0.18,
                0.86 * Math.sin(baseAngle + side * spread)
            );
            const p2 = new THREE.Vector3(
                flareR * Math.cos(baseAngle + side * (spread * 0.55)),
                0.20,
                flareR * Math.sin(baseAngle + side * (spread * 0.55))
            );
            const p3 = new THREE.Vector3(
                1.02 * Math.cos(baseAngle),
                reachY,
                1.02 * Math.sin(baseAngle)
            );

            const curve = new THREE.CatmullRomCurve3([p0, p1, p2, p3]);
            const tubeGeo = new THREE.TubeGeometry(curve, 28, isPrimary ? 0.044 : 0.035, 14, false);
            const ribMesh = new THREE.Mesh(tubeGeo, goldMaterial);
            petalsGroup.add(ribMesh);
        });

        // Sculpted eagle-claw prong tip embracing the diamond girdle
        const tipGeo = new THREE.ConeGeometry(isPrimary ? 0.056 : 0.045, 0.17, 14);
        const tipMesh = new THREE.Mesh(tipGeo, isPrimary ? goldMaterial : platinumMaterial);
        tipMesh.position.set(
            1.01 * Math.cos(baseAngle),
            reachY + 0.04,
            1.01 * Math.sin(baseAngle)
        );
        // Tilt claw tip inward toward the diamond crown table
        tipMesh.lookAt(0, reachY + 0.32, 0);
        tipMesh.rotateX(Math.PI * 0.5);
        petalsGroup.add(tipMesh);
    }
    root.add(petalsGroup);

    // 3. Hidden 18K Gold Gallery Rail & Lotus Calyx Collar Base
    const upperGalleryRail = new THREE.Mesh(
        new THREE.TorusGeometry(0.92, 0.036, 18, 64),
        goldMaterial
    );
    upperGalleryRail.rotation.x = Math.PI * 0.5;
    upperGalleryRail.position.y = 0.05;
    root.add(upperGalleryRail);

    const lowerCalyxCollar = new THREE.Mesh(
        new THREE.TorusGeometry(0.46, 0.062, 20, 64),
        goldMaterial
    );
    lowerCalyxCollar.rotation.x = Math.PI * 0.5;
    lowerCalyxCollar.position.y = -0.55;
    root.add(lowerCalyxCollar);

    const innerCollarBezel = new THREE.Mesh(
        new THREE.TorusGeometry(0.38, 0.03, 16, 48),
        platinumMaterial
    );
    innerCollarBezel.rotation.x = Math.PI * 0.5;
    innerCollarBezel.position.y = -0.48;
    root.add(innerCollarBezel);

    // 4. Sweeping 18K Champagne Gold Cathedral Solitaire Ring Band & Micro-Pavé Accents
    const ringBandGroup = new THREE.Group();
    const ringRadius = 1.42;
    const ringCenterY = -1.96;

    const mainShank = new THREE.Mesh(
        new THREE.TorusGeometry(ringRadius, 0.095, 24, 96, Math.PI * 1.72),
        goldMaterial
    );
    mainShank.rotation.z = -Math.PI * 0.36;
    mainShank.position.y = ringCenterY;
    ringBandGroup.add(mainShank);

    // Cathedral Shoulder Arches connecting the ring shank smoothly to the Lotus Crown gallery
    [-1, 1].forEach((dir) => {
        const s0 = new THREE.Vector3(dir * 1.24, -1.24, 0);
        const s1 = new THREE.Vector3(dir * 1.02, -0.78, 0);
        const s2 = new THREE.Vector3(dir * 0.72, -0.42, 0);
        const s3 = new THREE.Vector3(dir * 0.46, -0.52, 0);
        const shoulderCurve = new THREE.CatmullRomCurve3([s0, s1, s2, s3]);
        const shoulderGeo = new THREE.TubeGeometry(shoulderCurve, 24, 0.078, 16, false);
        const shoulderMesh = new THREE.Mesh(shoulderGeo, goldMaterial);
        ringBandGroup.add(shoulderMesh);

        // Micro-pavé diamond accents along each cathedral shoulder
        for (let p = 0; p < 5; p++) {
            const t = 0.14 + p * 0.15;
            const pos = shoulderCurve.getPoint(t);
            const paveGem = new THREE.Mesh(
                new THREE.OctahedronGeometry(0.052, 0),
                diamondMaterial
            );
            paveGem.position.set(pos.x + dir * 0.055, pos.y + 0.045, pos.z);
            ringBandGroup.add(paveGem);
        }
    });

    root.add(ringBandGroup);

    // 5. Subtle Floating Golden Sacred Geometry Orbit Ring
    const haloRing = new THREE.Mesh(
        new THREE.TorusGeometry(1.48, 0.009, 12, 96),
        new THREE.MeshBasicMaterial({
            color: 0xe6c587,
            transparent: true,
            opacity: 0.36,
        })
    );
    haloRing.rotation.x = Math.PI * 0.42;
    haloRing.rotation.y = Math.PI * 0.12;
    haloRing.position.y = 0.18;
    root.add(haloRing);

    return { root, diamondGroup, petalsGroup, haloRing };
}

export function initLotusCrown3D() {
    const stage = document.getElementById('lotus-3d-stage');
    const canvasHost = document.getElementById('lotus-3d-canvas-host');
    if (!stage || !canvasHost) return;

    const degEl = document.getElementById('lotus-3d-deg');
    const sliderEl = document.getElementById('lotus-3d-slider');
    const autoBtn = document.getElementById('lotus-3d-auto-btn');
    const autoDot = document.getElementById('lotus-3d-auto-dot');
    const autoText = document.getElementById('lotus-3d-auto-text');
    const resetBtn = document.getElementById('lotus-3d-reset-btn');
    const fallbackEl = document.getElementById('lotus-3d-fallback');

    let renderer;
    try {
        renderer = new THREE.WebGLRenderer({
            antialias: true,
            alpha: true,
            powerPreference: 'high-performance',
        });
    } catch {
        if (fallbackEl) fallbackEl.classList.remove('hidden');
        return;
    }

    renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.28;
    renderer.outputColorSpace = THREE.SRGBColorSpace;

    canvasHost.innerHTML = '';
    canvasHost.appendChild(renderer.domElement);
    renderer.domElement.className = 'w-full h-full block';

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(34, 1, 0.1, 50);
    camera.position.set(0, 0.55, 5.15);
    camera.lookAt(0, -0.08, 0);

    // Procedural Studio Environment Map for authentic 18K Gold & Diamond Reflections
    const pmremGenerator = new THREE.PMREMGenerator(renderer);
    const roomEnv = new RoomEnvironment();
    const envTexture = pmremGenerator.fromScene(roomEnv, 0.035).texture;
    scene.environment = envTexture;
    roomEnv.dispose();
    pmremGenerator.dispose();

    // Luxury PBR Materials
    const goldMaterial = new THREE.MeshPhysicalMaterial({
        color: new THREE.Color(0xdcb368),
        metalness: 0.96,
        roughness: 0.14,
        clearcoat: 0.65,
        clearcoatRoughness: 0.1,
        reflectivity: 1.0,
        envMapIntensity: 2.15,
    });

    const platinumMaterial = new THREE.MeshPhysicalMaterial({
        color: new THREE.Color(0xf0f4fa),
        metalness: 0.98,
        roughness: 0.09,
        clearcoat: 0.8,
        envMapIntensity: 2.3,
    });

    const diamondMaterial = new THREE.MeshPhysicalMaterial({
        color: new THREE.Color(0xffffff),
        metalness: 0.02,
        roughness: 0.015,
        transmission: 0.92,
        ior: 2.417, // GIA Natural Diamond Refractive Index
        thickness: 2.1,
        reflectivity: 1.0,
        clearcoat: 1.0,
        clearcoatRoughness: 0.01,
        specularIntensity: 1.0,
        specularColor: new THREE.Color(0xfff5dc),
        envMapIntensity: 2.85,
        flatShading: true,
    });

    if ('dispersion' in diamondMaterial) {
        diamondMaterial.dispersion = 0.065;
    }

    const diamondCoreMaterial = new THREE.MeshPhysicalMaterial({
        color: new THREE.Color(0xffe7b3),
        metalness: 0.82,
        roughness: 0.06,
        envMapIntensity: 2.5,
        transparent: true,
        opacity: 0.24,
        side: THREE.BackSide,
        flatShading: true,
    });

    const { root, diamondGroup, haloRing } = buildLotusCrownModel(
        goldMaterial,
        platinumMaterial,
        diamondMaterial,
        diamondCoreMaterial
    );
    root.position.y = 0.08;
    scene.add(root);

    // Floating Golden Sparkle Dust in 3D Space
    const dustCount = 28;
    const dustPositions = new Float32Array(dustCount * 3);
    for (let i = 0; i < dustCount; i++) {
        const r = 1.45 + Math.random() * 0.95;
        const theta = Math.random() * Math.PI * 2;
        const y = -0.9 + Math.random() * 1.9;
        dustPositions[i * 3] = r * Math.cos(theta);
        dustPositions[i * 3 + 1] = y;
        dustPositions[i * 3 + 2] = r * Math.sin(theta);
    }
    const dustGeo = new THREE.BufferGeometry();
    dustGeo.setAttribute('position', new THREE.BufferAttribute(dustPositions, 3));
    const dustPoints = new THREE.Points(
        dustGeo,
        new THREE.PointsMaterial({
            color: 0xe6c587,
            size: 0.042,
            transparent: true,
            opacity: 0.65,
        })
    );
    scene.add(dustPoints);

    // Studio Key, Fill & Rim Lights
    const ambientLight = new THREE.AmbientLight(0xfff6e5, 0.75);
    scene.add(ambientLight);

    const keyLight = new THREE.DirectionalLight(0xffe7b8, 2.8);
    keyLight.position.set(3.5, 4.5, 4.0);
    scene.add(keyLight);

    const topBrillianceLight = new THREE.PointLight(0xffffff, 4.2, 12);
    topBrillianceLight.position.set(0, 3.2, 1.8);
    scene.add(topBrillianceLight);

    const rimLight = new THREE.DirectionalLight(0x9ec5ff, 1.75);
    rimLight.position.set(-3.5, 1.5, -3.2);
    scene.add(rimLight);

    const warmUnderLight = new THREE.PointLight(0xc99a49, 2.4, 8);
    warmUnderLight.position.set(0, -1.8, 1.6);
    scene.add(warmUnderLight);

    // Responsive Resize Handler
    function updateSize() {
        const rect = canvasHost.getBoundingClientRect();
        const w = Math.max(260, rect.width || 460);
        const h = Math.max(220, rect.height || 340);
        renderer.setSize(w, h, false);
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
    }
    updateSize();
    window.addEventListener('resize', updateSize, { passive: true });

    // Rotation & Scroll State ("Bisa digulir mahkotanya")
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let userYaw = 0.35; // Manual drag + slider yaw (radians)
    let targetUserYaw = 0.35;
    let userPitch = 0.22; // Manual drag pitch (radians)
    let targetUserPitch = 0.22;
    let scrollYawOffset = 0; // Scroll-driven rotation offset
    let targetScrollYawOffset = 0;
    let isAutoSpin = !prefersReducedMotion;
    let isDragging = false;
    let lastPointerX = 0;
    let lastPointerY = 0;
    let isInViewport = true;

    function syncSliderAndHud(totalYawRad) {
        const normDeg = (((Math.round((totalYawRad * 180) / Math.PI) % 360) + 360) % 360);
        if (degEl) {
            degEl.textContent = `${normDeg}°`;
        }
        if (sliderEl && !isDragging) {
            sliderEl.value = String(normDeg);
            const pct = (normDeg / 360) * 100;
            sliderEl.style.setProperty('--slider-pct', `${pct}%`);
        }
    }

    function setAutoSpinState(enabled) {
        isAutoSpin = enabled;
        if (autoBtn && autoDot && autoText) {
            autoBtn.setAttribute('aria-pressed', enabled ? 'true' : 'false');
            if (enabled) {
                autoBtn.classList.remove('bg-[#FAF8F3]', 'text-[#0F1E2E]', 'border-[#E5DEC9]');
                autoBtn.classList.add('bg-[#0F1E2E]', 'text-[#E6C587]', 'border-[#C99A49]');
                autoDot.classList.add('animate-pulse', 'bg-[#E6C587]');
                autoDot.classList.remove('bg-[#C99A49]');
                autoText.textContent = 'Orbit 3D Aktif';
            } else {
                autoBtn.classList.remove('bg-[#0F1E2E]', 'text-[#E6C587]', 'border-[#C99A49]');
                autoBtn.classList.add('bg-[#FAF8F3]', 'text-[#0F1E2E]', 'border-[#E5DEC9]');
                autoDot.classList.remove('animate-pulse', 'bg-[#E6C587]');
                autoDot.classList.add('bg-[#C99A49]');
                autoText.textContent = 'Putar Otomatis';
            }
        }
    }
    setAutoSpinState(isAutoSpin);

    // 1. Page Scroll Listener -> Smoothly rotates the 3D Lotus Crown as user scrolls page
    function onWindowScroll() {
        const rect = stage.getBoundingClientRect();
        const vh = window.innerHeight || 800;
        const progress = 1 - (rect.top + rect.height * 0.5) / (vh + rect.height);
        const clamped = Math.max(-0.5, Math.min(1.5, progress));
        targetScrollYawOffset = clamped * Math.PI * 1.45;
    }
    window.addEventListener('scroll', onWindowScroll, { passive: true });
    onWindowScroll();

    // 2. Direct Pointer Drag / Touch Gesture on 3D Stage
    stage.addEventListener('pointerdown', (e) => {
        if (e.target.closest('button') || e.target.closest('input')) return;
        isDragging = true;
        lastPointerX = e.clientX;
        lastPointerY = e.clientY;
        try {
            stage.setPointerCapture(e.pointerId);
        } catch {
            // Safe ignore
        }
    });

    stage.addEventListener('pointermove', (e) => {
        if (!isDragging) return;
        const dx = e.clientX - lastPointerX;
        const dy = e.clientY - lastPointerY;
        lastPointerX = e.clientX;
        lastPointerY = e.clientY;

        targetUserYaw += dx * 0.013;
        targetUserPitch = Math.max(-0.35, Math.min(0.68, targetUserPitch + dy * 0.008));
    });

    const stopDrag = () => {
        isDragging = false;
    };
    stage.addEventListener('pointerup', stopDrag);
    stage.addEventListener('pointercancel', stopDrag);

    // 3. Horizontal Wheel / Trackpad Gesture on Stage (when Shift or horizontal scroll is used)
    stage.addEventListener(
        'wheel',
        (e) => {
            if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
                e.preventDefault();
                targetUserYaw += e.deltaX * 0.008;
            }
        },
        { passive: false }
    );

    // 4. Range Scrubber Slider for Direct Crown Rotation ("Gulir Mahkota")
    if (sliderEl) {
        sliderEl.addEventListener('input', () => {
            if (isAutoSpin) setAutoSpinState(false);
            const deg = parseFloat(sliderEl.value || '0');
            const pct = (deg / 360) * 100;
            sliderEl.style.setProperty('--slider-pct', `${pct}%`);
            targetUserYaw = (deg * Math.PI) / 180 - scrollYawOffset;
        });
    }

    if (autoBtn) {
        autoBtn.addEventListener('click', () => {
            setAutoSpinState(!isAutoSpin);
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            targetUserYaw = 0.35 - scrollYawOffset;
            targetUserPitch = 0.22;
        });
    }

    // Pause WebGL render loop when off-screen for zero wasted resources
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    isInViewport = entry.isIntersecting;
                });
            },
            { threshold: 0.02 }
        );
        io.observe(stage);
    }

    let lastTime = performance.now();
    function renderLoop(now) {
        requestAnimationFrame(renderLoop);
        if (!isInViewport) {
            lastTime = now;
            return;
        }

        const dt = Math.min(0.05, (now - lastTime) / 1000);
        lastTime = now;

        if (isAutoSpin && !isDragging) {
            targetUserYaw += dt * 0.52;
        }

        // Smooth damping interpolation
        userYaw += (targetUserYaw - userYaw) * 0.11;
        userPitch += (targetUserPitch - userPitch) * 0.11;
        scrollYawOffset += (targetScrollYawOffset - scrollYawOffset) * 0.09;

        const totalYaw = userYaw + scrollYawOffset;
        root.rotation.y = totalYaw;
        root.rotation.x = userPitch;

        // Subtle diamond micro-breathing & halo counter-rotation
        diamondGroup.rotation.y = -totalYaw * 0.18;
        haloRing.rotation.z += dt * 0.35;
        dustPoints.rotation.y -= dt * 0.12;

        syncSliderAndHud(totalYaw);
        renderer.render(scene, camera);
    }

    requestAnimationFrame(renderLoop);
}
