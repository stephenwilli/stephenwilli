import $ from 'jquery';
import wow from './components/animation';
import 'slick-carousel';
import 'magnific-popup';


$(document).ready(function() {
  wow.init();
  
  // NAV SCROLL CLASS
  $(window).scroll(function() {
    if ($(window).scrollTop() > 70 ){
      $('.js-nav-scroll').addClass('scrolled');
    } else {
      $('.js-nav-scroll').removeClass('scrolled');
    }
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
  
  // SLICK SLIDER
  $('#js-hero-slider').slick({
    autoplay: false,
    arrows: false,
    dots: true,
    slidesToShow: 1
  });
  
  $('#js-intro-gallery').slick({
    autoplay: false,
    arrows: true,
    dots: false,
    slidesToShow: 2,
    slidesToScroll: 2,
  });
  
});


