$(function() {
    console.log( "ready!" );
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
      //$('body').removeClass('no-scroll');
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
      	//$('body').removeClass('no-scroll');   	
        $('.container-fluid').removeClass('hide');
  	}
});


// $('.gallery-thumb').each(function(){
//   $cover = $(this);
//   $cover.click(function(){
//     $(this).addClass('selected');
//     $(this).parents('li.product-category').siblings('li.product-category').children('div.gallery-thumb').removeClass('selected');
//   });
// });



$('.to-top').click(function(){
  $('html, body').animate({ scrollTop: 875 }, 400);
});







 
 
   

