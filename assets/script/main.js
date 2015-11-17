   (function ($) {
		$('.vidImages').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 3,
			responsive: [{
				breakpoint: 480,
				settings: {
					
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}]
		});
		
		 
	}(jQuery));