import {
    animate as motionAnimate,
    inView,
    hover,
    press,
    stagger as motionStagger,
} from 'motion';
import {
    animate as animeAnimate,
    createDrawable,
    stagger as animeStagger,
} from 'animejs';
import { initLotusCrown3D } from './lotus-crown-3d.js';

// Expose libraries globally for modularity across KIRA pages
window.KiraMotion = {
    animate: motionAnimate,
    inView,
    hover,
    press,
    stagger: motionStagger,
};

window.KiraAnime = {
    animate: animeAnimate,
    createDrawable,
    stagger: animeStagger,
};

// =============================================================================
// PAGE 01: HOMEPAGE EXPERIENCE (Hero Warm 18K, 10x Loupe Zoom, Motion + 3D)
// =============================================================================
function initHomeExperience() {
    const heroStage = document.getElementById('hero-visual-stage');
    if (!heroStage) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let heroModes = {};
    try {
        heroModes = JSON.parse(heroStage.getAttribute('data-hero-modes') || '{}');
    } catch {
        heroModes = {};
    }

    // Preload all 3 hero mode images (Daylight, Warm 18K, 10x Loupe Macro)
    Object.values(heroModes).forEach((cfg) => {
        if (cfg && cfg.src) {
            const img = new Image();
            img.src = cfg.src;
        }
    });

    const stageLayer = document.getElementById('hero-stage-layer');
    const stageImg = document.getElementById('hero-stage-img');
    const hudReport = document.getElementById('hero-hud-report');
    const hudFire = document.getElementById('hero-hud-fire');
    const hudModeSub = document.getElementById('hero-hud-sub');
    const zoomBadge = document.getElementById('hero-zoom-factor');
    const hotspotBtn = document.getElementById('hero-diamond-hotspot');
    const loupeOverlay = document.getElementById('hero-loupe-overlay');
    const loupeSvg = document.getElementById('hero-loupe-svg');
    const lightBtns = Array.from(document.querySelectorAll('.hero-light-btn'));

    let currentMode = 'daylight';
    let isTransitioning = false;
    const zoomState = { val: 1.0 };

    // Continuous subtle orbital rotation on the 10x Loupe SVG lens ring via Anime.js
    if (loupeSvg && !prefersReducedMotion) {
        animeAnimate('#hero-loupe-ring-outer', {
            rotate: [0, 360],
            duration: 36000,
            ease: 'linear',
            loop: true,
        });
        animeAnimate('#hero-loupe-ring-inner', {
            rotate: [0, -360],
            duration: 48000,
            ease: 'linear',
            loop: true,
        });
    }

    function playLoupeReticleDraw() {
        if (!loupeSvg || prefersReducedMotion) return;
        try {
            const drawables = createDrawable('#hero-loupe-svg .loupe-draw-path');
            if (drawables && drawables.length) {
                animeAnimate(drawables, {
                    draw: ['0 0', '0 1'],
                    duration: 950,
                    delay: animeStagger(70),
                    ease: 'outQuad',
                });
            }
        } catch {
            // Safe fallback
        }
    }

    function animateZoomCounter(targetFactor) {
        if (!zoomBadge) return;
        if (prefersReducedMotion) {
            zoomState.val = targetFactor;
            zoomBadge.textContent = `${targetFactor.toFixed(1)}×`;
            return;
        }
        animeAnimate(zoomState, {
            val: targetFactor,
            duration: 620,
            ease: 'outExpo',
            onUpdate: () => {
                zoomBadge.textContent = `${zoomState.val.toFixed(1)}×`;
            },
        });
    }

    function setActiveModeButtons(mode) {
        lightBtns.forEach((b) => {
            const isTarget = b.getAttribute('data-hero-mode') === mode;
            b.setAttribute('aria-pressed', isTarget ? 'true' : 'false');
            if (isTarget) {
                b.className =
                    'hero-light-btn px-3.5 h-[30px] rounded-full bg-[#F7F4EE] text-[#0F1E2E] font-sans font-bold text-[10.5px] whitespace-nowrap shadow-xs transition-all cursor-pointer';
            } else {
                b.className =
                    'hero-light-btn px-3.5 h-[30px] rounded-full text-[#F7F4EE] hover:bg-white/15 font-sans font-bold text-[10.5px] whitespace-nowrap transition-all cursor-pointer';
            }
        });
    }

    function switchHeroMode(nextMode) {
        const cfg = heroModes[nextMode];
        if (!cfg || nextMode === currentMode || isTransitioning) return;

        const prevMode = currentMode;
        currentMode = nextMode;
        setActiveModeButtons(nextMode);

        // Update HUD text & Anime.js magnification counter
        if (hudReport) hudReport.textContent = cfg.report;
        if (hudFire) hudFire.textContent = cfg.fire;
        if (hudModeSub) hudModeSub.textContent = cfg.subtitle || '';
        animateZoomCounter(nextMode === 'loupe' ? 10.0 : 1.0);

        if (!stageImg || !stageLayer) return;

        if (prefersReducedMotion) {
            stageImg.src = cfg.src;
            stageLayer.style.transformOrigin = '50% 50%';
            stageLayer.style.transform = 'none';
            if (loupeOverlay) {
                loupeOverlay.classList.toggle('opacity-0', nextMode !== 'loupe');
                loupeOverlay.classList.toggle('opacity-100', nextMode === 'loupe');
            }
            if (hotspotBtn) {
                hotspotBtn.classList.toggle('opacity-0', nextMode === 'loupe');
                hotspotBtn.classList.toggle('pointer-events-none', nextMode === 'loupe');
            }
            return;
        }

        // CASE A: Entering 10x Loupe -> Camera Zoom-In toward focal diamond (41% 39%), then reveal macro detail!
        if (nextMode === 'loupe') {
            isTransitioning = true;
            if (hotspotBtn) {
                hotspotBtn.classList.add('opacity-0', 'pointer-events-none');
            }

            stageLayer.style.transformOrigin = '41% 39%';
            motionAnimate(
                stageLayer,
                { scale: [1, 2.35], opacity: [1, 0.18] },
                { duration: 0.28, ease: [0.32, 0, 0.67, 0] }
            ).then(() => {
                stageImg.src = cfg.src;
                stageLayer.style.transformOrigin = '50% 50%';

                if (loupeOverlay) {
                    loupeOverlay.classList.remove('opacity-0');
                    loupeOverlay.classList.add('opacity-100');
                }
                playLoupeReticleDraw();

                motionAnimate(
                    stageLayer,
                    { scale: [0.84, 1], opacity: [0.22, 1] },
                    { type: 'spring', stiffness: 230, damping: 23 }
                ).then(() => {
                    isTransitioning = false;
                });
            });
            return;
        }

        // CASE B: Leaving 10x Loupe back to Daylight or Warm 18K -> Smooth Zoom-Out
        if (prevMode === 'loupe') {
            isTransitioning = true;
            if (loupeOverlay) {
                loupeOverlay.classList.remove('opacity-100');
                loupeOverlay.classList.add('opacity-0');
            }

            stageImg.src = cfg.src;
            stageLayer.style.transformOrigin = '41% 39%';

            motionAnimate(
                stageLayer,
                { scale: [1.42, 1], opacity: [0.45, 1] },
                { type: 'spring', stiffness: 220, damping: 24 }
            ).then(() => {
                stageLayer.style.transformOrigin = '50% 50%';
                if (hotspotBtn) {
                    hotspotBtn.classList.remove('opacity-0', 'pointer-events-none');
                }
                isTransitioning = false;
            });
            return;
        }

        // CASE C: Switching between Daylight D-Color & Warm 18K -> Golden Atelier Cross-Transition
        stageImg.src = cfg.src;
        stageLayer.style.transformOrigin = '50% 50%';
        motionAnimate(
            stageLayer,
            { scale: [1.045, 1], opacity: [0.58, 1] },
            { type: 'spring', stiffness: 250, damping: 24 }
        );
    }

    lightBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            const mode = btn.getAttribute('data-hero-mode');
            if (mode) switchHeroMode(mode);
        });
    });

    // Clicking the focal diamond hotspot on the image directly triggers 10x Loupe zoom
    if (hotspotBtn) {
        hotspotBtn.addEventListener('click', () => {
            switchHeroMode('loupe');
        });
    }

    // Featured Collections Category Filter with Motion.dev Spring Reveal
    const filterBtns = Array.from(document.querySelectorAll('.home-filter-btn'));
    const productCards = Array.from(document.querySelectorAll('.home-product-card'));

    filterBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            const cat = btn.getAttribute('data-filter-category');

            filterBtns.forEach((b) => {
                b.className =
                    'home-filter-btn px-5 py-2 rounded-full text-[#243B53] hover:text-[#0F1E2E] font-sans font-bold text-[12px] transition-all cursor-pointer';
            });
            btn.className =
                'home-filter-btn px-5 py-2 rounded-full bg-white text-[#0F1E2E] font-sans font-bold text-[12px] shadow-2xs transition-all cursor-pointer';

            const visibleCards = [];
            productCards.forEach((card) => {
                const cardCat = card.getAttribute('data-product-category');
                if (cat === 'all' || cardCat === cat) {
                    card.classList.remove('hidden');
                    visibleCards.push(card);
                } else {
                    card.classList.add('hidden');
                }
            });

            if (visibleCards.length && !prefersReducedMotion) {
                motionAnimate(
                    visibleCards,
                    { opacity: [0, 1], y: [16, 0], scale: [0.97, 1] },
                    {
                        type: 'spring',
                        stiffness: 300,
                        damping: 24,
                        delay: motionStagger(0.06),
                    }
                );
            }
        });
    });

    // Anime.js Counters for Section 1.4 Warisan & Filosofi Optical Telemetry
    let homeCountersPlayed = false;
    function runHomeCounters() {
        if (homeCountersPlayed) return;
        homeCountersPlayed = true;
        document.querySelectorAll('[data-home-anime-counter]').forEach((el, idx) => {
            const target = parseFloat(el.getAttribute('data-target') || '0');
            const decimals = parseInt(el.getAttribute('data-decimals') || '0', 10);
            const prefix = el.getAttribute('data-prefix') || '';
            const suffix = el.getAttribute('data-suffix') || '';

            if (prefersReducedMotion) {
                el.textContent = `${prefix}${target.toFixed(decimals)}${suffix}`;
                return;
            }

            const state = { val: 0 };
            animeAnimate(state, {
                val: target,
                duration: 1200,
                delay: idx * 130,
                ease: 'outExpo',
                onUpdate: () => {
                    el.textContent = `${prefix}${state.val.toFixed(decimals)}${suffix}`;
                },
            });
        });
    }

    // Motion.dev Scroll Reveal & Tactile Hover/Press Physics across Homepage
    if (!prefersReducedMotion) {
        const heroItems = document.querySelectorAll('[data-home-hero-item]');
        if (heroItems.length) {
            motionAnimate(
                heroItems,
                { opacity: [0, 1], y: [22, 0] },
                {
                    duration: 0.68,
                    delay: motionStagger(0.085),
                    ease: [0.22, 1, 0.36, 1],
                }
            );
        }

        motionAnimate(
            heroStage,
            { opacity: [0, 1], y: [24, 0], scale: [0.98, 1] },
            { duration: 0.76, delay: 0.12, ease: [0.22, 1, 0.36, 1] }
        );

        document.querySelectorAll('[data-home-reveal-group]').forEach((group) => {
            inView(
                group,
                () => {
                    const items = group.querySelectorAll('[data-home-reveal-item]');
                    if (items.length) {
                        motionAnimate(
                            items,
                            { opacity: [0, 1], y: [22, 0] },
                            {
                                duration: 0.64,
                                delay: motionStagger(0.08),
                                ease: [0.22, 1, 0.36, 1],
                            }
                        );
                    }
                    if (group.hasAttribute('data-home-counter-trigger')) {
                        runHomeCounters();
                    }
                },
                { amount: 0.14 }
            );
        });

        hover('[data-home-trust-card]', (el) => {
            motionAnimate(el, { y: -3, scale: 1.01 }, { type: 'spring', stiffness: 380, damping: 24 });
            return () => {
                motionAnimate(el, { y: 0, scale: 1 }, { type: 'spring', stiffness: 340, damping: 26 });
            };
        });

        hover('.hero-light-btn', (el) => {
            motionAnimate(el, { scale: 1.04 }, { type: 'spring', stiffness: 420, damping: 22 });
            return () => {
                motionAnimate(el, { scale: 1 }, { type: 'spring', stiffness: 380, damping: 24 });
            };
        });

        press('.hero-light-btn', (el) => {
            motionAnimate(el, { scale: 0.95 }, { type: 'spring', stiffness: 520, damping: 26 });
            return () => {
                motionAnimate(el, { scale: 1 }, { type: 'spring', stiffness: 420, damping: 24 });
            };
        });
    } else {
        runHomeCounters();
    }

    // Initialize Real-Time 3D Lotus Crown Model in Section 1.4
    initLotusCrown3D();
}

// =============================================================================
// PAGE 02: ABOUT BRAND STORY (360° Multi-Angle Diamond Slider + Motion + Anime)
// =============================================================================
function initAboutBrandStory() {
    const section = document.getElementById('brand-story-section');
    if (!section) return;

    let angles = [];
    try {
        angles = JSON.parse(section.getAttribute('data-brand-angles') || '[]');
    } catch {
        angles = [];
    }
    if (!angles.length) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    angles.forEach((angle) => {
        if (angle && angle.src) {
            const preload = new Image();
            preload.src = angle.src;
        }
    });

    const stage = document.getElementById('brand-diamond-stage');
    const imgLayer = document.getElementById('brand-diamond-layer');
    const mainImg = document.getElementById('brand-diamond-img');
    const degNumEl = document.getElementById('brand-angle-deg-num');
    const badgeTagEl = document.getElementById('brand-angle-tag');
    const stepTextEl = document.getElementById('brand-angle-step');
    const titleEl = document.getElementById('brand-angle-title');
    const subtitleEl = document.getElementById('brand-angle-subtitle');
    const metricLabelEl = document.getElementById('brand-angle-metric-label');
    const metricValEl = document.getElementById('brand-angle-metric-val');
    const rangeInput = document.getElementById('brand-angle-range');
    const autoBtn = document.getElementById('brand-auto-orbit-btn');
    const autoDot = document.getElementById('brand-auto-orbit-dot');
    const autoText = document.getElementById('brand-auto-orbit-text');
    const gridToggleBtn = document.getElementById('brand-grid-toggle-btn');
    const gridToggleText = document.getElementById('brand-grid-toggle-text');
    const facetSvg = document.getElementById('brand-facet-svg');
    const hudBottom = document.getElementById('brand-hud-bottom');
    const thumbBtns = Array.from(document.querySelectorAll('.brand-angle-thumb'));
    const telemetryCounters = Array.from(document.querySelectorAll('[data-anime-counter]'));

    let currentIndex = 0;
    let isGridVisible = true;
    let isAutoOrbit = false;
    let autoOrbitTimer = null;
    const liveDegreeObj = { value: angles[0].degree_num ?? 0 };
    const liveMetricObj = { value: angles[0].metric_num ?? 58 };

    function playFacetSvgDraw() {
        if (!facetSvg || prefersReducedMotion) return;
        try {
            const drawables = createDrawable('#brand-facet-svg .facet-draw-path');
            if (drawables && drawables.length) {
                animeAnimate(drawables, {
                    draw: ['0 0', '0 1'],
                    ease: 'inOutQuad',
                    duration: 1350,
                    delay: animeStagger(85),
                });
            }
        } catch {
            // Safe fallback
        }
    }

    function pulseFacetRays() {
        if (!facetSvg || !isGridVisible || prefersReducedMotion) return;
        try {
            const rays = createDrawable('#brand-facet-svg .facet-ray-path');
            if (rays && rays.length) {
                animeAnimate(rays, {
                    draw: ['0 0', '0 1'],
                    ease: 'outQuad',
                    duration: 720,
                    delay: animeStagger(45),
                });
            }
        } catch {
            // Safe fallback
        }
    }

    if (facetSvg && !prefersReducedMotion) {
        animeAnimate('#brand-reticle-outer', {
            rotate: [0, 360],
            duration: 44000,
            ease: 'linear',
            loop: true,
        });

        animeAnimate('#brand-reticle-inner', {
            rotate: [0, -360],
            duration: 58000,
            ease: 'linear',
            loop: true,
        });

        animeAnimate('#brand-facet-svg .facet-sparkle-dot', {
            scale: [0.75, 1.35, 0.75],
            opacity: [0.35, 0.95, 0.35],
            duration: 2800,
            delay: animeStagger(220),
            ease: 'inOutSine',
            loop: true,
        });
    }

    function animateDegreeCounter(targetDeg) {
        if (!degNumEl) return;
        if (prefersReducedMotion) {
            liveDegreeObj.value = targetDeg;
            degNumEl.textContent = `${Math.round(targetDeg)}°`;
            return;
        }
        animeAnimate(liveDegreeObj, {
            value: targetDeg,
            duration: 540,
            ease: 'outExpo',
            onUpdate: () => {
                degNumEl.textContent = `${Math.round(liveDegreeObj.value)}°`;
            },
        });
    }

    function animateMetricCounter(targetNum, decimals = 0, suffix = '') {
        if (!metricValEl) return;
        if (prefersReducedMotion) {
            liveMetricObj.value = targetNum;
            metricValEl.textContent = `${Number(targetNum).toFixed(decimals)}${suffix}`;
            return;
        }
        animeAnimate(liveMetricObj, {
            value: targetNum,
            duration: 620,
            ease: 'outExpo',
            onUpdate: () => {
                metricValEl.textContent = `${Number(liveMetricObj.value).toFixed(decimals)}${suffix}`;
            },
        });
    }

    let telemetryAnimated = false;
    function triggerTelemetryCounters() {
        if (telemetryAnimated) return;
        telemetryAnimated = true;
        telemetryCounters.forEach((el, idx) => {
            const target = parseFloat(el.getAttribute('data-target') || '0');
            const decimals = parseInt(el.getAttribute('data-decimals') || '0', 10);
            const suffix = el.getAttribute('data-suffix') || '';

            if (prefersReducedMotion) {
                el.textContent = `${target.toFixed(decimals)}${suffix}`;
                return;
            }

            const counterObj = { val: 0 };
            animeAnimate(counterObj, {
                val: target,
                duration: 1150,
                delay: idx * 140,
                ease: 'outExpo',
                onUpdate: () => {
                    el.textContent = `${counterObj.val.toFixed(decimals)}${suffix}`;
                },
            });
        });
    }

    if (!prefersReducedMotion) {
        inView(
            section,
            () => {
                const visualCard = section.querySelector('[data-motion-visual]');
                if (visualCard) {
                    motionAnimate(
                        visualCard,
                        { opacity: [0, 1], y: [24, 0], scale: [0.985, 1] },
                        { duration: 0.72, ease: [0.22, 1, 0.36, 1] }
                    );
                }

                const storyBlocks = section.querySelectorAll('[data-motion-story-item]');
                if (storyBlocks.length) {
                    motionAnimate(
                        storyBlocks,
                        { opacity: [0, 1], y: [20, 0] },
                        {
                            duration: 0.65,
                            delay: motionStagger(0.085, { startDelay: 0.08 }),
                            ease: [0.22, 1, 0.36, 1],
                        }
                    );
                }

                const traitPills = section.querySelectorAll('.brand-trait-pill');
                if (traitPills.length) {
                    motionAnimate(
                        traitPills,
                        { opacity: [0, 1], scale: [0.9, 1], y: [10, 0] },
                        {
                            type: 'spring',
                            stiffness: 320,
                            damping: 22,
                            delay: motionStagger(0.055, { startDelay: 0.32 }),
                        }
                    );
                }

                playFacetSvgDraw();
                triggerTelemetryCounters();
            },
            { amount: 0.12 }
        );

        document.querySelectorAll('[data-about-reveal-group]').forEach((group) => {
            inView(
                group,
                () => {
                    const cards = group.querySelectorAll('[data-about-reveal-item]');
                    if (cards.length) {
                        motionAnimate(
                            cards,
                            { opacity: [0, 1], y: [22, 0] },
                            {
                                duration: 0.62,
                                delay: motionStagger(0.08),
                                ease: [0.22, 1, 0.36, 1],
                            }
                        );
                    }
                },
                { amount: 0.15 }
            );
        });

        hover('.brand-angle-thumb', (el) => {
            motionAnimate(el, { y: -3, scale: 1.02 }, { type: 'spring', stiffness: 420, damping: 24 });
            return () => {
                motionAnimate(el, { y: 0, scale: 1 }, { type: 'spring', stiffness: 380, damping: 26 });
            };
        });

        press('.brand-angle-thumb', (el) => {
            motionAnimate(el, { scale: 0.96 }, { type: 'spring', stiffness: 500, damping: 28 });
            return () => {
                motionAnimate(el, { scale: 1 }, { type: 'spring', stiffness: 420, damping: 24 });
            };
        });

        hover('.brand-trait-pill', (el) => {
            motionAnimate(el, { y: -2, scale: 1.05 }, { type: 'spring', stiffness: 420, damping: 20 });
            return () => {
                motionAnimate(el, { y: 0, scale: 1 }, { type: 'spring', stiffness: 360, damping: 24 });
            };
        });

        press('.brand-trait-pill', (el) => {
            motionAnimate(el, { scale: 0.95 }, { type: 'spring', stiffness: 520, damping: 25 });
            return () => {
                motionAnimate(el, { scale: 1 }, { type: 'spring', stiffness: 380, damping: 22 });
            };
        });

        hover('.brand-highlight-card', (el) => {
            motionAnimate(el, { y: -3 }, { type: 'spring', stiffness: 380, damping: 25 });
            return () => {
                motionAnimate(el, { y: 0 }, { type: 'spring', stiffness: 340, damping: 26 });
            };
        });
    } else {
        triggerTelemetryCounters();
    }

    function updateRangeVisual(idx) {
        if (!rangeInput) return;
        rangeInput.value = String(idx);
        const pct = angles.length > 1 ? (idx / (angles.length - 1)) * 100 : 0;
        rangeInput.style.setProperty('--slider-pct', `${pct}%`);
    }

    function setAngle(nextIndex, animateTransition = true) {
        const total = angles.length;
        const safeIdx = ((nextIndex % total) + total) % total;
        const prevIdx = currentIndex;
        const direction =
            safeIdx === prevIdx
                ? 0
                : safeIdx === 0 && prevIdx === total - 1
                  ? 1
                  : safeIdx === total - 1 && prevIdx === 0
                    ? -1
                    : safeIdx > prevIdx
                      ? 1
                      : -1;

        currentIndex = safeIdx;
        const angle = angles[safeIdx];
        if (!angle) return;

        updateRangeVisual(safeIdx);

        if (mainImg && imgLayer) {
            mainImg.src = angle.src;
            mainImg.alt = `KIRA Diamond — ${angle.title} (${angle.degree})`;

            if (animateTransition && !prefersReducedMotion && direction !== 0) {
                motionAnimate(
                    imgLayer,
                    {
                        rotateY: [direction * 14, 0],
                        scale: [1.05, 1],
                        opacity: [0.62, 1],
                    },
                    {
                        type: 'spring',
                        stiffness: 250,
                        damping: 24,
                        mass: 0.9,
                    }
                );
            }
        }

        if (badgeTagEl) badgeTagEl.textContent = angle.tag;
        if (stepTextEl) stepTextEl.textContent = `0${safeIdx + 1} / 0${total}`;
        if (titleEl) titleEl.textContent = angle.title;
        if (subtitleEl) subtitleEl.textContent = angle.subtitle;
        if (metricLabelEl) metricLabelEl.textContent = angle.metric_label;

        if (hudBottom && animateTransition && !prefersReducedMotion && direction !== 0) {
            motionAnimate(
                hudBottom,
                { y: [6, 0], opacity: [0.75, 1] },
                { type: 'spring', stiffness: 320, damping: 24 }
            );
        }

        animateDegreeCounter(angle.degree_num ?? 0);
        animateMetricCounter(angle.metric_num ?? 58, angle.metric_decimals ?? 0, angle.metric_suffix ?? '');
        if (animateTransition && direction !== 0) {
            pulseFacetRays();
        }

        thumbBtns.forEach((btn) => {
            const idx = parseInt(btn.getAttribute('data-brand-angle-index') || '0', 10);
            const degBadge = btn.querySelector('[data-thumb-deg]');
            const isActive = idx === safeIdx;
            btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');

            if (isActive) {
                btn.classList.remove('border-[#E5DEC9]', 'bg-[#FAF8F3]/80');
                btn.classList.add('border-[#C99A49]', 'bg-white', 'ring-2', 'ring-[#C99A49]/25', 'shadow-sm');
                if (degBadge) {
                    degBadge.classList.remove('bg-[#0F1E2E]/75', 'text-white');
                    degBadge.classList.add('bg-[#0F1E2E]', 'text-[#E6C587]');
                }
            } else {
                btn.classList.remove('border-[#C99A49]', 'bg-white', 'ring-2', 'ring-[#C99A49]/25', 'shadow-sm');
                btn.classList.add('border-[#E5DEC9]', 'bg-[#FAF8F3]/80');
                if (degBadge) {
                    degBadge.classList.remove('bg-[#0F1E2E]', 'text-[#E6C587]');
                    degBadge.classList.add('bg-[#0F1E2E]/75', 'text-white');
                }
            }
        });
    }

    function setAutoOrbit(enabled) {
        isAutoOrbit = enabled;
        if (autoOrbitTimer) {
            clearInterval(autoOrbitTimer);
            autoOrbitTimer = null;
        }
        if (enabled) {
            autoOrbitTimer = setInterval(() => {
                setAngle(currentIndex + 1, true);
            }, 3400);
        }
        if (autoBtn && autoDot && autoText) {
            autoBtn.setAttribute('aria-pressed', enabled ? 'true' : 'false');
            if (enabled) {
                autoBtn.classList.remove('bg-[#FAF8F3]', 'text-[#0F1E2E]', 'border-[#E5DEC9]');
                autoBtn.classList.add('bg-[#0F1E2E]', 'text-[#E6C587]', 'border-[#C99A49]');
                autoDot.classList.add('animate-pulse', 'bg-[#E6C587]');
                autoDot.classList.remove('bg-[#C99A49]');
                autoText.textContent = 'Orbit Aktif';
            } else {
                autoBtn.classList.remove('bg-[#0F1E2E]', 'text-[#E6C587]', 'border-[#C99A49]');
                autoBtn.classList.add('bg-[#FAF8F3]', 'text-[#0F1E2E]', 'border-[#E5DEC9]');
                autoDot.classList.remove('animate-pulse', 'bg-[#E6C587]');
                autoDot.classList.add('bg-[#C99A49]');
                autoText.textContent = 'Putar Otomatis';
            }
        }
    }

    if (stage && imgLayer) {
        let isDragging = false;
        let startX = 0;

        stage.addEventListener('pointerdown', (e) => {
            if (e.target.closest('button')) return;
            isDragging = true;
            startX = e.clientX;
            try {
                stage.setPointerCapture(e.pointerId);
            } catch {
                // Safe ignore
            }
            if (isAutoOrbit) setAutoOrbit(false);
        });

        stage.addEventListener('pointermove', (e) => {
            if (!isDragging) return;
            const deltaX = e.clientX - startX;
            const clampedTilt = Math.max(-13, Math.min(13, deltaX / 5));
            imgLayer.style.transform = `rotateY(${clampedTilt}deg) scale(1.02)`;

            if (Math.abs(deltaX) >= 48) {
                const step = deltaX > 0 ? 1 : -1;
                startX = e.clientX;
                setAngle(currentIndex + step, true);
            }
        });

        const endDrag = () => {
            if (!isDragging) return;
            isDragging = false;
            if (!prefersReducedMotion) {
                motionAnimate(
                    imgLayer,
                    { rotateY: 0, scale: 1 },
                    { type: 'spring', stiffness: 320, damping: 24 }
                );
            } else {
                imgLayer.style.transform = 'none';
            }
        };

        stage.addEventListener('pointerup', endDrag);
        stage.addEventListener('pointercancel', endDrag);

        stage.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') {
                e.preventDefault();
                if (isAutoOrbit) setAutoOrbit(false);
                setAngle(currentIndex + 1, true);
            } else if (e.key === 'ArrowLeft') {
                e.preventDefault();
                if (isAutoOrbit) setAutoOrbit(false);
                setAngle(currentIndex - 1, true);
            }
        });
    }

    if (rangeInput) {
        rangeInput.addEventListener('input', () => {
            if (isAutoOrbit) setAutoOrbit(false);
            const targetIdx = parseInt(rangeInput.value, 10);
            if (!Number.isNaN(targetIdx) && targetIdx !== currentIndex) {
                setAngle(targetIdx, true);
            }
        });
    }

    thumbBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            if (isAutoOrbit) setAutoOrbit(false);
            const idx = parseInt(btn.getAttribute('data-brand-angle-index') || '0', 10);
            setAngle(idx, true);
        });
    });

    if (autoBtn) {
        autoBtn.addEventListener('click', () => {
            setAutoOrbit(!isAutoOrbit);
        });
    }

    if (gridToggleBtn && facetSvg) {
        gridToggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            isGridVisible = !isGridVisible;
            gridToggleBtn.setAttribute('aria-pressed', isGridVisible ? 'true' : 'false');
            if (gridToggleText) {
                gridToggleText.textContent = isGridVisible ? 'Grid Optik' : 'Grid Nonaktif';
            }

            if (isGridVisible) {
                facetSvg.classList.remove('opacity-0');
                facetSvg.classList.add('opacity-100');
                playFacetSvgDraw();
            } else {
                facetSvg.classList.remove('opacity-100');
                facetSvg.classList.add('opacity-0');
            }
        });
    }

    updateRangeVisual(0);
    setAngle(0, false);
}

document.addEventListener('DOMContentLoaded', () => {
    initHomeExperience();
    initAboutBrandStory();
});
