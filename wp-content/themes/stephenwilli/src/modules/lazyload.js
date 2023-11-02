let io;

export default function(node) {
  io ??= new IntersectionObserver(callback, {rootMargin: '100%'});
  io.observe(node);
  return () => io.unobserve(node);
};

function callback(entries) {
  entries.forEach(e => e.isIntersecting && load(e.target));
}

function load(el) {

  const { src, srcset, sizes } = el.dataset;
  el.removeAttribute('data-src');
  io.unobserve(el);

  switch (el.tagName.toLowerCase()) {

    case 'img':
    case 'video':
    case 'iframe':

      el.src = src;

      if (srcset) {
        el.srcset = srcset;
        el.removeAttribute('data-srcset');
      }
      if (sizes) {
        el.sizes = sizes;
        el.removeAttribute('data-sizes');
      }

      break;

    default:
      el.style.backgroundImage = `url(${src})`;
  }
}
