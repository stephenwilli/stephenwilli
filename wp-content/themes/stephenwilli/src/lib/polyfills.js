const polyfills = [];

// https://cdnjs.cloudflare.com/polyfill
('fetch' in window)                     || polyfills.push('fetch');
('Promise' in window)                   || polyfills.push('Promise');
('IntersectionObserver' in window)      || polyfills.push('IntersectionObserver');
('IntersectionObserverEntry' in window) || polyfills.push('IntersectionObserverEntry');
('ResizeObserver' in window)            || polyfills.push('ResizeObserver');
('URLSearchParams' in window)           || polyfills.push('URLSearchParams');
('requestIdleCallback' in window)       || polyfills.push('requestIdleCallback');
('assign' in Object)                    || polyfills.push('Object.assign');
('from' in Array)                       || polyfills.push('Array.from');
('find' in Array.prototype)             || polyfills.push('Array.prototype.find');
('includes' in Array.prototype)         || polyfills.push('Array.prototype.includes');
('forEach' in NodeList.prototype)       || polyfills.push('NodeList.prototype.forEach');
('closest' in Element.prototype)        || polyfills.push('Element.prototype.closest');
('prepend' in Element.prototype)        || polyfills.push('Element.prototype.prepend');
('append' in Element.prototype)         || polyfills.push('Element.prototype.append');
('remove' in Element.prototype)         || polyfills.push('Element.prototype.remove');

export default polyfills;
