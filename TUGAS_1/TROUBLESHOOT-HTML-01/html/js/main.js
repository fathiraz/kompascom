$(document).ready(function(){
	
	"use strict";

	// TOP slider
	$('.soulg2 .flexslider').flexslider({
		animation: "fade",
		animationSpeed: 1000,
		controlNav: false,
    });
	/* End jQuery slider */

	// PROFILE slider
	$('.soulg2.mt1.profile-home.flexslider').flexslider({
		animation: "slide",
		animationLoop: true,
		directionNav: true,
		itemWidth: 210,
		itemMargin: 5,
		minItems: 2,
		maxItems: 1
    });
	/* End jQuery slider */
	
});