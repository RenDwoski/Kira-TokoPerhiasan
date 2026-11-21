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

    // Preload all 4 rotating diamond images for instant zero-flicker sliding
    angles.forEach((angle) => {
        if (angle && angle.src) {
            const preload = new Image();
            preload.src = angle.src;
        }
    });

    // DOM references
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

    // -------------------------------------------------------------------------
    // 1. ANIME.JS: Sacred Geometry SVG Line-Drawing, Orbital Rings & Sparkles
    // -------------------------------------------------------------------------
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
            // Keep SVG cleanly visible if drawable helper cannot measure hidden node
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
        // Continuous slow orbital rotation on outer & inner diamond compass rings
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

        // Staggered luminous sparkle pulse on cardinal diamond nodes
        animeAnimate('#brand-facet-svg .facet-sparkle-dot', {
            scale: [0.75, 1.35, 0.75],
            opacity: [0.35, 0.95, 0.35],
            duration: 2800,
            delay: animeStagger(220),
            ease: 'inOutSine',
            loop: true,
        });
    }

    // -------------------------------------------------------------------------
    // 2. ANIME.JS: Numerical Counter Morphing for Live Angle & Optical Telemetry
    // -------------------------------------------------------------------------
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

    // -------------------------------------------------------------------------
    // 3. MOTION.DEV: Scroll Entrance, Stagger & Spring Micro-Interactions
    // -------------------------------------------------------------------------
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

        // Reveal lower About sections smoothly on scroll
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

        // Tactile Motion.dev spring hover & press physics on thumbnails, trait pills, & highlight cards
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

    // -------------------------------------------------------------------------
    // 4. INTERACTIVE SLIDER STATE CONTROLLER (Motion.dev + Anime.js Sync)
    // -------------------------------------------------------------------------
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

        // Update range scrubber fill
        updateRangeVisual(safeIdx);

        // Update image with Motion.dev 3D spring turn
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

        // Update HUD text with gentle Motion.dev spring pop
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

        // Sync Anime.js numeric counters & SVG refraction rays
        animateDegreeCounter(angle.degree_num ?? 0);
        animateMetricCounter(angle.metric_num ?? 58, angle.metric_decimals ?? 0, angle.metric_suffix ?? '');
        if (animateTransition && direction !== 0) {
            pulseFacetRays();
        }

        // Sync active state on the 4 thumbnail pills
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

    // -------------------------------------------------------------------------
    // 5. AUTO-ORBIT CONTROLLER
    // -------------------------------------------------------------------------
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

    // -------------------------------------------------------------------------
    // 6. POINTER DRAG / TOUCH SWIPE, RANGE SLIDER & TOGGLE BINDINGS
    // -------------------------------------------------------------------------
    if (stage && imgLayer) {
        let isDragging = false;
        let startX = 0;

        stage.addEventListener('pointerdown', (e) => {
            // Ignore clicks on buttons inside the stage (e.g., Grid Optik toggle)
            if (e.target.closest('button')) return;
            isDragging = true;
            startX = e.clientX;
            try {
                stage.setPointerCapture(e.pointerId);
            } catch {
                // Ignore if pointer capture unavailable
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

        // Keyboard accessibility when stage is focused
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

    // Initialize initial angle state & start gentle auto-orbit off by default (user-driven or toggleable)
    updateRangeVisual(0);
    setAngle(0, false);
}

document.addEventListener('DOMContentLoaded', () => {
    initAboutBrandStory();
});
