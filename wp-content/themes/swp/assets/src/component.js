import { isArray, toArray, isFunction, isDefined } from './utils';

const queue = [];
let scheduled;

function enqueue(component) {
  if (!queue.includes(component)) {
    queue.push(component);
    scheduled || (scheduled = window.requestAnimationFrame(update));
  }
}

function update() {
  let instance;
  while (instance = queue.pop()) {
    const { prevState, state: nextState } = instance;
    instance.update(prevState, nextState);
  }
  scheduled = false;
}

export default class Component {

  constructor(el) {

    this.el = el;
    this.state = {};

    try {
      this.props = JSON.parse(el.dataset.props);
    } catch (e) {
      this.props = {};
    }

    const attr = 'ref';

    this.ui = this.findAll(`[${attr}]`).reduce((acc, node) => {
      const key = node.getAttribute(attr).trim();
      acc[key] = acc[key]
        ? isArray(acc[key])
          ? [...acc[key], node]
          : [   acc[key], node]
        : node;
      return acc;
    }, {});
  }

  get(key, fallback) {

    if (!key) return this.state;

    const keys = key.split('.');
    let result = this.state;

    for (let i = 0, prop; result && (prop = keys[i]); i++) {
      result = result[prop];
    }

    return isDefined(result) ? result : fallback;
  }

  set(state) {
    this.prevState = this.state;
    this.state = Object.assign({}, this.state, state);
    enqueue(this);
  }

  findOne(s) {
    return this.el.querySelector(s);
  }

  findAll(s) {
    return toArray(this.el.querySelectorAll(s));
  }

  bind(methods) {
    (isArray(methods) ? methods : [methods]).forEach(fn => {
      isFunction(this[fn]) && (this[fn] = this[fn].bind(this));
    });
  }

  update(prevState) {}
}