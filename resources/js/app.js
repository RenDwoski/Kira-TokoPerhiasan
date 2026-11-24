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
import { initGlobalMotionSystem, triggerSparkleBurst } from './kira-motion-system.js';

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

    if (hotspotBtn) {
        hotspotBtn.addEventListener('click', () => {
            switchHeroMode('loupe');
        });
    }

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

                    const coreBadges = group.querySelectorAll('[data-core-badge]');
                    if (coreBadges.length) {
                        animeAnimate(coreBadges, {
                            scale: [0.75, 1.08, 1],
                            rotate: [-8, 0],
                            duration: 760,
                            delay: animeStagger(110),
                            ease: 'outBack',
                        });
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

// =============================================================================
// PAGE 03: PRODUCTS CATALOG & 3D 4C INSPECTOR (Motion.dev + Anime.js Morphing)
// =============================================================================
function initProductsExperience() {
    const root = document.getElementById('products-catalog-root');
    if (!root) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let productsData = [];
    try {
        productsData = JSON.parse(root.getAttribute('data-products') || '[]');
    } catch {
        productsData = [];
    }
    if (!productsData.length) return;

    const contactBaseUrl = root.getAttribute('data-contact-url') || '/contact';
    const initialId = root.getAttribute('data-selected-id') || productsData[0].id;
    const productMap = {};
    productsData.forEach((p) => {
        productMap[p.id] = p;
    });

    let currentProduct = productMap[initialId] || productsData[0];
    let currentAngleIndex = 0;

    // Live Anime.js numerical state objects
    const priceNumState = { val: Number(currentProduct.price) || 84500000 };
    const caratNumState = { val: parseFloat(currentProduct.carat) || 1.5 };
    const crownNumState = { val: parseFloat(currentProduct.crown_angle) || 34.5 };
    const pavilionNumState = { val: parseFloat(currentProduct.pavilion_angle) || 40.8 };

    const catalogGrid = document.getElementById('catalog-grid');
    const inspectorCard = document.getElementById('detail-inspector-card');
    const stage3d = document.getElementById('detail-3d-stage');
    const layer3d = document.getElementById('detail-3d-layer');
    const mainImg = document.getElementById('detail-main-image');
    const hudBottom = document.getElementById('detail-hud-bottom');
    const angleLabel = document.getElementById('detail-angle-label');
    const hudChip = document.getElementById('detail-hud-chip');
    const eyebrow = document.getElementById('detail-eyebrow');
    const metalSpec = document.getElementById('detail-metal-spec');
    const title = document.getElementById('detail-title');
    const priceEl = document.getElementById('detail-price');
    const shortSpec = document.getElementById('detail-short-spec');
    const description = document.getElementById('detail-description');
    const caratEl = document.getElementById('detail-carat');
    const colorEl = document.getElementById('detail-color');
    const clarityEl = document.getElementById('detail-clarity');
    const cutEl = document.getElementById('detail-cut');
    const crownEl = document.getElementById('detail-crown');
    const pavilionEl = document.getElementById('detail-pavilion');
    const fireEl = document.getElementById('detail-fire');
    const bookCta = document.getElementById('detail-book-cta');

    function preloadAngles(product) {
        (product.angles || []).forEach((a) => {
            if (a && a.src) {
                const img = new Image();
                img.src = a.src;
            }
        });
    }
    preloadAngles(currentProduct);

    function formatRupiah(num) {
        return 'Rp ' + Math.round(num).toLocaleString('id-ID');
    }

    function playDetailReticleDraw() {
        if (prefersReducedMotion) return;
        try {
            const paths = createDrawable('#detail-reticle-svg .detail-reticle-path');
            if (paths && paths.length) {
                animeAnimate(paths, {
                    draw: ['0 0', '0 1'],
                    duration: 850,
                    ease: 'outQuad',
                });
            }
        } catch {
            // Safe fallback
        }
    }

    function setAngle(index, animateTilt = true) {
        const angles = currentProduct.angles || [];
        if (!angles.length) return;
        const safeIdx = ((index % angles.length) + angles.length) % angles.length;
        const direction =
            safeIdx === currentAngleIndex
                ? 0
                : safeIdx === 0 && currentAngleIndex === angles.length - 1
                  ? 1
                  : safeIdx === angles.length - 1 && currentAngleIndex === 0
                    ? -1
                    : safeIdx > currentAngleIndex
                      ? 1
                      : -1;
        currentAngleIndex = safeIdx;
        const angle = angles[safeIdx];

        if (mainImg && angle) {
            mainImg.src = angle.src;
            mainImg.alt = `${currentProduct.name} — ${angle.label}`;

            if (animateTilt && !prefersReducedMotion && layer3d && direction !== 0) {
                motionAnimate(
                    layer3d,
                    {
                        rotateY: [direction * 14, 0],
                        scale: [1.05, 1],
                        opacity: [0.6, 1],
                    },
                    {
                        type: 'spring',
                        stiffness: 260,
                        damping: 24,
                    }
                );
            }
        }

        if (angleLabel && angle) {
            angleLabel.textContent = `3D Detail • ${angle.label} (${angle.degree})`;
        }

        if (hudBottom && animateTilt && !prefersReducedMotion && direction !== 0) {
            motionAnimate(
                hudBottom,
                { y: [5, 0], opacity: [0.72, 1] },
                { type: 'spring', stiffness: 320, damping: 24 }
            );
            playDetailReticleDraw();
        }

        document.querySelectorAll('.detail-thumb-btn').forEach((btn) => {
            const idx = parseInt(btn.getAttribute('data-thumb-index') || '0', 10);
            const labelEl = document.getElementById(`detail-thumb-label-${idx}`);
            if (idx === safeIdx) {
                btn.classList.remove('border', 'border-[#E5DEC9]');
                btn.classList.add('border-2', 'border-[#C99A49]', 'shadow-sm');
                if (labelEl) {
                    labelEl.classList.remove('text-white');
                    labelEl.classList.add('text-[#E6C587]');
                }
            } else {
                btn.classList.remove('border-2', 'border-[#C99A49]', 'shadow-sm');
                btn.classList.add('border', 'border-[#E5DEC9]');
                if (labelEl) {
                    labelEl.classList.remove('text-[#E6C587]');
                    labelEl.classList.add('text-white');
                }
            }
        });

        document.querySelectorAll('.detail-angle-pill').forEach((pill) => {
            const idx = parseInt(pill.getAttribute('data-angle-pill') || '0', 10);
            if (idx === safeIdx) {
                pill.className =
                    'detail-angle-pill flex-1 py-1.5 px-2.5 rounded-full font-sans font-bold text-[10.5px] tracking-wide transition cursor-pointer bg-[#0F1E2E] text-[#E6C587] shadow-2xs';
            } else {
                pill.className =
                    'detail-angle-pill flex-1 py-1.5 px-2.5 rounded-full font-sans font-bold text-[10.5px] tracking-wide transition cursor-pointer text-[#5C6877] hover:text-[#0F1E2E]';
            }
        });
    }

    function selectProduct(productId, shouldScroll = true) {
        const p = productMap[productId];
        if (!p) return;
        currentProduct = p;
        preloadAngles(p);

        (p.angles || []).forEach((angle, idx) => {
            const thumbImg = document.getElementById(`detail-thumb-${idx}`);
            const thumbLabel = document.getElementById(`detail-thumb-label-${idx}`);
            const pillEl = document.querySelector(`[data-angle-pill="${idx}"] .angle-pill-text`);
            if (thumbImg) {
                thumbImg.src = angle.src;
                thumbImg.alt = `${p.name} — ${angle.label}`;
            }
            if (thumbLabel) thumbLabel.textContent = angle.short;
            if (pillEl) pillEl.textContent = angle.short;
        });

        setAngle(0, false);
        if (!prefersReducedMotion && layer3d) {
            motionAnimate(
                layer3d,
                { scale: [0.95, 1], opacity: [0.55, 1] },
                { type: 'spring', stiffness: 250, damping: 23 }
            );
            playDetailReticleDraw();
        }

        if (hudChip) hudChip.textContent = `${p.color} • ${p.clarity} • ${p.carat}`;
        if (eyebrow) eyebrow.textContent = p.eyebrow;
        if (metalSpec) metalSpec.textContent = p.metal_spec;
        if (title) title.textContent = `${p.name} — ${p.carat}`;
        if (shortSpec) shortSpec.textContent = p.short_spec;
        if (description) description.textContent = p.description;
        if (colorEl) colorEl.textContent = p.color;
        if (clarityEl) clarityEl.textContent = p.clarity;
        if (cutEl) cutEl.textContent = p.cut;
        if (fireEl) fireEl.textContent = p.refractive_index;

        // ANIME.JS: Live Numerical Morphing for Price, Carat, Crown & Pavilion
        const targetPrice = Number(p.price) || 0;
        const targetCarat = parseFloat(p.carat) || 1.0;
        const targetCrown = parseFloat(p.crown_angle) || 34.5;
        const targetPavilion = parseFloat(p.pavilion_angle) || 40.8;

        if (prefersReducedMotion) {
            if (priceEl) priceEl.textContent = p.price_formatted;
            if (caratEl) caratEl.textContent = p.carat;
            if (crownEl) crownEl.textContent = p.crown_angle;
            if (pavilionEl) pavilionEl.textContent = p.pavilion_angle;
        } else {
            if (priceEl) {
                animeAnimate(priceNumState, {
                    val: targetPrice,
                    duration: 720,
                    ease: 'outExpo',
                    onUpdate: () => {
                        priceEl.textContent = formatRupiah(priceNumState.val);
                    },
                });
            }
            if (caratEl) {
                animeAnimate(caratNumState, {
                    val: targetCarat,
                    duration: 640,
                    ease: 'outExpo',
                    onUpdate: () => {
                        caratEl.textContent = `${caratNumState.val.toFixed(2)} Ct`;
                    },
                });
            }
            if (crownEl) {
                animeAnimate(crownNumState, {
                    val: targetCrown,
                    duration: 640,
                    ease: 'outExpo',
                    onUpdate: () => {
                        crownEl.textContent = `${crownNumState.val.toFixed(1)}°`;
                    },
                });
            }
            if (pavilionEl) {
                animeAnimate(pavilionNumState, {
                    val: targetPavilion,
                    duration: 640,
                    ease: 'outExpo',
                    onUpdate: () => {
                        pavilionEl.textContent = `${pavilionNumState.val.toFixed(1)}°`;
                    },
                });
            }

            // MOTION.DEV: Staggered spring pop on 4C & Optical cards
            const specCards = document.querySelectorAll('[data-4c-card], [data-optical-card]');
            if (specCards.length) {
                motionAnimate(
                    specCards,
                    { scale: [0.94, 1], y: [8, 0], opacity: [0.65, 1] },
                    {
                        type: 'spring',
                        stiffness: 340,
                        damping: 22,
                        delay: motionStagger(0.045),
                    }
                );
            }
        }

        if (bookCta) {
            bookCta.href = `${contactBaseUrl}?collection=${encodeURIComponent(p.name)}`;
            bookCta.textContent = `Book Private Viewing untuk ${p.cta_item_label || 'Koleksi Ini'}`;
            if (shouldScroll) {
                triggerSparkleBurst(bookCta, 10);
            }
        }

        if (shouldScroll) {
            document.getElementById('gia-specs')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // Initial Scroll Entrance Choreography on Products Page
    if (!prefersReducedMotion) {
        if (catalogGrid) {
            inView(
                catalogGrid,
                () => {
                    const cards = catalogGrid.querySelectorAll('.catalog-card:not(.hidden)');
                    if (cards.length) {
                        motionAnimate(
                            cards,
                            { opacity: [0, 1], y: [24, 0] },
                            {
                                duration: 0.65,
                                delay: motionStagger(0.075),
                                ease: [0.22, 1, 0.36, 1],
                            }
                        );
                    }
                },
                { amount: 0.08 }
            );
        }

        if (inspectorCard) {
            inView(
                inspectorCard,
                () => {
                    motionAnimate(
                        inspectorCard,
                        { opacity: [0, 1], y: [26, 0], scale: [0.985, 1] },
                        { duration: 0.72, ease: [0.22, 1, 0.36, 1] }
                    );
                    playDetailReticleDraw();
                },
                { amount: 0.12 }
            );
        }

        hover('.detail-thumb-btn, .detail-angle-pill', (el) => {
            motionAnimate(el, { y: -2, scale: 1.03 }, { type: 'spring', stiffness: 420, damping: 24 });
            return () => {
                motionAnimate(el, { y: 0, scale: 1 }, { type: 'spring', stiffness: 380, damping: 26 });
            };
        });

        press('.detail-thumb-btn, .detail-angle-pill, .select-product-btn', (el) => {
            motionAnimate(el, { scale: 0.96 }, { type: 'spring', stiffness: 500, damping: 26 });
            return () => {
                motionAnimate(el, { scale: 1 }, { type: 'spring', stiffness: 420, damping: 24 });
            };
        });
    }

    document.querySelectorAll('[data-select-product]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const pid = btn.getAttribute('data-select-product');
            if (pid) selectProduct(pid, true);
        });
    });

    document.querySelectorAll('.detail-thumb-btn').forEach((btn) => {
        btn.addEventListener('click', () => {
            const idx = parseInt(btn.getAttribute('data-thumb-index') || '0', 10);
            setAngle(idx, true);
        });
    });

    document.querySelectorAll('.detail-angle-pill').forEach((pill) => {
        pill.addEventListener('click', () => {
            const idx = parseInt(pill.getAttribute('data-angle-pill') || '0', 10);
            setAngle(idx, true);
        });
    });

    // Interactive 3D Drag-to-Rotate on Main Stage
    if (stage3d && layer3d) {
        let isDragging = false;
        let startX = 0;

        stage3d.addEventListener('pointerdown', (e) => {
            isDragging = true;
            startX = e.clientX;
            try {
                stage3d.setPointerCapture(e.pointerId);
            } catch {
                // Safe ignore
            }
        });

        stage3d.addEventListener('pointermove', (e) => {
            if (!isDragging) return;
            const deltaX = e.clientX - startX;
            const clampedTilt = Math.max(-13, Math.min(13, deltaX / 5));
            layer3d.style.transform = `rotateY(${clampedTilt}deg) scale(1.02)`;

            if (Math.abs(deltaX) >= 52) {
                const step = deltaX > 0 ? 1 : -1;
                startX = e.clientX;
                setAngle(currentAngleIndex + step, true);
            }
        });

        const endDrag = () => {
            if (!isDragging) return;
            isDragging = false;
            if (!prefersReducedMotion) {
                motionAnimate(
                    layer3d,
                    { rotateY: 0, scale: 1 },
                    { type: 'spring', stiffness: 320, damping: 24 }
                );
            } else {
                layer3d.style.transform = 'none';
            }
        };

        stage3d.addEventListener('pointerup', endDrag);
        stage3d.addEventListener('pointercancel', endDrag);
    }

    // Category Filter with Motion.dev Spring Cascade
    const filterBtns = Array.from(document.querySelectorAll('[data-catalog-filter]'));
    filterBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            const cat = btn.getAttribute('data-catalog-filter');
            filterBtns.forEach((b) => {
                b.className =
                    'catalog-filter-btn px-4 py-2 rounded-full font-sans font-bold text-[12px] transition-all cursor-pointer bg-white text-[#243B53] border border-[#E5DEC9] hover:border-[#C99A49]';
            });
            btn.className =
                'catalog-filter-btn px-4 py-2 rounded-full font-sans font-bold text-[12px] transition-all cursor-pointer bg-[#0F1E2E] text-white shadow-2xs';

            const visible = [];
            document.querySelectorAll('.catalog-card').forEach((card) => {
                if (cat === 'all' || card.getAttribute('data-category') === cat) {
                    card.classList.remove('hidden');
                    visible.push(card);
                } else {
                    card.classList.add('hidden');
                }
            });

            if (visible.length && !prefersReducedMotion) {
                motionAnimate(
                    visible,
                    { opacity: [0, 1], y: [18, 0], scale: [0.96, 1] },
                    {
                        type: 'spring',
                        stiffness: 310,
                        damping: 24,
                        delay: motionStagger(0.055),
                    }
                );
            }
        });
    });

    // Price Sort with Motion.dev Spring Reflow
    const sortSelect = document.getElementById('catalog-sort');
    if (sortSelect && catalogGrid) {
        sortSelect.addEventListener('change', () => {
            const mode = sortSelect.value;
            const cards = Array.from(catalogGrid.querySelectorAll('.catalog-card'));
            cards.sort((a, b) => {
                const priceA = parseInt(a.getAttribute('data-price') || '0', 10);
                const priceB = parseInt(b.getAttribute('data-price') || '0', 10);
                const orderA = parseInt(a.getAttribute('data-order') || '0', 10);
                const orderB = parseInt(b.getAttribute('data-order') || '0', 10);
                if (mode === 'price-asc') return priceA - priceB;
                if (mode === 'price-desc') return priceB - priceA;
                return orderA - orderB;
            });
            cards.forEach((c) => catalogGrid.appendChild(c));

            const visible = cards.filter((c) => !c.classList.contains('hidden'));
            if (visible.length && !prefersReducedMotion) {
                motionAnimate(
                    visible,
                    { opacity: [0.4, 1], y: [14, 0], scale: [0.97, 1] },
                    {
                        type: 'spring',
                        stiffness: 320,
                        damping: 24,
                        delay: motionStagger(0.045),
                    }
                );
            }
        });
    }

    // Support static GitHub Pages ?item= & ?category= query params
    const urlParams = new URLSearchParams(window.location.search);
    const queryItem = urlParams.get('item');
    if (queryItem && productMap[queryItem]) {
        selectProduct(queryItem, false);
    }
    const queryCategory = urlParams.get('category');
    if (queryCategory) {
        const targetFilterBtn = document.querySelector(`[data-catalog-filter="${queryCategory}"]`);
        targetFilterBtn?.click();
    }
}

// =============================================================================
// PAGE 04: GALLERY & 360° ATELIER SHOWCASE (Motion.dev + Anime.js Orbital)
// =============================================================================
function initGalleryExperience() {
    const lookbookSection = document.getElementById('gallery-lookbook-section');
    if (!lookbookSection) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // 1. Staggered Masonry Entrance & Filter Reflow
    const filterBtns = Array.from(document.querySelectorAll('[data-lookbook-filter]'));
    const lookbookItems = Array.from(document.querySelectorAll('.lookbook-item'));

    if (!prefersReducedMotion && lookbookItems.length) {
        inView(
            lookbookSection,
            () => {
                motionAnimate(
                    lookbookItems,
                    { opacity: [0, 1], y: [24, 0], scale: [0.98, 1] },
                    {
                        duration: 0.68,
                        delay: motionStagger(0.065),
                        ease: [0.22, 1, 0.36, 1],
                    }
                );
            },
            { amount: 0.06 }
        );
    }

    filterBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            const cat = btn.getAttribute('data-lookbook-filter');
            filterBtns.forEach((b) => {
                b.className =
                    'lookbook-filter-btn px-5 py-2.5 rounded-full bg-white border border-[#D8CEBE] text-[#243B53] hover:border-[#C99A49] font-sans font-bold text-[12px] transition cursor-pointer';
            });
            btn.className =
                'lookbook-filter-btn px-5 py-2.5 rounded-full bg-[#0F1E2E] text-white font-sans font-bold text-[12px] shadow-2xs transition cursor-pointer';

            const visible = [];
            lookbookItems.forEach((item) => {
                if (cat === 'all' || item.getAttribute('data-lookbook-cat') === cat) {
                    item.classList.remove('hidden');
                    visible.push(item);
                } else {
                    item.classList.add('hidden');
                }
            });

            if (visible.length && !prefersReducedMotion) {
                motionAnimate(
                    visible,
                    { opacity: [0, 1], y: [18, 0], scale: [0.95, 1] },
                    {
                        type: 'spring',
                        stiffness: 310,
                        damping: 24,
                        delay: motionStagger(0.055),
                    }
                );
            }
        });
    });

    // 2. Upgraded Atelier 360° Optical Inspector (Anime.js Orbital + 4-Frame Diamond Cycle)
    const card360 = document.getElementById('atelier-360-card');
    if (card360) {
        let frames = [];
        try {
            frames = JSON.parse(card360.getAttribute('data-360-frames') || '[]');
        } catch {
            frames = [];
        }

        frames.forEach((f) => {
            if (f && f.src) {
                const img = new Image();
                img.src = f.src;
            }
        });

        const bgImg = document.getElementById('atelier-360-bg');
        const toggleBtn = document.getElementById('toggle-360-btn');
        const statusText = document.getElementById('atelier-360-status');
        const degBadge = document.getElementById('atelier-360-deg');
        const frameLabel = document.getElementById('atelier-360-frame-label');
        const stepPills = Array.from(document.querySelectorAll('[data-360-step]'));

        let currentStep = 0;
        let isPlaying = false;
        let cycleTimer = null;
        const degState = { val: 0 };

        function playAtelierSvgDraw() {
            if (prefersReducedMotion) return;
            try {
                const paths = createDrawable('#atelier-360-svg .atelier-draw-path');
                if (paths && paths.length) {
                    animeAnimate(paths, {
                        draw: ['0 0', '0 1'],
                        duration: 1100,
                        delay: animeStagger(75),
                        ease: 'outQuad',
                    });
                }
            } catch {
                // Safe fallback
            }
        }

        if (!prefersReducedMotion) {
            animeAnimate('#atelier-360-ring-outer', {
                rotate: [0, 360],
                duration: 24000,
                ease: 'linear',
                loop: true,
            });
            animeAnimate('#atelier-360-ring-inner', {
                rotate: [0, -360],
                duration: 32000,
                ease: 'linear',
                loop: true,
            });

            inView(
                card360,
                () => {
                    motionAnimate(
                        card360,
                        { opacity: [0, 1], y: [26, 0], scale: [0.98, 1] },
                        { duration: 0.72, ease: [0.22, 1, 0.36, 1] }
                    );
                    playAtelierSvgDraw();
                },
                { amount: 0.15 }
            );
        }

        function setStep(nextIdx, animateFrame = true) {
            if (!frames.length) return;
            const safeIdx = ((nextIdx % frames.length) + frames.length) % frames.length;
            currentStep = safeIdx;
            const frame = frames[safeIdx];

            if (bgImg && frame) {
                bgImg.src = frame.src;
                if (animateFrame && !prefersReducedMotion) {
                    motionAnimate(
                        bgImg,
                        { scale: [1.12, 1.04], opacity: [0.28, 0.56] },
                        { type: 'spring', stiffness: 210, damping: 24 }
                    );
                }
            }

            if (frameLabel && frame) {
                frameLabel.textContent = frame.label;
            }

            if (degBadge && frame) {
                if (prefersReducedMotion) {
                    degBadge.textContent = `${frame.degree}°`;
                } else {
                    animeAnimate(degState, {
                        val: frame.degree,
                        duration: 640,
                        ease: 'outExpo',
                        onUpdate: () => {
                            degBadge.textContent = `${Math.round(degState.val)}°`;
                        },
                    });
                }
            }

            stepPills.forEach((pill) => {
                const idx = parseInt(pill.getAttribute('data-360-step') || '0', 10);
                if (idx === safeIdx) {
                    pill.className =
                        'atelier-step-pill px-3.5 py-1.5 rounded-full font-sans font-bold text-[10.5px] transition cursor-pointer bg-[#C99A49] text-[#0F1E2E] shadow-sm';
                } else {
                    pill.className =
                        'atelier-step-pill px-3.5 py-1.5 rounded-full font-sans font-bold text-[10.5px] transition cursor-pointer bg-white/10 text-[#F7F4EE] border border-white/15 hover:border-[#C99A49]';
                }
            });
        }

        function setPlaying(enabled) {
            isPlaying = enabled;
            if (cycleTimer) {
                clearInterval(cycleTimer);
                cycleTimer = null;
            }

            if (enabled) {
                if (toggleBtn) toggleBtn.textContent = '❚❚';
                if (statusText) {
                    statusText.textContent =
                        '✦ Mode Rotasi Optik 360° Aktif: Memeriksa pantulan 58 faset berlian (Crown 34.5° • Pavilion 40.8° • 2.417 nD Fire).';
                    statusText.classList.add('text-[#E6C587]');
                }
                setStep(currentStep + 1, true);
                cycleTimer = setInterval(() => {
                    setStep(currentStep + 1, true);
                }, 2200);
            } else {
                if (toggleBtn) toggleBtn.textContent = '▶';
                if (statusText) {
                    statusText.textContent =
                        'Simulasi dijeda. Klik tombol putar atau pilih sudut di bawah untuk melanjutkan inspeksi faset 360 derajat.';
                    statusText.classList.remove('text-[#E6C587]');
                }
            }
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                setPlaying(!isPlaying);
            });
        }

        stepPills.forEach((pill) => {
            pill.addEventListener('click', () => {
                if (isPlaying) setPlaying(false);
                const idx = parseInt(pill.getAttribute('data-360-step') || '0', 10);
                setStep(idx, true);
            });
        });
    }

    // 3. Client Stories Reveal & Anime.js Golden Star Wave
    const storiesWrap = document.querySelector('[data-gallery-stories]');
    if (storiesWrap && !prefersReducedMotion) {
        inView(
            storiesWrap,
            () => {
                const cards = storiesWrap.querySelectorAll('[data-story-card]');
                if (cards.length) {
                    motionAnimate(
                        cards,
                        { opacity: [0, 1], y: [22, 0] },
                        {
                            duration: 0.65,
                            delay: motionStagger(0.09),
                            ease: [0.22, 1, 0.36, 1],
                        }
                    );
                }

                const stars = storiesWrap.querySelectorAll('.client-star');
                if (stars.length) {
                    animeAnimate(stars, {
                        scale: [0.3, 1.35, 1],
                        rotate: [-18, 0],
                        opacity: [0, 1],
                        duration: 680,
                        delay: animeStagger(65, { start: 220 }),
                        ease: 'outBack',
                    });
                }
            },
            { amount: 0.15 }
        );
    }
}

// =============================================================================
// PAGE 05: CONTACT, GOOGLE MAPS, SPRING FAQ & VIP SPARKLE SEAL (Motion + Anime)
// =============================================================================
function initContactExperience() {
    const root = document.getElementById('contact-page-root');
    if (!root) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let productsData = [];
    try {
        productsData = JSON.parse(root.getAttribute('data-products') || '[]');
    } catch {
        productsData = [];
    }

    // 1. Pre-select collection from ?collection= query parameter (for static GitHub Pages)
    const urlParams = new URLSearchParams(window.location.search);
    const queryCollection = urlParams.get('collection');
    const collectionSelect = document.getElementById('collection');
    if (queryCollection && collectionSelect) {
        const matchOpt = Array.from(collectionSelect.options).find(
            (opt) =>
                opt.value.toLowerCase().includes(queryCollection.toLowerCase()) ||
                queryCollection.toLowerCase().includes(opt.value.toLowerCase())
        );
        if (matchOpt) {
            collectionSelect.value = matchOpt.value;
        }
    }

    // 2. Celebratory VIP Confirmation Seal Animation (Motion.dev Spring + Anime.js Checkmark + Sparkles)
    function playVipConfirmationCelebration() {
        const confSection = document.getElementById('vip-confirmation-section');
        const confCard = document.getElementById('vip-confirmation-card');
        const sealHost = document.getElementById('vip-seal-host');
        if (!confSection) return;

        confSection.classList.remove('hidden');
        confSection.scrollIntoView({ behavior: 'smooth', block: 'center' });

        if (prefersReducedMotion) return;

        if (confCard) {
            motionAnimate(
                confCard,
                { opacity: [0, 1], y: [26, 0], scale: [0.94, 1] },
                { type: 'spring', stiffness: 240, damping: 22 }
            );
        }

        try {
            const sealPaths = createDrawable('#vip-seal-svg .vip-seal-draw');
            if (sealPaths && sealPaths.length) {
                animeAnimate(sealPaths, {
                    draw: ['0 0', '0 1'],
                    duration: 920,
                    delay: animeStagger(240),
                    ease: 'outExpo',
                });
            }
        } catch {
            // Safe fallback
        }

        if (sealHost) {
            setTimeout(() => {
                triggerSparkleBurst(sealHost, 20);
            }, 280);
        }
    }

    if (root.getAttribute('data-just-confirmed') === '1') {
        setTimeout(playVipConfirmationCelebration, 180);
    }

    // 3. Client-side VIP Booking handler when hosted statically on GitHub Pages
    const bookingForm = document.getElementById('vip-booking-form');
    const isStaticHost =
        window.location.hostname.endsWith('github.io') || window.location.protocol === 'file:';

    if (bookingForm && isStaticHost) {
        bookingForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const fullName =
                document.getElementById('full_name')?.value.trim() || 'Tamu Kehormatan KIRA';
            const email = document.getElementById('email')?.value.trim() || '';
            const whatsapp = document.getElementById('whatsapp')?.value.trim() || '';
            const selectedCol = collectionSelect?.value || 'The Lotus Crown Solitaire';
            const visitDate =
                document.getElementById('visit_date')?.value.trim() || 'Sabtu, 14 November 2026';
            const timeSlot =
                document.getElementById('time_slot')?.value || 'Sesi Siang (14:00 WIB)';

            const matchedProduct =
                productsData.find(
                    (p) =>
                        selectedCol.toLowerCase().includes(p.name.toLowerCase()) ||
                        p.name.toLowerCase().includes(selectedCol.toLowerCase())
                ) || productsData[0] || { name: selectedCol, carat: '1.50 Ct', gia_report: '226789104' };

            const randomNum = String(Math.floor(Math.random() * 900) + 100);
            const code = `KIRA-VIP-2026-${randomNum}`;

            const confCode = document.getElementById('conf-code');
            const confDatetime = document.getElementById('conf-datetime');
            const confCollection = document.getElementById('conf-collection');
            const confGia = document.getElementById('conf-gia');
            const confGuestRow = document.getElementById('conf-guest-row');
            const confCard = document.getElementById('vip-confirmation-card');
            const confBadge = document.getElementById('vip-confirmation-badge');
            const confHeading = document.getElementById('conf-heading');
            const confMetaRow = document.getElementById('conf-meta-row');
            const confLocationRow = document.getElementById('conf-location-row');
            const confNoteRow = document.getElementById('conf-note-row');
            const confHomeBtn = document.getElementById('conf-home-btn');

            if (confCode) confCode.textContent = code;
            if (confDatetime) confDatetime.textContent = `${visitDate} (${timeSlot})`;
            if (confCollection) {
                confCollection.textContent = `${matchedProduct.name} (${matchedProduct.carat})`;
            }
            if (confGia) confGia.textContent = matchedProduct.gia_report;
            if (confGuestRow) {
                confGuestRow.textContent = `Tamu VIP: ${fullName} (${email} • ${whatsapp})`;
                confGuestRow.classList.remove('hidden');
            }

            if (confCard) {
                confCard.className =
                    'rounded-[28px] bg-[#0F1E2E] text-white border-2 border-[#C99A49] ring-4 ring-[#C99A49]/25 p-7 sm:p-10 shadow-xl transition-all';
            }
            if (confBadge) {
                confBadge.className =
                    'inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#C99A49] text-[#0F1E2E] font-sans font-bold text-[10.5px] tracking-wider uppercase mb-6';
            }
            if (confHeading) {
                confHeading.className =
                    'font-serif font-bold text-[26px] sm:text-[34px] text-white leading-snug';
            }
            if (confMetaRow) {
                confMetaRow.className = 'mt-2 font-sans font-bold text-[15.5px] text-[#E6C587]';
            }
            if (confLocationRow) {
                confLocationRow.className = 'mt-1.5 font-sans font-medium text-[14px] text-[#DCE6F2]';
            }
            if (confNoteRow) {
                confNoteRow.className = 'mt-1.5 font-sans text-[13px] text-[#DCE6F2]/85';
            }
            if (confHomeBtn) {
                confHomeBtn.className =
                    'h-[52px] px-7 rounded-full bg-white/10 border border-white/25 text-white hover:bg-white/20 font-sans font-bold text-[13.5px] flex items-center justify-center transition';
            }

            playVipConfirmationCelebration();
        });
    }

    // 4. Split-Column Entrance & Tactile Form Field Lift
    if (!prefersReducedMotion) {
        const mainGrid = document.getElementById('contact-main-grid');
        if (mainGrid) {
            inView(
                mainGrid,
                () => {
                    const leftCard = mainGrid.querySelector('[data-contact-left]');
                    const rightCard = mainGrid.querySelector('[data-contact-right]');
                    if (leftCard) {
                        motionAnimate(
                            leftCard,
                            { opacity: [0, 1], x: [-22, 0], y: [14, 0] },
                            { duration: 0.68, ease: [0.22, 1, 0.36, 1] }
                        );
                    }
                    if (rightCard) {
                        motionAnimate(
                            rightCard,
                            { opacity: [0, 1], x: [22, 0], y: [14, 0] },
                            { duration: 0.68, delay: 0.09, ease: [0.22, 1, 0.36, 1] }
                        );
                    }
                },
                { amount: 0.1 }
            );
        }

        document.querySelectorAll('[data-form-group]').forEach((group) => {
            group.addEventListener('focusin', () => {
                motionAnimate(group, { y: -2 }, { type: 'spring', stiffness: 400, damping: 24 });
            });
            group.addEventListener('focusout', () => {
                motionAnimate(group, { y: 0 }, { type: 'spring', stiffness: 360, damping: 26 });
            });
        });

        const faqList = document.querySelector('[data-faq-list]');
        if (faqList) {
            inView(
                faqList,
                () => {
                    const items = faqList.querySelectorAll('.faq-item');
                    if (items.length) {
                        motionAnimate(
                            items,
                            { opacity: [0, 1], y: [18, 0] },
                            {
                                duration: 0.6,
                                delay: motionStagger(0.07),
                                ease: [0.22, 1, 0.36, 1],
                            }
                        );
                    }
                },
                { amount: 0.12 }
            );
        }
    }

    // 5. Interactive FAQ Accordions with Motion.dev Spring Physics
    document.querySelectorAll('.faq-item').forEach((item) => {
        const btn = item.querySelector('.faq-toggle');
        const ans = item.querySelector('.faq-answer');
        const icon = item.querySelector('.faq-icon');

        btn?.addEventListener('click', () => {
            if (!ans) return;
            const isOpen = !ans.classList.contains('hidden');
            if (isOpen) {
                ans.classList.add('hidden');
                if (icon) {
                    icon.textContent = '+';
                    if (!prefersReducedMotion) {
                        motionAnimate(
                            icon,
                            { rotate: [-90, 0], scale: [0.85, 1] },
                            { type: 'spring', stiffness: 420, damping: 22 }
                        );
                    }
                }
                btn.setAttribute('aria-expanded', 'false');
            } else {
                ans.classList.remove('hidden');
                if (!prefersReducedMotion) {
                    motionAnimate(
                        ans,
                        { opacity: [0, 1], y: [-8, 0] },
                        { type: 'spring', stiffness: 340, damping: 25 }
                    );
                }
                if (icon) {
                    icon.textContent = '−';
                    if (!prefersReducedMotion) {
                        motionAnimate(
                            icon,
                            { rotate: [90, 0], scale: [0.85, 1] },
                            { type: 'spring', stiffness: 420, damping: 22 }
                        );
                    }
                }
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });
}

// =============================================================================
// BOOTSTRAP ALL KIRA EXPERIENCES
// =============================================================================
document.addEventListener('DOMContentLoaded', () => {
    initGlobalMotionSystem();
    initHomeExperience();
    initAboutBrandStory();
    initProductsExperience();
    initGalleryExperience();
    initContactExperience();
});
