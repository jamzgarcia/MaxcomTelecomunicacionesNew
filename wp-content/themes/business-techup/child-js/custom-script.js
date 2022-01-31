/*================================================
              Start Testimonilas
=================================================*/
jQuery(function () {
    'use strict';
    jQuery("#testimonial-slider").owlCarousel({
        dots:false,
        nav:false,
        loop: true,
        slideSpeed: 2000,
        autoPlay: true,
        responsiveClass:true,
        navText: [
          '<i class="fa fa-long-arrow-left"></i>',
          '<i class="fa fa-long-arrow-right"></i>'
        ],
        responsive:{
            0:{
                items:1,
                nav:false,
            },
            600:{
                items:2,
                nav:false,
            },
            
            1100:{
                items:3,
            }
        }
    });
});
 
