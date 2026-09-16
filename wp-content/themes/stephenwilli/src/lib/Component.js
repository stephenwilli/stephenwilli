import { findOne, findAll, isString, bind, parse } from '@tmbr/utils';

export default class {

  constructor(el) {
    bind(this);
    this.el = isString(el) ? findOne(el) : el;
    this.ui = {};
    const props = this.el.dataset.props;
    this.props = props ? parse(props) : {};
  }

  get width() {
    return this.el.offsetWidth;
  }

  get height() {
    return this.el.offsetHeight;
  }

  findOne(s) {
    return findOne(s, this.el);
  }

  findAll(s) {
    return findAll(s, this.el);
  }

  destroy() {}
}
