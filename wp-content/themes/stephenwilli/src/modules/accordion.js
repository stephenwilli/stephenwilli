import { findAll, attr, parse } from '@tmbr/utils';

export default function(node) {

  const props = parse(node.dataset.props || '');

  const items = findAll('.accordion-heading', node).map(el => {
    const trigger = el.firstElementChild;
    const content = el.nextElementSibling;
    return { trigger, content, expanded: false };
  });

  function expand(item) {
    attr(item.trigger, 'aria-expanded', 'true');
    attr(item.content, 'aria-hidden', 'false');
    item.expanded = true;
  }

  function collapse(item) {
    attr(item.trigger, 'aria-expanded', 'false');
    attr(item.content, 'aria-hidden', 'true');
    item.expanded = false;
  }

  function click(event) {
    const item = items.find(item => item.trigger === event.target);
    if (!item) return;
    if (!props.multiple) items.filter(o => o.expanded && o !== item).forEach(collapse);
    item.expanded ? collapse(item) : expand(item);
    resize();
  }

  function resize() {
    items.forEach(({expanded, content}) => {
      content.style.maxHeight = expanded ? `${content.scrollHeight}px` : null;
    });
  }

  if (items[props.initial]) {
    expand(items[props.initial]);
  }

  node.addEventListener('click', click);
  window.addEventListener('resize', resize);
  resize();

  return () => {
    node.removeEventListener('click', click);
    window.removeEventListener('resize', resize);
  };
};
