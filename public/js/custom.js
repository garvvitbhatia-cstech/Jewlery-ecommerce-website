new WOW().init();

$(window).scroll(function(){
     if ($(this).scrollTop() > 100)
     {
      $('.header ').addClass("sticky");
     }
     else
     {
      $('.header').removeClass("sticky");
     
     }

});

       
$(document).ready(function() {
  $('.test-carousel').owlCarousel({
      loop:true,
      margin:30,
      nav:true,
      dots:false,
      autoplay:true,
      responsive:{
      0:{
        items:1
      },
      600:{
        items:2
      },

      1000:{
          items:2
      }
    }
  });

  $('.ex-carousel').owlCarousel({
      loop:true,
      margin:35,
      nav:true,
      center: true,
      dots:false,
      autoplay:true,
      responsive:{
      0:{
        items:1
      },
      600:{
        items:3
      },
      1000:{
        items:4
      }
      }
  });

  $('.product-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    responsive:{
      0:{
        items:2
      },
      600:{
        items:3
      },
      1000:{
        items:5
      },
      1200:{
        items:6
      }
    }
  });   
        
});




