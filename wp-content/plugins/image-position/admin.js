jQuery(function($) {

  let View;

  try {
    View = wp.media.view.Attachment.Details.TwoColumn;
  } catch {}

  if (View === undefined) return;

  const marker = $('<div class="image-position-marker">')[0];
  marker.style.transition = marker.dataset.transition = 'all 0.1s cubic-bezier(0.5, 0, 0.1, 1)';

  let img;

  wp.media.view.Modal.prototype.once('open', () => {
    $('.media-modal').append(marker);
  });

  // https://atimmer.github.io/wordpress-jsdoc/wp.media.view.Attachment.Details.TwoColumn.html
  // https://backbonejs.org/#View
  wp.media.view.Attachment.Details.TwoColumn = View.extend({

    events: {
      ...View.prototype.events,
      'click .details-image:not(.icon)' : 'onImageClick',
      'click .image-position-reset'     : 'onResetClick',
      'input [name*="image_opacity"]'   : 'onOpacityChange',
    },

    initialize() {
      View.prototype.initialize.apply(this, arguments);
      this.loaded = this.loaded.bind(this);
      this.resize = this.resize.bind(this);
      window.addEventListener('resize', this.resize);
      setTimeout(() => this.mounted());
    },

    remove() {
      View.prototype.remove.apply(this, arguments);
      window.removeEventListener('resize', this.resize);
    },

    resize() {
      this.reposition(true);
    },

    mounted() {
      this.$input = this.$('[name*="image_position"]');
      this.$reset = this.$('.image-position-reset');

      marker.hidden = true;
      if (this.$input.length === 0) return;

      img = this.$('.details-image')[0];
      img.complete ? this.loaded() : img.addEventListener('load', this.loaded);
    },

    loaded() {
      marker.hidden = !this.$input.val();
      this.reposition(true);
    },

    update(value) {
      const wasHidden = marker.hidden;
      marker.hidden = !value;
      this.$input.val(value).trigger('change');
      this.$reset.attr('disabled', !value);
      this.reposition(wasHidden);
    },

    reposition(snap) {

      if (marker.hidden) {
        return;
      }

      if (snap) {
        marker.style.transition = null;
        setTimeout(() => marker.style.transition = marker.dataset.transition, 100);
      }

      const value = this.$input.val();
      if (!value) return;

      const [ x, y ] = value.split(' ').map(n => parseFloat(n) / 100);
      const modalRect = $('.media-modal').position();
      const imageRect = img.getBoundingClientRect();
      marker.style.left = (imageRect.left - modalRect.left) + (img.width * x) + 'px';
      marker.style.top = (imageRect.top - modalRect.top) + (img.height * y) + 'px';

      this.$el.css('--image-position', value);
    },

    onImageClick(event) {
      if (event.target.src.endsWith('.svg')) return;
      const x = Math.round((event.offsetX / event.target.width) * 100);
      const y = Math.round((event.offsetY / event.target.height) * 100);
      this.update(`${x}% ${y}%`);
    },

    onResetClick(event) {
      this.update(null);
    },

    onOpacityChange(event) {
      this.$el.css('--image-opacity', event.target.value);
    }
  });

});
