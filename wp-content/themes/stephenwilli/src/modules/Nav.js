import Component from '~/lib/Component';
import { attr, on } from '@tmbr/utils';

export default class extends Component {

  constructor(el) {
    super(el);
    on('click', '.nav-toggle', this.onToggleClick);
    on('click', '.nav-item.has-submenu > :where(a, button)', this.onItemClick);
    document.addEventListener('click', this.onClickOutside);
  }

  onItemClick(event) {
    event.preventDefault();
    const button = event.target;
    const active = attr(button, 'aria-expanded') === 'true';
    attr(button, 'aria-expanded', active ? 'false' : 'true');
    this.current && attr(this.current, 'aria-expanded', 'false');
    this.current = active ? null : button;
  }

  onToggleClick(event) {
    const expanded = attr(event.target, 'aria-expanded') === 'true';
    attr(event.target, 'aria-expanded', expanded ? 'false' : 'true');
  }

  onClickOutside(event) {
    if (!this.current || event.target.closest('.nav-item')) return;
    attr(this.current, 'aria-expanded', 'false');
    this.current = null;
  }
}
