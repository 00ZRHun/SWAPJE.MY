$(document).ready(function(){
    $('.swap-item-list').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        autoplay: true,
        initialSlide: 0,
        autoplaySpeed: 2000,        
        infinite: false,
        variableWidth: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
            slidesToShow: 3,
            infinite: true
            }

        }, {
            breakpoint: 600,
            settings: {
            slidesToShow: 3,
            dots: true
            }

        }, {

            breakpoint: 300,
            settings: "unslick" // destroys slick

        }]
    });
  });