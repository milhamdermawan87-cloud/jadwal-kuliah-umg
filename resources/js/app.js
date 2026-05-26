import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js';
    script.onload = function () {
        if (typeof particlesJS !== 'undefined') {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 50, density: { enable: true, value_area: 800 } },
                    color: { value: '#3b82f6' },
                    shape: { type: 'circle' },
                    opacity: { value: 0.3, random: true, anim: { enable: true, speed: 1, opacity_min: 0.1 } },
                    size: { value: 3, random: true, anim: { enable: true, speed: 2, size_min: 0.1 } },
                    line_linked: { enable: true, distance: 150, color: '#8b5cf6', opacity: 0.2, width: 1 },
                    move: { enable: true, speed: 1, direction: 'none', random: true, straight: false, out_mode: 'out', bounce: false }
                },
                interactivity: {
                    detect_on: 'canvas',
                    events: { onhover: { enable: true, mode: 'grab' }, onclick: { enable: true, mode: 'push' }, resize: true },
                    modes: { grab: { distance: 140, line_linked: { opacity: 0.5 } }, push: { particles_nb: 4 } }
                },
                retina_detect: true
            });
        }
    };
    document.head.appendChild(script);
});
