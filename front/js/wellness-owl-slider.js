// JavaScript Document
var partners_carousel = $("#partners-carousel");
var travel_destination_carousel = $("#travel-destination-carousel");
	travel_destination_carousel.owlCarousel({
	items:3,
	loop:true,
	margin:30,
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