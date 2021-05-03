import $ from 'jquery';
import 'slick-carousel';
import 'magnific-popup';
import isotope from 'isotope-layout';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import { findAll, isArray } from './utils';

// EMBLA SLIDER?? Can't get the #image-wrap id to move from one slide to the next
// import EmblaCarousel from "embla-carousel";
// import { setupPrevNextBtns, disablePrevNextBtns } from "./prevNext";
// import { setupDotBtns, generateDotBtns, selectDotBtn } from "./dotButtons";
// 
// const wrap = document.querySelector(".embla");
// const viewPort = wrap.querySelector(".embla__viewport");
// const prevBtn = wrap.querySelector(".embla__button--prev");
// const nextBtn = wrap.querySelector(".embla__button--next");
// const dots = document.querySelector(".embla__dots");
// const embla = EmblaCarousel(viewPort, { loop: true, skipSnaps: false });
// const dotsArray = generateDotBtns(dots, embla);
// const setSelectedDotBtn = selectDotBtn(dotsArray, embla);
// const disablePrevAndNextBtns = disablePrevNextBtns(prevBtn, nextBtn, embla);
// 
// setupPrevNextBtns(prevBtn, nextBtn, embla);
// setupDotBtns(dotsArray, embla);
// 
// embla.on("select", setSelectedDotBtn);
// embla.on("select", disablePrevAndNextBtns);
// embla.on("init", setSelectedDotBtn);
// embla.on("init", disablePrevAndNextBtns);

jQuery(document).ready(function($) {

  // NAV SCROLL CLASS
  // $(window).scroll(function() {
  //   if ($(window).scrollTop() > 30 ){
  //     $('.js-nav-scroll').addClass('scrolled');
  //   } else {
  //     $('.js-nav-scroll').removeClass('scrolled');
  //   }
  // });
  
  // // COLLAPSE
  // $('#js-collapse-1').addClass( '-open' );
  // $('.collapse-item > .collapse-title').on('click', function(e) {
  //   e.preventDefault();
  //   if($(this).parent().hasClass('-open')) {
  //     $(this).parent().removeClass('-open');
  //   } else {
  //     $(this).parent().addClass('-open');
  //   }
  // 
  //   if($(this).parent().hasClass('-toggle')) {
  //      $('.collapse-item').removeClass('-open');
  //      $(this).parent().addClass('-open');
  //   }
  // });
  
  

  // NAV HAMBURGER
  $('.js-hamburger-toggle').on('click', function(e) {
    e.preventDefault();
    $('.navbar-hamburger').toggleClass( '-collapsed' );
    $('.navbar-menu').toggleClass( '-open' );
  });
  
  function photoGallery() {
    
    $('.js-photo-open').on('click', function(e) {
      e.preventDefault();
      $(this).children('.photo-open').addClass('-open');
    });
  }
  photoGallery();
  
  if ($(window).width() < 992) {
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
  
  
  // EMBLA SLIDER
  // $('.js-embla-open div:first').attr('id', 'image-warp');
  
  // embla.on('select', (removeclass) => {
  //   var slide = $('.embla__slide');
  //   var slideID = $('.embla__slide').attr('id');
  //   if(slideID === 'image-warp'){
  //     $(slide).removeAttr('id');
  //   }
  // })
  // 
  // embla.on('settle', (addclass) => {
  //   $('.is-selected').attr('id', 'image-warp');
  // })
  

    
  

  //MAGNIFIC POPUP
  $('.js-popup-video').magnificPopup({
    type: 'iframe'
  });
  
  //MAGNIFIC POPUP
  $('.js-popup-modal').magnificPopup({
    type:'inline',
    midClick: true 
  });
  
  $('.js-flex-gallery-img').magnificPopup({
      type: 'image',
      gallery:{
          enabled:true
      },
      image: {
          titleSrc: function(item) {
             return item.el.find('img').attr('title');
          }
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
  var grid = document.querySelector('.js-mosaic-gallery');
  if(grid) {
      var iso = new isotope( grid, {
      itemSelector: '.mosaic-image',
    });
  };
  
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

});



