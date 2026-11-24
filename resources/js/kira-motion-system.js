import {
    animate as motionAnimate,
    inView,
    hover,
    press,
    scroll,
    stagger as motionStagger,
} from 'motion';
import {
    animate as animeAnimate,
    stagger as animeStagger,
} from 'animejs';

/**
 * Triggers a celebratory champagne-gold diamond sparkle burst around a target element
 * using Anime.js v4 physics-like radial dispersion.
 */
export function triggerSparkleBurst(anchorEl, count = 18) {
    if (!anchorEl) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const host = anchorEl;
    const computedPos = window.getComputedStyle(host).position;
    if (computedPos === 'static') {
        host.style.position = 'relative';
    }

    const particles = [];
    for (let i = 0; i < count; i++) {
        const dot = document.createElement('span');
        const size = 4 + Math.random() * 5;
        dot.className = 'kira-sparkle-dot';
        dot.style.width = `${size}px`;
        dot.style.height = `${size}px`;
        dot.style.left = '50%';
        dot.style.top = '50%';
        dot.style.marginLeft = `${-size / 2}px`;
        dot.style.marginTop = `${-size / 2}px`;
        dot.style.zIndex = '30';
        host.appendChild(dot);
        particles.push(dot);
    }

    particles.forEach((dot, idx) => {
        const angle = (idx / count) * Math.PI * 2 + (Math.random() - 0.5) * 0.35;
        const distance = 44 + Math.random() * 48;
        const tx = Math.cos(angle) * distance;
        const ty = Math.sin(angle) * distance;

        animeAnimate(dot, {
            x: [0, tx],
            y: [0, ty],
            scale: [0.2, 1.35, 0],
            opacity: [1, 0.95, 0],
            duration: 920 + Math.random() * 380,
            delay: idx * 18,
            ease: 'outExpo',
            onComplete: () => {
                dot.remove();
            },
        });
    });
}

/**
 * Initializes KIRA's site-wide Motion.dev + Anime.js signature experience
 * across all 5 pages (Home, About, Product, Gallery, Contact).
 */
export function initGlobalMotionSystem() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    // 1. MOTION.DEV: Scroll-Linked Golden Light Progress Thread at top of viewport
    const progressEl = document.getElementById('kira-scroll-progress');
    if (progressEl && !prefersReducedMotion) {
        try {
            scroll(
                motionAnimate(
                    progressEl,
                    { scaleX: [0, 1] },
                    { ease: 'linear' }
                )
            );
        } catch {
            // Fallback passive scroll listener if WAAPI ScrollTimeline is unsupported
            const syncProgress = () => {
                const maxScroll = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
                const ratio = Math.min(1, Math.max(0, window.scrollY / maxScroll));
                progressEl.style.transform = `scaleX(${ratio})`;
            };
            window.addEventListener('scroll', syncProgress, { passive: true });
            syncProgress();
        }
    }

    if (prefersReducedMotion) return;

    // 2. MOTION.DEV + ANIME.JS: Universal Page Header Kinetic Stagger & Expanding Gold Divider
    document.querySelectorAll('[data-page-header]').forEach((header) => {
        const items = header.querySelectorAll('[data-page-header-item]');
        if (items.length) {
            motionAnimate(
                items,
                { opacity: [0, 1], y: [18, 0] },
                {
                    duration: 0.65,
                    delay: motionStagger(0.08),
                    ease: [0.22, 1, 0.36, 1],
                }
            );
        }

        const goldLines = header.querySelectorAll('[data-anime-line]');
        if (goldLines.length) {
            animeAnimate(goldLines, {
                scaleX: [0, 1],
                opacity: [0, 1],
                duration: 1050,
                delay: 220,
                ease: 'outExpo',
            });
        }
    });

    // 3. MOTION.DEV: Scroll-Linked Parallax on Ambient Orbs & Editorial Lookbook Photos
    document.querySelectorAll('[data-parallax-orb]').forEach((orb, idx) => {
        const dir = idx % 2 === 0 ? 1 : -1;
        try {
            scroll(
                motionAnimate(
                    orb,
                    { y: [-24 * dir, 32 * dir], rotate: [-4 * dir, 5 * dir] },
                    { ease: 'linear' }
                )
            );
        } catch {
            // Safe ignore
        }
    });

    document.querySelectorAll('[data-parallax-img]').forEach((img) => {
        const container = img.closest('.lookbook-item') || img.parentElement;
        if (!container) return;
        try {
            scroll(
                motionAnimate(
                    img,
                    { y: [-14, 14], scale: [1.07, 1.01] },
                    { ease: 'linear' }
                ),
                { target: container, offset: ['start end', 'end start'] }
            );
        } catch {
            // Safe ignore
        }
    });

    // 4. MOTION.DEV: Magnetic Luxury Pill Buttons (Desktop Fine Pointer Only)
    if (supportsHover) {
        document.querySelectorAll('[data-magnetic]').forEach((btn) => {
            btn.addEventListener('pointermove', (e) => {
                const rect = btn.getBoundingClientRect();
                const relX = e.clientX - (rect.left + rect.width / 2);
                const relY = e.clientY - (rect.top + rect.height / 2);
                const moveX = Math.max(-8, Math.min(8, relX * 0.16));
                const moveY = Math.max(-5, Math.min(5, relY * 0.18));

                motionAnimate(
                    btn,
                    { x: moveX, y: moveY, scale: 1.025 },
                    { type: 'spring', stiffness: 360, damping: 22 }
                );
            });

            btn.addEventListener('pointerleave', () => {
                motionAnimate(
                    btn,
                    { x: 0, y: 0, scale: 1 },
                    { type: 'spring', stiffness: 300, damping: 20 }
                );
            });
        });

        press('[data-magnetic]', (el) => {
            motionAnimate(el, { scale: 0.96 }, { type: 'spring', stiffness: 500, damping: 26 });
            return () => {
                motionAnimate(el, { scale: 1 }, { type: 'spring', stiffness: 360, damping: 22 });
            };
        });

        // 5. MOTION.DEV: 3D Specular Tilt & Champagne Glint Cards
        document.querySelectorAll('[data-tilt-card]').forEach((card) => {
            card.addEventListener('pointermove', (e) => {
                const rect = card.getBoundingClientRect();
                const px = (e.clientX - rect.left) / Math.max(1, rect.width);
                const py = (e.clientY - rect.top) / Math.max(1, rect.height);

                const rotateY = (px - 0.5) * 6.5;
                const rotateX = (0.5 - py) * 6.5;

                card.style.setProperty('--glint-x', `${(px * 100).toFixed(1)}%`);
                card.style.setProperty('--glint-y', `${(py * 100).toFixed(1)}%`);
                card.style.setProperty('--glint-opacity', '1');

                motionAnimate(
                    card,
                    {
                        rotateX,
                        rotateY,
                        y: -4,
                        transformPerspective: 1000,
                    },
                    { type: 'spring', stiffness: 340, damping: 26 }
                );
            });

            card.addEventListener('pointerleave', () => {
                card.style.setProperty('--glint-opacity', '0');
                motionAnimate(
                    card,
                    {
                        rotateX: 0,
                        rotateY: 0,
                        y: 0,
                        transformPerspective: 1000,
                    },
                    { type: 'spring', stiffness: 280, damping: 24 }
                );
            });
        });
    }

    // 6. ANIME.JS: Ambient Twinkling Diamond Constellation inside Luxury Dark Banners
    document.querySelectorAll('[data-sparkle-field]').forEach((field) => {
        const count = parseInt(field.getAttribute('data-sparkle-count') || '12', 10);
        const dots = [];
        for (let i = 0; i < count; i++) {
            const dot = document.createElement('span');
            const size = 2.5 + Math.random() * 3.5;
            dot.className = 'kira-sparkle-dot';
            dot.style.width = `${size}px`;
            dot.style.height = `${size}px`;
            dot.style.left = `${6 + Math.random() * 88}%`;
            dot.style.top = `${10 + Math.random() * 80}%`;
            dot.style.opacity = '0.15';
            field.appendChild(dot);
            dots.push(dot);
        }

        if (dots.length) {
            animeAnimate(dots, {
                opacity: [0.12, 0.88, 0.12],
                scale: [0.7, 1.45, 0.7],
                duration: 2800,
                delay: animeStagger(240),
                ease: 'inOutSine',
                loop: true,
            });
        }
    });

    // 7. MOTION.DEV: Global Footer Staggered Reveal + Mobile Menu Spring
    const footerGrid = document.querySelector('[data-kira-footer-grid]');
    if (footerGrid) {
        inView(
            footerGrid,
            () => {
                const cols = footerGrid.querySelectorAll('[data-kira-footer-col]');
                if (cols.length) {
                    motionAnimate(
                        cols,
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

    // Smooth Logo Lotus Hover Micro-Spring
    hover('[aria-label="KIRA Maison de Diamants Home"]', (el) => {
        const mark = el.querySelector('img');
        if (mark) {
            motionAnimate(mark, { rotate: [0, -6, 6, 0], scale: 1.08 }, { duration: 0.55 });
        }
        return () => {
            if (mark) {
                motionAnimate(mark, { scale: 1 }, { duration: 0.25 });
            }
        };
    });
}
