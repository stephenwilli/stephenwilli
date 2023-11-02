
export const noop = fn => fn;
export const isArray = Array.isArray;
export const toArray = Array.from || (value => value ? Array.prototype.slice.call(value) : []);

export function toBoolean(value) {

  if (isBoolean(value)) {
    return value;
  }

  if (isString(value)) {
    switch (value.toLowerCase()) {
      case 'undefined':
      case 'false':
      case 'null':
      case 'no':
      case '0':
        return false;
      case 'true':
      case 'yes':
      case '1':
      default:
        return true;
    }
  }

  return Boolean(value);
};

export function isBoolean(value) {
  return typeof value === 'boolean';
};

export function isElement(value, tag) {
  return !!(value && (isString(tag)
    ? value.nodeName === tag.toUpperCase()
    : value.nodeType === 1
  ));
};

export function isEmpty(value) {
  if (isUndefined(value) || value === null || value === false || value === 0) {
    return true;
  }
  if (isArray(value) || isString(value)) {
    return value.length === 0;
  }
  if (isObject(value)) {
    return value.constructor === Object && Object.keys(value).length === 0;
  }
  return false;
};

export function isDefined(value) {
  return !isUndefined(value);
};

export function isFunction(value) {
  return typeof value === 'function';
};

export function isNumber(value) {
  return typeof value === 'number';
};

export function isNumeric(value) {
  if (isNumber(value)) return true;
  if (/^0x[0-9a-f]+$/i.test(value)) return true;
  return (/^[-+]?(?:\d+(?:\.\d*)?|\.\d+)(e[-+]?\d+)?$/).test(value);
};

export function isObject(value) {
  return typeof value === 'object';
};

export function isString(value) {
  return typeof value === 'string';
};

export function isUndefined(value) {
  return typeof value === 'undefined';
};

export function findAll(selector, parent) {
  if (typeof parent === 'string') parent = document.querySelector(parent);
  const elements = (parent || document).querySelectorAll(selector);
  return toArray(elements || []);
};

export function findOne(selector, parent) {
  if (typeof parent === 'string') parent = document.querySelector(parent);
  return (parent || document).querySelector(selector);
};

export function on(type, selector, fn, scope = document) {

  const useCapture = scope === document;

  const listener = event => {
    const target = event.target !== document && event.target.closest(selector);
    target && fn.call(target, event);
  };

  on.listeners || (on.listeners = []);
  on.listeners.push({type, selector, fn, scope, listener, useCapture});

  scope.addEventListener(type, listener, useCapture);
};

export function off(type, selector, fn, scope = document) {

  const listeners = on.listeners || [];

  const index = listeners.findIndex(o => (
    o.type === type &&
    o.selector === selector &&
    o.fn === fn &&
    o.scope === scope
  ));

  if (index !== -1) {
    const context = listeners.splice(index, 1)[0];
    context.scope.removeEventListener(context.type, context.listener, context.useCapture);
  }
};

export function h(tag, props, children = []) {

  if (isUndefined(props)) return document.createTextNode(tag);
  if (!isArray(children)) children = [children];

  const node = document.createElement(tag);
  const attrs = Object.keys(props || {});

  for (let i = 0; i < attrs.length; i++) {
    node.setAttribute(attrs[i], props[attrs[i]]);
  }
  for (let i = 0; i < children.length; i++) {
    const child = isString(children[i]) ? h(children[i]) : children[i];
    node.appendChild(child);
  }

  return node;
};

export function html(strings, ...args) {

  const template = document.createElement('template');
  const appends = {};
  let result = '';

  for (let i = 0; i < args.length; i++) {

    if (args[i] instanceof HTMLElement) {
      const id = `id${i}`;
      appends[id] = args[i];
      result += `${strings[i]}<div append="${id}"></div>`;
    } else {
      result += strings[i] + args[i];
    }
  }

  result += strings[strings.length - 1];
  template.innerHTML = result.trim();

  const content = template.content;

  [...content.querySelectorAll('[append]')].forEach(refNode => {
    const newNode = appends[refNode.getAttribute('append')];
    refNode.parentNode.insertBefore(newNode, refNode);
    refNode.parentNode.removeChild(refNode);
  });

  return content;
};

export function svg(strings, ...vars) {
  const string = strings.map((str, i) => `${str}${vars[i] || ''}`).join('');
  const parser = svg.parser || (svg.parser = new DOMParser());
  return parser.parseFromString(string, 'image/svg+xml').documentElement;
};

export const lockScroll = (function() {

  const html = document.documentElement;
  // const body = document.body;
  let isLocked = false;

  return function() {

    if (isLocked) return noop;
    isLocked = true;

    const scrollY = window.scrollY || window.pageYOffset || html.scrollTop || 0;
    html.classList.add('no-overflow');
    // body.classList.add('no-overflow');

    return function unlockScroll() {
      isLocked = false;
      html.classList.remove('no-overflow');
      // body.classList.remove('no-overflow');
      window.scrollTo(0, scrollY);
    };
  };

})();

export function clamp(value, min = 0, max = 1) {
  return Math.min(Math.max(value, min), max);
};

export function wait(delay, promises = []) {
  promises.push(new Promise(resolve => setTimeout(resolve, delay)));
  return Promise.all(promises);
};

export function request(method, url, data, headers = {}) {

  const config = {method};
  config.headers = Object.assign({'content-type': 'application/json'}, headers);

  if ( ! url.startsWith('http')) {
    url = `/${url.startsWith('/') ? url.slice(1) : url}`;
  }

  if (method.toUpperCase() === 'GET') {
    const params = new URLSearchParams(data).toString();
    params && (url += `${url.includes('&') ? '&' : '?'}${params}`);
  } else {
    config.body = JSON.stringify(data || {});
  }

  return window
    .fetch(url, config)
    .then(res => res.json().then(json => res.ok ? json : Promise.reject(json)));
};

['GET', 'POST', 'PUT', 'PATCH', 'DELETE'].forEach(method => {
  request[method.toLocaleLowerCase()] = (...args) => request(method, ...args);
});
