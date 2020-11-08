import $ from 'jquery';
import 'slick-carousel';
import 'magnific-popup';
import isotope from 'isotope-layout';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import { findAll, isArray } from './utils';

gsap.defaults({
  // https://greensock.com/forums/topic/12760-animation-slowjerky-not-smooth-in-firefox/
  rotation: 0.01
});

jQuery(document).ready(function($) {
  
  // GREENSOCK
  findAll('[data-animate]').forEach(el => {
    observer.observe(el);
  });

  // NAV SCROLL CLASS
  $(window).scroll(function() {
    if ($(window).scrollTop() > 30 ){
      $('.js-nav-scroll').addClass('scrolled');
    } else {
      $('.js-nav-scroll').removeClass('scrolled');
    }
  });
  
  // COLLAPSE
  $('#js-collapse-1').addClass( '-open' );
  $('.collapse-item > .collapse-title').on('click', function(e) {
    e.preventDefault();
    if($(this).parent().hasClass('-open')) {
      $(this).parent().removeClass('-open');
    } else {
      $(this).parent().addClass('-open');
    }
    
    if($(this).parent().hasClass('-toggle')) {
       $('.collapse-item').removeClass('-open');
       $(this).parent().addClass('-open');
    }
  });
  
  // COIN SLIDER
  $('#coin-trigger-1').parent().addClass( '-open-item' );
  $('#coin-face-1').addClass( '-show-coin' );
  
  $('.js-coin-trigger').on('click', function(e) {
    e.preventDefault();
    var coinID = $(this).attr('data-coin');
    
    if($(this).parent().hasClass('-open-item')) {
    } else {
    $('.slider-list-item').removeClass('-open-item');
    $(this).parent().addClass('-open-item');
    } 

    if($(coinID).hasClass('-show-coin')) {
    } else {
      $('.coin-face').removeClass('-show-coin');
      $(coinID).removeClass('-hidden-coin');
      $(coinID).addClass('-show-coin');
    }
  });

  // NAV HAMBURGER
  $('.js-hamburger-toggle').on('click', function(e) {
    e.preventDefault();
    $('.navbar-hamburger').toggleClass( '-collapsed' );
    $('.navbar-menu').toggleClass( '-open' );
  });
  
  // $('.menu-item').on('click', function(e) {
  //   $('.navbar-hamburger').removeClass( '-collapsed' );
  //   $('.navbar-menu').removeClass( '-open' );
  // });
  
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

    
  // SLICK SLIDER
  $('#js-hero-slider').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false,
    dots: true,
    slidesToShow: 1
  });
  
  $('#js-intro-list').slick({
    slidesToShow: 7,
    slidesToScroll: 1,
    asNavFor: '#js-intro-images',
    dots: false,
    arrows: false,
    focusOnSelect: true
  });

  $('#js-intro-images').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: false,
     dots: false,
     vertical: true,
     asNavFor: '#js-intro-list'
   });
  
  $('.js-gallery-slider').slick({
    infinite: true,
    autoplay: true,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
    nextArrow: '<span class="slick-next"></span>',
    prevArrow: '<span class="slick-prev"></span>',
    responsive: [
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
  });
  
  $('.js-testimonial-slider').slick({
    infinite: true,
    autoplay: true,
    slidesToScroll: 1,
    slidesToShow: 2,
    nextArrow: '<span class="slick-next"></span>',
    prevArrow: '<span class="slick-prev"></span>',
    responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            infinite: false,
            arrows: false,
            variableWidth: true
          }
        }
      ]
  });

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
  
});

$(window).on('load', function() {
  var grid = document.querySelector('.gallery-mosaic-1');
  if(grid) {
      var iso = new isotope( grid, {
      itemSelector: '.mosaic-image-1',
    });
  };
  
  var grid2 = document.querySelector('.gallery-mosaic-2');
  if(grid2) {
      var iso = new isotope( grid2, {
      itemSelector: '.mosaic-image-2',
    });
  };
});



