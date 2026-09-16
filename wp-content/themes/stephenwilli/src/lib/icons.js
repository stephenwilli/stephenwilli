import { findOne } from '@tmbr/utils';

const svg = findOne('svg[data-icons]');
const ids = svg.innerHTML.match(/id="icon:[a-z0-9-]+/g).map(s => s.replace('id="icon:', ''));

window.site.icons = ids.reduce((result, key) => {
  result[key] = `<svg class="icon icon:${key}"><use xlink:href="#icon:${key}"></use></svg>`;
  return result;
}, {});
