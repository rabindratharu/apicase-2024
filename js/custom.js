$ = jQuery
jQuery(document).ready(function ($) {  
        
        var winWidth = $(window).width();
        // console.log(winWidth);
     	var big_elementTopsection =  $('.new-slider-section');
    
        if(winWidth > 1650 ){            
           $( window ).on( 'scroll' , function(){
              
           	var big_topmenuHeight = $('.header-container').height();
            var big_scrnviewtop = $(window).scrollTop() + big_topmenuHeight + 145;			
           
               if( big_elementTopsection.length ){
                   var big_Elementsectiontop = big_elementTopsection.offset().top;
               }            
            var big_elementheight = $('.new-slider-section').height();
            var big_total_element_height = big_Elementsectiontop + big_elementheight;
            
            if ( (big_scrnviewtop > big_Elementsectiontop ) && ( big_scrnviewtop < big_total_element_height  ) ) {
               
               $('.product-features--sticky-items').addClass( 'big-rws-image-sticky' );                 
            
                
            } else {   
                
                $('.product-features--sticky-items').removeClass( 'big-rws-image-sticky' );    
                      
            }
               
           });    
            
        }   
      /////
       if(winWidth > 2100 ){            
           $( window ).on( 'scroll' , function(){
              
           	var big_btopmenuHeight = $('.header-container').height();
            var big_bscrnviewtop = $(window).scrollTop() + big_btopmenuHeight + 180;
			if( big_elementTopsection.length ){
                 var big_bElementsectiontop = big_elementTopsection.offset().top;
            }           
            var big_belementheight = $('.new-slider-section').height();
            var big_btotal_element_height = big_bElementsectiontop + big_belementheight;
            
            if ( (big_bscrnviewtop > big_bElementsectiontop ) && ( big_bscrnviewtop < big_btotal_element_height  ) ) {
               
               $('.product-features--sticky-items').addClass( 'big-rws-image-sticky' );                 
            
                
            } else {   
                
                $('.product-features--sticky-items').removeClass( 'big-rws-image-sticky' );    
                      
            }
               
           });    
            
        } 
    ////////
          if(winWidth > 2600 ){            
           $( window ).on( 'scroll' , function(){
              
           	var big_bbtopmenuHeight = $('.header-container').height();
            var big_bbscrnviewtop = $(window).scrollTop() + big_bbtopmenuHeight + 300;
			if( big_elementTopsection.length ){
                 var big_bbElementsectiontop = big_elementTopsection.offset().top;
            }           
            var big_bbelementheight = $('.new-slider-section').height();
            var big_bbtotal_element_height = big_bbElementsectiontop + big_bbelementheight;
            
            if ( (big_bbscrnviewtop > big_bbElementsectiontop ) && ( big_bbscrnviewtop < big_bbtotal_element_height  ) ) {
               
               $('.product-features--sticky-items').addClass( 'big-rws-image-sticky' );                 
            
                
            } else {   
                
                $('.product-features--sticky-items').removeClass( 'big-rws-image-sticky' );    
                      
            }
               
           });    
            
        }  
    
      /////
     $( window ).on( 'scroll' , function(){
              
         
         	var topmenuHeight = $('.header-container').height();
            var scrnviewtop = $(window).scrollTop() + topmenuHeight;
			if( big_elementTopsection.length ){
                  var Elementsectiontop = big_elementTopsection.offset().top;
            }          
            var elementheight = $('.new-slider-section').height();
            var total_element_height = Elementsectiontop + elementheight;
            var scrnviewwidth = $( window ). width();   
            var scrnviewheight = $( window ). height();   
            
            //var reduced_height =  (13 * elementheight ) / 100 ;
           // var total_reduced_height = total_element_height - reduced_height;

            if ( (scrnviewtop > Elementsectiontop ) && ( scrnviewtop < total_element_height  ) ) {
               
               $('.product-features--sticky-items').addClass( 'rws-image-sticky' );  
                
               // $('.product-features--sticky-items').css({'position': 'fixed'});    
              //  $('.product-features--sticky-items').css('transform',
               //     'translate3d('+( scrnviewwidth * 49.7 )/100  +'px, '+ ( scrnviewheight * 20.5 )/100 +'px, 0px)');
                
            } else {    
                
                $('.product-features--sticky-items').removeClass( 'rws-image-sticky' );    
                
              //  $('.product-features--sticky-items').css({'position': 'absolute' });
              //  $('.product-features--sticky-items').css('transform',
                 //   'translate3d(0px, 0px, 0px)');                
            }
         
         ////
            var scren_scroll = $( window ). scrollTop();  
         	var sectop = $('.product-features--content');
         	if( sectop.length ){
              var sectionTop = sectop.offset().top;
            }           
            var sectionheight = $('.product-features--content').height();
            var totalheight = sectionTop + sectionheight - 620;
         //	console.log( sectionheight  );

            if( scren_scroll > totalheight ){
                $('.product-features--sticky-items').addClass( 'rws-active' );            
              // $('.product-features--sticky-items').css({'position': 'absolute' });  
              // $('.product-features--sticky-items').css('transform','translate3d(0px,1300px, 0px)');
                
            }else{
                $('.product-features--sticky-items').removeClass( 'rws-active' );
               
            }
         /////
          if(winWidth > 2600 ){            
           		$( window ).on( 'scroll' , function(){
                    
                  var bscren_scroll = $( window ). scrollTop();    
                  var bsectop = $('.product-features--content');  
                   if( bsectop.length ){
                       var bsectionTop = bsectop.offset().top;
                    }                 
                  var bsectionheight = $('.product-features--content').height();
                  var btotalheight = bsectionTop + bsectionheight - 900;
         	      

                if( bscren_scroll > btotalheight ){
                  $('.product-features--sticky-items').addClass( 'rws-active' );            
                   // $('.product-features--sticky-items').css({'position': 'absolute' });  
                  // $('.product-features--sticky-items').css('transform','translate3d(0px,1300px, 0px)');                
                  }else{
                    $('.product-features--sticky-items').removeClass( 'rws-active' );               
                  }
                });              
           }
         
         /////
         $.each($(".product-features--item"), function(index, item) {
            
            var top = $(item).offset().top - 200;
            var offset = $(window).scrollTop() ;

            if(offset + $(item).height() >= top) {
              
                $('.product-features--sticky-items picture img').removeClass('show');
                $('.product-features--sticky-items picture img').eq( $(item).index() ).addClass('show');
            }

        });
         
         
    } );    




});