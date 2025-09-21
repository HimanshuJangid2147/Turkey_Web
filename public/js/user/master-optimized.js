/* Master JavaScript File - Optimized Loading */

/* ===== LOAD ORDER =====
1. Core utilities (must load first)
2. Layout-specific functionality
3. Page-specific functionality
4. Initialize everything
*/

// Load core utilities first (synchronous)
document.write('<script src="/js/user/core.js"><\/script>');

// Load layout-specific functionality
document.write('<script src="/js/user/layout-specific.js"><\/script>');

// Load page-specific functionality
document.write('<script src="/js/user/page-specific.js"><\/script>');

/* ===== PERFORMANCE OPTIMIZATIONS ===== */

// Lazy load non-critical JavaScript
const lazyLoadScripts = [
    // Add any additional scripts that can be lazy-loaded
];

// Preload critical scripts
const preloadScripts = [
    '/js/user/core.js',
    '/js/user/layout-specific.js',
    '/js/user/page-specific.js'
];

// Add preload hints for critical scripts
preloadScripts.forEach(script => {
    const link = document.createElement('link');
    link.rel = 'preload';
    link.as = 'script';
    link.href = script;
    document.head.appendChild(link);
});

/* ===== ERROR HANDLING ===== */
window.addEventListener('error', function(e) {
    if (e.target.tagName === 'SCRIPT') {
        console.error('JavaScript loading error:', e.target.src);
        // Fallback loading mechanism
        if (e.target.src.includes('core.js')) {
            console.warn('Core.js failed to load, attempting fallback...');
            // Could implement fallback loading here
        }
    }
});

/* ===== PERFORMANCE MONITORING ===== */
if ('performance' in window) {
    window.addEventListener('load', function() {
        setTimeout(() => {
            const perfData = performance.getEntriesByType('resource');
            const jsFiles = perfData.filter(entry =>
                entry.name.includes('/js/user/') &&
                entry.name.endsWith('.js')
            );

            console.log('JavaScript Loading Performance:');
            jsFiles.forEach(file => {
                console.log(`${file.name}: ${Math.round(file.duration)}ms`);
            });
        }, 1000);
    });
}
