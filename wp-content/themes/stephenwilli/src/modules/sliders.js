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


  $('.js-carousel').each(function(elem) {
    $(this).slick({
      autoplay: true,
      autoplaySpeed: 6000,
      arrows: false,
      dots: false,
      slidesToShow: 1,
      centerMode: true,
      centerPadding:'300px',
      responsive: [
          {
            breakpoint: 968,
            settings: {
              slidesToShow: 1,
              centerPadding:'20px',
            }
          }
        ]
    });
  });

  $('.js-product-carousel').each(function(elem) {
    $(this).slick({
      autoplay: true,
      autoplaySpeed: 6000,
      arrows: true,
      dots: false,
      slidesToShow: 2,
      centerMode: true,
      variableWidth: true,
      centerPadding:'300px',
      responsive: [
          {
            breakpoint: 968,
            settings: {
              centerPadding:'20px',
              slidesToShow: 3,
            }
          }
        ]
    });
  });

});