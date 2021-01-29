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


  
  function hoverImage() {
    // TILT HOVER
    let parent = document.getElementById('image-warp-1')
    let overlay = document.getElementById('overlay-1')
    let background = document.getElementById('background-1')
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
  
  
  function hoverImage2() {
    // TILT HOVER
    let parent = document.getElementById('image-warp-2')
    let overlay = document.getElementById('overlay-2')
    let background = document.getElementById('background-2')
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
      overlay.style.transform = 'perspective(00px) scale(1.1) rotateX(0) rotateY(0)'
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
  
  hoverImage2();
  
  // window.addEventListener("deviceorientation", function(event) {
  //   console.log(event.gamma);
  //   let position = Math.round(event.gamma);
  // });
  // 
  // const overlayTilt = document.getElementById("overlay");
  // const bgTilt = document.getElementById("background");
  // const limit = 45;
  // window.addEventListener("deviceorientation", function(event) {
  // let position = Math.round(event.gamma);
  //  if (Math.abs(position) > limit) {
  //        if (position > limit) {
  //             position = limit;
  //         } else {
  //             position = -limit;
  //             }
  //         }
  // position = position / -100;
  // let style = "rotateY(" + position + "deg)";
  // overlayTilt.style.transform = style;
  // bgTilt.style.transform = style;
  // });
  
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



