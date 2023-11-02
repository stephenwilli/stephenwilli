import Component from '~/lib/Component';
import { html } from '@tmbr/utils';

export default class extends Component {

  constructor(el) {
    super(el);
    console.log('Hero', this.props);
    const video = html`<video src="${this.props.video}" class="absolute fill pin fit-cover" loop muted autoplay playsinline></video>`;
    this.el.prepend(video);
  }

  destroy() {}
}
