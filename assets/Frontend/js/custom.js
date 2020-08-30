/*
Template Name    : MIIAS - Furniture Bootstrap 4 Reaponsive HTML5 Template
Version          : 1.0.0
Author           : Ashish Shah
Author URI       : http://ncodetechnologies.com//
Created.         : March 2020
File Description : Main js file of the template

// ------------------------------------------ //
//              Table Of Content              //
// ------------------------------------------ //

1.  Preloader
2.  Searchbar
3.  Acount DroapDown
4.  MiniCart
5.  Header-aside & Mobile Header
6.  Home Slider 1
7.  Home Slider 2
8.  Home Slider 3
9.  Home Slider 4
10. Owl carousel partner logo
11. Testimonial Carousel
12. Testimonial Carousel 2
13. Filter
14. Top Products
15. Quantity Number
16. Fancy ScrollBar
17. Filter Product

*/



$(function() {
  'use strict';


  ///////---------------1. Preloader -------------///////

  $('.load').delay(2500).fadeOut('slow');
    if (window.matchMedia("(min-width: 768px)").matches) {
       function footerFix(){
          var footerHeight = $('.footer-main').outerHeight();
          $('body .content-wrapper').css('margin-bottom', footerHeight+'px');
        }
        $(window).resize(function(){
          footerFix();
        });
        $(document).ready(function(){
          footerFix();
        });
    } else {
  }
        
  ///////---------------2. Searchbar -------------/////// 
    
  var searchToggle = function() {
    $('.searchbar .iconpart').on('click',function() {
      $(".search-form-wrap").slideToggle();
      $(this).children('i').toggleClass("icon-magnifying-glass icon-add")
    });
  };

  ///////---------------3. Acount DroapDown -------------/////// 

  var AcountDroapDown = function() {
    $('.account-manager .iconpart').on('click',function() {
      $(".account-droapdown").slideToggle();
    });
  };

  ///////---------------4. MiniCart -------------/////// 

  var MiniCart = function() {
    $('.cart .iconpart').on('click',function() {
      $(".minicart-droapdown").slideToggle();
    });
  };

  ///////---------------5. Header-aside & Mobile Header -------------/////// 

  var HeaderAside = function() {
    // var $abc = $('.header-aside .bg-overlay');
    $('.header-aside .iconpart').on('click',function() {
      $(".aside-box-content .content-info").addClass('active');
      $('.aside-box-content .bg-overlay,').addClass('show');
    });
    $('.aside-box-content .remove').click(function(event) {
      $('.aside-box-content .content-info').removeClass("active");
      $('.aside-box-content .bg-overlay,').removeClass("show");
    });
    if("$('.navbar-container').addClass('overlay');") {
      $('.aside-box-content .bg-overlay').click(function(){
        $('.remove').trigger('click');
      });
    }
    $('.navbar  .navbar-toggler').on('click',function() {
      $('.navbar .bg-overlay').addClass('show');
      $('.navbar #collapsibleNavbar').addClass('active');
      $('html').css('overflow-y','hidden');
    });
    $('.navbar .remove').click(function(event) {
      $('.navbar .bg-overlay').removeClass("show");
      $('.navbar #collapsibleNavbar').removeClass("active");
      $('html').removeAttr('style');
    });
    if("$('.header-main').addClass('overlay');") {
      $('.header-main .bg-overlay').click(function(){
        $('.remove').trigger('click');
      });
    }

    $('header .navbar-nav .has-children .expand').on('click',function(){
      $(this).next().slideToggle();
      $(this).toggleClass('minus');
    });
  }
  ///////---------------6. Home Slider 1 -------------///////
  var bannerCarousel = function() {
     $('#owl-homebanner1').owlCarousel({
          loop: true,
          item: 1,
          nav: true,
          autoplay: false,
          autoplayTimeout: 5000,
          navText: ['<i class="icon-down-arrow"></i>', '<i class="icon-down-arrow"></i>'],
          dotsData: false,
          dots: true,
          responsive: {
              0: {
                  items: 1
              },
              768: {
                  items: 1
              },
              1000: {
                  items: 1
              }
          }
      });
  }
  
  ///////---------------7. Home Slider 2 -------------///////
  var bannerCarousel2 = function() {
   $('#owl-homebanner2').owlCarousel({
        loop: true,
        item: 1,
        nav: true,
        autoplay: false, 
        smartSpeed: 2500,
        navText: ['pre', 'Next'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
  }
 
   ///////---------------8. Home Slider 3 -------------///////
  var bannerCarousel3 = function() {
   $('#owl-homebanner3').owlCarousel({
        loop: true,
        item: 1,
        nav: false,
        autoplay: false, 
        smartSpeed: 2500,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
  }
  
   ///////---------------9. Home Slider 4 -------------///////
  var bannerCarousel4 = function() {
   $('#owl-homebanner4').owlCarousel({
        loop: true,
        item: 1,
        nav: true,
        autoplay: false, 
        smartSpeed: 2500,
        navText: ['pre', 'Next'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
  }
  
  ///////---------------10. Owl carousel partner logo -------------///////
  $('.plogo-carousel').owlCarousel({
      loop:true,
      margin:20,
      nav:false,
      dots:false,
      center:true,
      autoplay:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
  });

  ///////---------------11. Testimonial Carousel -------------///////
  $('.testi-carousel').owlCarousel({
      loop:true,
      margin:0,
      nav:true,
      navText: ["<i class='icon-down-arrow'></i>","<i class='icon-down-arrow'></i>"],
      dots:false,
      autoplay:true,
      items:1
  });

  ///////---------------12. Testimonial Carousel 2 -------------///////
  $('.testimonial-wrapper.style-2 .testi-carousel').owlCarousel({
      loop:true,
      margin:0,
      nav:false,
      dots:true,
      autoplay:true,
      items:1
  });

  ///////---------------13. Filter -------------///////
  var $filters = $('.bseller-wrapper .filters [data-filter]'),
      $boxes = $('.bseller-wrapper .boxes [data-cat]');

      $filters.on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        
        $filters.removeClass('active');
        $this.addClass('active');

        var $filterColor = $this.attr('data-filter');
        
        if ($filterColor == 'all') {
          $boxes.removeClass('is-animated')
            .fadeOut().promise().done(function() {
              $boxes.addClass('is-animated').fadeIn();
            });
        } else {
          $boxes.removeClass('is-animated')
            .fadeOut().promise().done(function() {
              $boxes.filter(function(i,el){ 
                  return el.dataset.cat.split(',').indexOf($filterColor)!==-1;
              })
                .addClass('is-animated').fadeIn();
            });
        }
      });

  ///////---------------14. Top Products -------------///////
  $('.product-carousel,.product-carousel3,.product-carousel2,.product-carousel1').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    navText: ["<i class='icon-left-arrow'></i>","<i class='icon-left-arrow'></i>"],
    dots:true,
    // autoplay:true,
    responsive:{
      0:{
          items:1
      },
      576:{
          items:2
      },
      992:{
          items:3
      },
      1000:{
          items:4
      }
    }
  });

  ///////---------------15. Quantity Number -------------///////
  var quantityNumber = function() {
    $(".button").on("click", function() {
      var $button = $(this);
      var oldValue = $button.parent().find("input").val();
      if ($button.html() == '<i class="icon-add-1"></i>') {
        var newVal = parseFloat(oldValue) + 1;
      } else {
        // Don't allow decrementing below one
        if (oldValue > 1) {
          var newVal = parseFloat(oldValue) - 1;
        } else {
          newVal = 1;
        }
      }
      $button.parent().find("input").val(newVal);
    });
  };
      


  $(function() {
    navigation();
    searchToggle();
    AcountDroapDown();
    MiniCart();
    HeaderAside();
    quantityNumber();
    bannerCarousel();
    bannerCarousel2();
    bannerCarousel3();
    bannerCarousel4();
  });
});


///////---------------16. Fancy ScrollBar -------------///////

// $(window).on("load",function(){
//   $(".content").mCustomScrollbar();
// });

///////---------------17.  sticky header  -------------/////// 

function navigation(){
  var $window = $(window),
  $headerSticky = $('.header-sticky');
  // $headerHeight = $('header').height();

  if ($window.scrollTop() >= 200 && $window.width() > 991) {
    $headerSticky.addClass('is-sticky');
    $('body').css('magin-top','95px');
  }
  else {
    $headerSticky.removeClass('is-sticky');
  }

  //code for scroll top
  var scroll = $window.scrollTop();
  if (scroll >= 400) {
    $('.scroll-top').fadeIn();
  } else {
    $('.scroll-top').fadeOut();
  }
}
$(document).ready(function(){
  navigation();
});
$(document).scroll(function(){
  navigation();
});
$(window).resize(function(){
  navigation();
});

///////---------------17.  Filter Product  -------------/////// 

var $filters = $('.topproducts-section .filters [data-filter]'),
  $boxes = $('.topproducts-section .boxes [data-cat]');

$filters.on('click', function(e) {
  e.preventDefault();
  var $this = $(this);
  
  $filters.removeClass('active');
  $this.addClass('active');

  var $filterColor = $this.attr('data-filter');
    $boxes.removeClass('is-animated')
      .fadeOut().promise().done(function() {
        $boxes.filter(function(i,el){ 
            return el.dataset.cat.split(',').indexOf($filterColor)!==-1;
        })
        .addClass('is-animated').fadeIn();
      });
});


