jQuery(function($) {

  $('.js-hero-slider').each(function(elem) {
    $(this).slick({
      autoplay: true,
      fade: true,
      autoplaySpeed: 8000,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
    });
  });

});