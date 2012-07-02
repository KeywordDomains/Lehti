$(document).ready(function() {
	$("a[href$='.jpg'], a[href$='.jpeg'], a[href$='.png'], a[href$='.gif']").fancybox();

	$(window).on('resize', function(e) {
		$('#feature.full li').css('width', window.innerWidth);
	});
	
	var slides = $('#feature li').length,
		index = 0,
		autoAnimate = true;
	
	function next() {
		$('#feature.slider li:eq(' + index + ')').fadeOut(500, function() {
			if((index + 1) < slides) {
				index++;
			}
			else {
				index = 0;
			}
			$('#feature.slider li:eq(' + index + ')').fadeIn();
		});
	}
	
	function prev() {
		$('#feature.slider li:eq(' + index + ')').fadeOut(500, function() {
			if(index > 0) {
				index--;
			}
			else {
				index = (slides - 1);
			}
			$('#feature.slider li:eq(' + index + ')').fadeIn();
		});
	}
	
	function animate() {
		setTimeout(function() {
			if(autoAnimate === true) {
				next();
				animate();
			}
		}, 5000);
	}
	
	animate();

	$('#feature .next').on('click', function(e) {
		next();
		autoAnimate = false;
	});
	$('#feature .pre').on('click', function(e) {
		prev();
		autoAnimate = false;
	});
	
	$('#showMobileNav').on('click', function(e) {
		$('#primaryNav, #secondaryNav').slideToggle();
	});

if(window.innerWidth > 481) {
	$('#content .parent').masonry({
	    // options
	    itemSelector : 'article',
	    columnWidth : (window.innerWidth > 960) ? 342 : 312,
	});

	$('#primaryNav li, #secondaryNav li').hover(function() {
	$(this).children('.sub-menu').stop().slideDown(100);
}, function() {
	$(this).children('.sub-menu').stop().slideUp(100);
});
}

// Touch Device Specifics
yepnope({
	test: Modernizr.touch,
	yep: $('body').attr('data-templateUrl') + '/js/vendor/hammer.js',
	callback: function(result, key) {
		var feature = $('#feature')[0];
		var hammer = new Hammer(feature, {
			tap_max_interval: 700
		});

		// Let Touch Devices swipe the feature instead of using those old-fashioned buttons
		hammer.onswipe = function(e) {
			autoAnimate = false;

			if(e.direction === "left") {
				next();
			} else if(e.direction === "right") {
				prev();
			}
		}
	}
});

});