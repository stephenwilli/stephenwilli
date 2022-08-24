import $ from 'jquery';
import 'slick-carousel';
import 'magnific-popup';
import isotope from 'isotope-layout';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import { findAll, isArray } from './utils';
gsap.registerPlugin(ScrollTrigger, SplitText);

jQuery(document).ready(function($) {

  // NAV SCROLL CLASS
  $('.internal-template').scroll(function() {
    if ($('.internal-template').scrollTop() > 30 ){
      $('.js-nav-scroll').addClass('scrolled');
    } else {
      $('.js-nav-scroll').removeClass('scrolled');
    }
  });
  
  // GSAP Animations
  
  var tl = gsap.timeline(), 
  mySplitText = new SplitText("#loader-heading", {type:"words,chars"}), 
  chars = mySplitText.chars;
  gsap.set("#loader-heading", {perspective: 400});
  tl.from(chars, {duration: .5, opacity:0, scale:.9, y:10, delay: 1, transformOrigin:"0% 50% -50", ease:"easeInOut", stagger: 0.03}, "+=0");
  
  var tl2 = gsap.timeline(), 
  mySplitText = new SplitText("#intro-title", {type:"words,chars"}), 
  chars = mySplitText.chars;
  gsap.set("#intro-title", {perspective: 400});
  tl2.from(chars, {duration: .3, opacity:0, scale:.9, y:10, delay: .5, transformOrigin:"0% 50% -50", ease:"easeInOut", stagger: 0.02}, "+=0");
  
  var tl3 = gsap.timeline(), 
  mySplitText = new SplitText("#js-reveal-title", {type:"words,chars"}), 
  chars = mySplitText.chars;
  gsap.set("#js-reveal-title", {perspective: 400});
  tl3.from(chars, {duration: .3, opacity:0, scale:.9, y:10, delay: 1, transformOrigin:"0% 50% -50", ease:"easeInOut", stagger: 0.02}, "+=0");

  // var loadingtl = gsap.timeline(); 
  // loadingtl.to('#site-loader', {duration: .3, opacity:0, width: 0, ease:"easeInOut"}, "+=0");
      

  // NAV HAMBURGER
  $('.js-hamburger-toggle').on('click', function(e) {
    e.preventDefault();
    $('.navbar-hamburger').toggleClass( '-collapsed' );
    $('.navbar-menu').toggleClass( '-open' );
  });
  
  // PHOTO OPEN FROM SERIES TO FULL WIDTH - needs tweaking
  // function photoGallery() {
  //   if ($(window).width() > 992) {
  //     $('.js-photo-open').on('click', function(e) {
  //       e.preventDefault();
  //       if($(this).hasClass('-opened')){
  //         $(this).removeClass('-opened');
  //       } else {
  //         $(this).addClass('-opened')
  //       }
  //       $(this).children('.photo-open').addClass('-open');
  //     });
  //   }
  // }
  // photoGallery();
  
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
  // set the variables
    var timer;
    var mouseX = 0, mouseY = 0;
    var xp = 0, yp =0;
    var circle = $("#js-cursor-circle");

    function mouseStopped(){    
        // if mouse stop moving remove class moving 
        // it will hide the circle with opacity transition                           
        circle.removeClass('moving');
    }
   
    $(document).mousemove(function(e){
      // if mouse start moving add class moving
        // it will show the circle with opacity transition 
      circle.addClass('moving');
      // get the mouse position minus 160px to center the circle
        mouseX = e.pageX - 160;
        mouseY = e.pageY - 160; 
        // if mouse stop moving clear timer and call mouseStopped function
        clearTimeout(timer);
        timer=setTimeout(mouseStopped,3000);   
    });
    
    // set the momentum with setInterval function
    var loop = setInterval(function(){
       // change 12 to alter damping higher is slower
       xp += ((mouseX - xp)/4);
       yp += ((mouseY - yp)/4);
       circle.css({left: xp +'px', top: yp +'px'});  // 
    }, 30);
  
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





