// Alpine.js
import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";

Alpine.plugin(intersect);

window.Alpine = Alpine;
Alpine.start();

// ── Animation cleanup: release GPU layers after entrance transitions ──
document.addEventListener('transitionend', function (e) {
    const el = e.target;
    if (
        e.propertyName === 'opacity' &&
        el.classList.contains('anim-visible') &&
        !el.classList.contains('anim-done')
    ) {
        el.classList.add('anim-done');
    }
}, { passive: true });
