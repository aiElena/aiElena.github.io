

$( document ).ready(function() {
    
     $('.menuToggle').on('click',function(){
          $('.menu').slideToggle(300, function(){
               if($(this).css('display') === 'none'){
                    $(this).removeAttr('style');
               }
          });
     });
	     $('.sl').slick({
        dots: true,
        autoplay: true,
		 responsive:[
    {
      breakpoint: 414,
      settings: {
		dots: false,
             }
    }] 
    });

});