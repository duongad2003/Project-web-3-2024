$('.slide-product').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        autoplay: 5000,
        autoplayTimeout: 3000,
        dots: false,
        mouseDrag: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
    // Brand Slider
$('.brand-slider').slick({
    speed: 5000,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: 'linear',
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: true,
    swipeToSlide: true,
    centerMode: true,
    focusOnSelect: false,
    arrows: false,
    dots: false,
    responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 300,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});