
export const noop = fn => fn;
export const isArray = Array.isArray;
export const toArray = Array.from || (value => Array.prototype.slice.call(value));

export function isBoolean(value) {
  return typeof value === 'boolean';
};

export function toBoolean(value) {

  if (isBoolean(value)) {
    return value;
  }

  if (isString(value)) {
    switch (value.toLowerCase()) {
      case 'false':
      case 'no':
      case '0':
        return false;
      default:
        case 'true':
        case 'yes':
        case '1':
        return true;
    }
  }

  return Boolean(value);
};

export function isElement(value) {
  return !!(value && value.nodeType === 1);
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

export function isObject(value) {
  return typeof value === 'object';
};

export function isString(value) {
  return typeof value === 'string';
};

export function isUndefined(value) {
  return typeof value === 'undefined';
};

export default function wait(delay) {
  return new Promise(resolve => setTimeout(resolve, delay));
};

const ajax = (method, url, data, callback) => {
  const req = new XMLHttpRequest();
  req.open(method, url);
  req.setRequestHeader('Content-Type', 'application/json');
  req.onload = () => callback && callback(JSON.parse(req.responseText || '{}'), req);
  req.send(JSON.stringify(data || {}));
  return req;
};

export function get(url, callback) {
  return ajax('GET', url, null, callback);
};

export function post(url, data, callback) {
  return ajax('POST', url, data, callback);
};