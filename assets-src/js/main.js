$(function() {

 // fancy fadeIn

  var $bg = $('.banner');
  var backgroundImage = window.getComputedStyle($bg[0], null).backgroundImage;
  var image = backgroundImage.match(/url\((.*?)\)/)[1];
  image = image.replace(/"/g, "");
  var sprite = new Image();
  sprite.src = image;
  sprite.onload = function() {
    $bg.addClass('reveal');
  }       



    console.log( "ready plz!!!" );
    // gallery adjust
    $('.thumb>img').each(function(){
    var high = $(this).attr('height');
    var wide = $(this).attr('width');
    var texty = $(this).closest('a').next('a');
    var diff = wide - high;
    var size = "'w: " + wide + " h: " + high + " diff: " + diff + "'";
    
    if(high > wide){
      console.log("wide");

      $(this).addClass("fuzzyyy actually-tall");
      $(this).addClass(size);
      $(texty).addClass("wuzzy");
    } if (wide > high){
      console.log("tall");
      $(this).addClass("not-fuzzy actually-wide");
      $(texty).addClass("wuzzy wuzzy-else");
    }
  });

    // bio, mission
    $('.link-spoof').each(function(){
      $butt = $(this);
      var path = '#bio-' + $butt.attr('id');
      $butt.click(function(){
        $(path).fadeIn(400).removeClass('hide').promise().done(function(){
          
          $('.container-fluid').addClass('hide');
        });
        
      });
    });

    $('.closer').click(function(){
      $( '.bio' ).fadeOut(400);
      $('.container-fluid').removeClass('hide');
    });

    //sidebar
    // sidebar
    $(function(){
      $('.mini-submenu').show();
      $('#slide-submenu').on('click',function() {   
            //alert('clicked');        
            $(this).closest('.list-group').toggle();
              $('.mini-submenu').removeClass('sneaky').fadeIn(150);
            
          });

      $('.mini-submenu').on('click',function(){               
            $(this).next('.list-group').toggle();
            $('.mini-submenu').hide();
        });
      });






}); // document ready




$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) { // ESC
        $( '.bio' ).fadeOut(400);
        $('.container-fluid').removeClass('hide');
  	}
});


$('.to-top').click(function(){
  $('html, body').animate({ scrollTop: 875 }, 400);
});

// scroll test

// // Select all links with hashes
// $('a[href*="#"]')
//   // Remove links that don't actually link to anything
//   .not('[href="#"]')
//   .not('[href="#0"]')
//   .click(function(event) {
//     // On-page links
//     if (
//       location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
//       && 
//       location.hostname == this.hostname
//     ) {
//       // Figure out element to scroll to
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//       // Does a scroll target exist?
//       if (target.length) {
//         // Only prevent default if animation is actually gonna happen
//         event.preventDefault();
//         $('html, body').animate({
//           scrollTop: target.offset().top
//         }, 500);
//       }
//     }
//   });








 
 
   

