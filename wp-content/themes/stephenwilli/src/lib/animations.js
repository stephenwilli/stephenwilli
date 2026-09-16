import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import SplitType from 'split-type';
import { findOne, findAll } from '@tmbr/utils';

gsap.registerPlugin(ScrollTrigger);

const html = document.documentElement;

// automatically run SplitType on any element with a [data-split] attribute
// ensuring "words" is included with "chars", which is needed to preserve
// correct whitespace and line breaks. This just makes it a little nicer to
// write data-split="chars" vs always remembering to use data-split="words,chars"
// Making this a separate module like this removes the need to call SplitType()
// in multiple spots (in the heading and lead animation below, for example),
// but has to be run **before** the anything that uses it
findAll('[data-split]').forEach(el => new SplitType(el, {
  types: el.dataset.split === 'chars' ? 'words,chars' : el.dataset.split,
  tagName: 'span'
}));

// find all h2 headings - this might make more sense as something like .section-title
// depending on the markup being used.
findAll('.section-title').forEach(h2 => {

  // section title
  const words = findAll('.word', h2);
  if (!words.length) return;

  const timeline = gsap.timeline({paused: true})
    .from(words, {
      autoAlpha: 0, 
      x: '0.2em', 
      duration: 1.5, 
      ease: 'power2.out', 
      stagger: {amount: 0.25}
    });

  // create a trigger to start the timeline animation when the top of
  // the heading element hits the 80% mark in the viewport
  ScrollTrigger.create({
    trigger: h2,
    start: 'top 80%',
    onEnter: () => timeline.play()
  });

  // reset the animation when scrolling away
  // (ie when the top of the heading hits the bottom of the viewport)
  // this will cause the antimation to play only when scrolling down to it
  ScrollTrigger.create({
    trigger: h2,
    start: 'top bottom',
    onLeaveBack: () => {
      timeline.progress(0);
      timeline.pause();
    }
  });
});



