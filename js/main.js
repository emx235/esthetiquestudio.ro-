$(document).ready(function(){

    $('#slider').nivoSlider({
        effect: 'fade',                 // Specify sets like: 'fold,fade,sliceDown'
        slices: 15,                       // For slice animations
        boxCols: 8,                       // For box animations
        boxRows: 4,                       // For box animations
        animSpeed: 500,                   // Slide transition speed
        pauseTime: 2500,                  // How long each slide will show
        startSlide: 0,                    // Set starting Slide (0 index)
        directionNav: false,               // Next & Prev navigation
        controlNav: false,                 // 1,2,3... navigation
        controlNavThumbs: false,          // Use thumbnails for Control Nav
        pauseOnHover: true,               // Stop animation while hovering
        manualAdvance: false,             // Force manual transitions
        prevText: 'Prev',                 // Prev directionNav text
        nextText: 'Next',                 // Next directionNav text
        randomStart: false,               // Start on a random slide
    });

    $('#slider-about-us').nivoSlider({
        effect: 'fade',                 // Specify sets like: 'fold,fade,sliceDown'
        slices: 15,                       // For slice animations
        boxCols: 8,                       // For box animations
        boxRows: 4,                       // For box animations
        animSpeed: 500,                   // Slide transition speed
        pauseTime: 2500,                  // How long each slide will show
        startSlide: 0,                    // Set starting Slide (0 index)
        directionNav: false,               // Next & Prev navigation
        controlNav: false,                 // 1,2,3... navigation
        controlNavThumbs: false,          // Use thumbnails for Control Nav
        pauseOnHover: true,               // Stop animation while hovering
        manualAdvance: false,             // Force manual transitions
        prevText: 'Prev',                 // Prev directionNav text
        nextText: 'Next',                 // Next directionNav text
        randomStart: false,               // Start on a random slide
    });
    
    //scroll to page-top
    $('#back-top').on('touchstart click', function(){
        $('html, body').animate({ scrollTop: 0 }, 1000);
    });

    var wow = new WOW(
    {
      boxClass:     'wow',      // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset:       0,          // distance to the element when triggering the animation (default is 0)
      mobile:       false       // trigger animations on mobile devices (true is default)
      }
    );
    wow.init();
    // collapse navigation menu after clicking the link; click on search icon -> navigation menu does not collapse
    //     $('.nav li a').on('click', function(){
    //     if($('.navbar-collapse').css('display') !='none'){
    //         $(".navbar-collapse").trigger( "click" );
    //     }
    // });



 });
