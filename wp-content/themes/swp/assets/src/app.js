export default class App {

  constructor({
    components = {}
  } = {}) {
    this.components = components;
    this.elements = new Set();
  }

  define(name, component) {
    isString(name) && (name = {[name]: component});
    Object.assign(this.components, name);
  }

  start() {
    const nodes = document.querySelectorAll('[data-component]');
    Array.from(nodes).forEach(node => {
      const name = node.dataset.component;
      if (this.components[name] && !this.elements.has(node)) {
        this.elements.add(node);
        new this.components[name](node);
      }
    });
  }
}