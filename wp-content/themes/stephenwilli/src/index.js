import { findOne, findAll, prop, ro } from '@tmbr/utils';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import polyfills from './lib/polyfills';
import modules from './modules';
import mount from './lib/mount';
import isotope from 'isotope-layout';
import './lib/hello';
import './lib/icons';
import './modules/sliders'
// import './lib/animations';
import './styles/index.scss';

gsap.registerPlugin(ScrollTrigger);

console.log('jQuery', window.jQuery === window.$);
jQuery(function($) { console.log('jQuery', $.fn.jquery); });

const html = document.documentElement;
const body = document.body;

function init() {

  const mq = window.matchMedia('(hover: none), (pointer: coarse)');
  html.classList.add(mq.matches ? 'has-touch' : 'has-hover');
  html.classList.replace('loading', 'loaded');

  const banner = findOne('.site-banner');
  const header = findOne('.site-header');

  ro(body, () => {
    prop(html, '--vh', `${window.innerHeight * 0.01}px`);
    prop(html, '--banner-height', `${banner ? banner.offsetHeight : 0}px`);
    prop(html, '--header-height', `${header ? header.offsetHeight : 0}px`);
  });

  mount(modules);
}

if (polyfills.length) {
  const script = document.createElement('script');
  script.src = `https://cdnjs.cloudflare.com/polyfill/v3/polyfill.min.js?features=${polyfills.join(',')}&flags=gated&ua=${window.navigator.userAgent}`;
  script.onload = init;
  body.appendChild(script);
} else { init() }


jQuery(document).ready(function($) {

  // NAV SCROLL CLASS
  $('.internal-template').scroll(function() {
    if ($('.internal-template').scrollTop() > 30 ){
      $('.js-nav-scroll').addClass('scrolled');
    } else {
      $('.js-nav-scroll').removeClass('scrolled');
    }
  });

  // FITVIDS HACK
  $('.content iframe[src*="youtube"],iframe[src*="vimeo"]').wrap("<div class='video-frame'/>");
  
  // GSAP Animations
  
  // var tl = gsap.timeline(), 
  // mySplitText = new SplitText("#loader-heading", {type:"words,chars"}), 
  // chars = mySplitText.chars;
  // gsap.set("#loader-heading", {perspective: 400});
  // tl.from(chars, {duration: .3, opacity:0, scale:.9, y:10, delay: .9, transformOrigin:"0% 50% -50", ease:"easeInOut", stagger: 0.03}, "+=0");
  
  // var tl2 = gsap.timeline(), 
  // mySplitText = new SplitText("#intro-title", {type:"words,chars"}), 
  // chars = mySplitText.chars;
  // gsap.set("#intro-title", {perspective: 400});
  // tl2.from(chars, {duration: .3, opacity:0, scale:.9, y:10, delay: .5, transformOrigin:"0% 50% -50", ease:"easeInOut", stagger: 0.02}, "+=0");

  // var loadingtl = gsap.timeline(); 
  // loadingtl.to('#site-loader', {duration: .3, opacity:0, width: 0, ease:"easeInOut"}, "+=0");
      

  // NAV HAMBURGER
  $('.js-hamburger-toggle').on('click', function(e) {
    e.preventDefault();
    $('.navbar-hamburger').toggleClass( '-collapsed' );
    $('.navbar-menu').toggleClass( '-open' );
  });

  $('.split-half').on('click', function(e) {
    e.preventDefault();

    $(this).addClass( '-open' );
    
    var href = $('> .split-link', this).attr("href"); 

    setTimeout(function() {
      window.location.href = href;
    },10);
  });
  
  
  if ($(window).width() > 992) {
    // $('.parent-menu > .menu-item > a').addClass('click-through');
    $('.parent-menu > .menu-item-has-children > a').on('click',function(e){
      if($(this).parent().hasClass('-open')) {}
      else {
        e.preventDefault();
        $('.sub-menu').removeClass('-open');
        $('.menu-item-has-children').removeClass('-open');
        $(this).toggleClass('-open');
        $(this).parent().toggleClass('-open');
        $(this).parent().children('ul').toggleClass('-open');	
      }
    });
  }

  
  $('.js-flex-gallery-img').magnificPopup({
      type: 'image',
      gallery:{
          enabled:true
      },
      titleSrc: function(item) {
          return item.el.attr('title');
        }
  });
  
  // EXTERNAL LINKS TARGET BLANK
  $('a').each(function() {
     var a = new RegExp('/' + window.location.host + '/');
     if (!a.test(this.href)) {
        $(this).attr("target","_blank");
     }
  });

  var warp = $('#image-warp');
  if(warp.length > 0){
    function hoverImage() {
      // TILT HOVER
      let parent = document.getElementById('image-warp')
      let overlay = document.getElementById('overlay')
      let background = document.getElementById('background')
      const overlayH = overlay.clientHeight
      const overlayW = overlay.clientWidth
      const bgH = background.clientHeight
      const bgW = background.clientWidth
      
      parent.addEventListener('mousemove', handleOverlay);
      parent.addEventListener('mousemove', handleBackground);

      function handleOverlay(e) {
        const oxVal = e.layerX
        const oyVal = e.layerY
        const oyRotation = 6 * ((oxVal - overlayW / 2) / overlayW)
        const oxRotation = -6 * ((oyVal - overlayH / 2) / overlayH)
        const ostring = 'perspective(500px) scale(1.1) rotateX(' + oxRotation + 'deg) rotateY(' + oyRotation + 'deg)'
        overlay.style.transform = ostring
      }
      
      function handleBackground(e) {
        const bxVal = e.layerX
        const byVal = e.layerY
        const byRotation = 3 * ((bxVal - bgW / 2) / bgW)
        const bxRotation = -3 * ((byVal - bgH / 2) / bgH)
        const bstring = 'perspective(500px) scale(1.1) rotateX(' + bxRotation + 'deg) rotateY(' + byRotation + 'deg)'
        background.style.transform = bstring
      }

      parent.addEventListener('mouseout', function() {
        overlay.style.transform = 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)'
        background.style.transform = 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)'
      })

      parent.addEventListener('mousedown', function() {
        overlay.style.transform = 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)'
        background.style.transform = 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)'
      })

      parent.addEventListener('mouseup', function() {
        overlay.style.transform = 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)'
        background.style.transform = 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)'
      })
    };

    hoverImage();
  }
  
});

$(window).on('load', function() {



  
  // see [data-animate] styles in scss/base/_animation.scss
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      entry.isIntersecting && requestAnimationFrame(() => {
        entry.target.classList.add('animate');
        observer.unobserve(entry.target);
      });
    });
  });
  
  findAll('[data-animate]').forEach(el => {
    observer.observe(el);
  });
  
  setTimeout(function() {
    $('#site-loader').addClass('-loaded');
  });

  $('.js-mosaic-gallery').each((i, item) => {
    new isotope( item, {
        itemSelector: '.mosaic-image'
      });
  });

});