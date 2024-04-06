(function ($) {
    "use strict"; 

    // Header Sticky
    $(window).on('scroll',function() {
        if ($(this).scrollTop() > 120){  
            $('.navbar-area').addClass("is-sticky");
        }
        else{
            $('.navbar-area').removeClass("is-sticky");
        }
    });
    

    // Isotope Gallery Js Start
    $('.main-iso').isotope({
        itemSelector: '.item',
        layoutMode: 'fitRows'
    });
    $('.iso-nav ul li').click(function () { 

    // Active Class
    $('.iso-nav ul li').removeClass('active');
    $(this).addClass('active');

    var selector = $(this).attr('data-filter');
    $('.main-iso').isotope({
        filter: selector
    });
    return false;
    }); 


    // Testimonial Owl Carousel Js Start
    $('.slider-content').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass:true,
        nav: true,
        dots: true,
        items: 1,   
        thumbs: false,
        smartSpeed: 850, 
        autoplay: true, 
        autoplayHoverPause: true,
        animateOut: 'fadeOut', 
        mouseDrag: false,
        navText: [ 
			"<img src='assets/image/icons/left.png' alt='Icon Image'>",
			"<img src='assets/image/icons/right.png' alt='Icon Image'>"
		]
    });

 
    // Counter UP Js
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    }); 


    // FancyBox Js
    $("[data-fancybox='video-gallery']").fancybox({
        animationEffect: "zoom-in-out", 
        transitionEffect: "zoom-in-out", 
        transitionDuration: 200,
        animationDuration: 200, 
        overlayOpacity: 0.5, 
       
    }); 


    // Logo Slider Js
    $('.logo-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: false,
		smartSpeed: 500,
		margin: 20,
		autoplayHoverPause: true,
		autoplay: true,
        thumbs: false,
		responsive: {
			0: {
				items: 2
			},
			768: {
				items: 3
			},
			1200: {
				items: 5
			}
		}
	}); 


    // Wow Animation Js
    new WOW().init();


    // Progress Bar Js
    var skillPers = document.querySelectorAll(".skill-per"); 
        skillPers.forEach(function(skillPer) {
        var per = parseFloat(skillPer.getAttribute("data-per"));
        skillPer.style.width = per + "%";
    
        var animatedValue = 0; 
        var startTime = null;
      
        function animate(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = timestamp - startTime;
            var stepPercentage = progress / 1000; // Dividing by duration in milliseconds (1000ms = 1s)
            
            if (stepPercentage < 1) {
            animatedValue = per * stepPercentage;
            skillPer.setAttribute("data-per", Math.floor(animatedValue) + "%");
            requestAnimationFrame(animate);
            } else {
            animatedValue = per;
            skillPer.setAttribute("data-per", Math.floor(animatedValue) + "%");
            }
        }
        
        requestAnimationFrame(animate);
    });    


    // Product Details Slider Js 
    $(".product-slider").owlCarousel({
        loop: true,
        items: 1,
        slideSpeed: 3000, 
        autoplay: true,
        thumbs: true,
        thumbImage: true,
        thumbContainerClass: "owl-thumbs",
        thumbItemClass: "owl-thumb-item",
        dots: false,
        animateOut: 'fadeOutUp',
        animateIn: 'fadeInUp',
        mouseDrag: false
    }); 

      
    // Price Range slider Js   
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 1000,
        values: [120, 800], 
        slide: function (event, ui) {
        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });

    
    $("#amount").val(
        "$" +
        $("#slider-range").slider("values", 0) +
        " - $" +
        $("#slider-range").slider("values", 1)
    ); 


    // Nice Select Js
    $(document).ready(function() {
        $('select').niceSelect();
    });


    // Input Plus & Minus Number JS
    $('.input-counter').each(function() {
        var spinner = jQuery(this),
        input = spinner.find('input[type="text"]'),
        btnUp = spinner.find('.plus-btn'),
        btnDown = spinner.find('.minus-btn'),
        min = input.attr('min'),
        max = input.attr('max');
        
        btnUp.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
        btnDown.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });


    // Go To Top JS 
    var $backToTop = $(".go-to-top");
    $backToTop.hide();
    
    $(window).on('scroll', function() {
      if ($(this).scrollTop() > 100) {
        $backToTop.fadeIn();
      } else {
        $backToTop.fadeOut();
      }
    });
    
    $backToTop.on('click', function(e) {
      $("html, body").animate({scrollTop: 0}, 500);
    });
 
    
    // Preloader
    $(window).on('load', function() {
        $('.preloader').addClass('preloader-deactivate');
    }) 
    

})(jQuery);
