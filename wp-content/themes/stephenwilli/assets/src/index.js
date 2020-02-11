import $ from 'jquery';
import wow from './components/animation';
import 'slick-carousel';
import 'magnific-popup';


$(document).ready(function() {
  wow.init();
  
  // NAV SCROLL CLASS
  $(window).scroll(function() {
    if ($(window).scrollTop() > 30 ){
      $('.js-nav-scroll').addClass('scrolled');
    } else {
      $('.js-nav-scroll').removeClass('scrolled');
    }
  });
  
  // COLLAPSE
  $('.js-load-more').on('click', function(e) {
    e.preventDefault();
    $('.testimonial-wrap.-extra').toggleClass( '-open' );
  });
  

  // NAV HAMBURGER
  $('.js-hamburger-toggle').on('click', function(e) {
    e.preventDefault();
    $('.navbar-hamburger').toggleClass( '-collapsed' );
    $('.navbar-menu').toggleClass( '-open' );
  });
  
  $('.menu-item').on('click', function(e) {
    $('.navbar-hamburger').removeClass( '-collapsed' );
    $('.navbar-menu').removeClass( '-open' );
  });

  //MAGNIFIC POPUP
  // $('.js-lightbox-gallery').magnificPopup({
  //   type: 'image',
  //   gallery: {
  //       enabled: true
  //   }
  // });
  // 
  // $('.js-popup-video').magnificPopup({
  //   type: 'iframe'
  // });


  // SLICK SLIDER
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
  
});


