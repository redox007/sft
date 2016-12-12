// JavaScript Document
  var bestoffer_carousel = $("#bestoffer-carousel");
	var portfolio_carousel = $("#portfolio-carousel");
	var library_carousel = $("#library-carousel");
	var partners_carousel = $("#partners-carousel");
	
	bestoffer_carousel.owlCarousel({
		items:4,
		lazyLoad:true,
		loop:true,
		margin:0,
		nav: true,
		dots: false,
		autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
		responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        },
				1600:{
            items:4
        }
    }
	});
	
	portfolio_carousel.owlCarousel({
		items:3,
		lazyLoad:true,
		loop:true,
		margin:20,
		nav: true,
		dots: false,
		autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
		responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
	});
	
	partners_carousel.owlCarousel({
		items:3,
		lazyLoad:true,
		loop:true,
		margin:20,
		nav: true,
		dots: false,
		responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
	});
	
	library_carousel.owlCarousel({
		margin:45,
		loop:true,
		autoWidth:true,
		items:4
	});