import accordion from './accordion';
import lazyload from './lazyload';
import Hero from './Hero';
import Nav from './Nav';

export default {
  '.nav': Nav,
  '.hero': Hero,
  '.accordion': accordion,
  '[data-src]': lazyload
};
