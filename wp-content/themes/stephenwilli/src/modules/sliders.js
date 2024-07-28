jQuery(function($) {

  $('.js-hero-slider').each(function(elem) {
    $(this).slick({
      autoplay: false,
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
      autoplay: false,
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

});