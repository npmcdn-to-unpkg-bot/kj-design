
	$(document).ready(function() {
		
        $('.abcd').click(function(){
            $('.slick-current').find('.aaaaa img').css('opacity','0');
            $thisImg = $(this).data('image');
            $('.slick-current').find('.aaaaa img').attr('src',$thisImg)
            $('.slick-current').find('.aaaaa img').animate({opacity: "1"},300);
        })
        
        $('.fancybox').fancybox();
        
//        slider part
        $('.slider-for').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: false,
          draggable:false,
          arrows: true,
          //adaptiveHeight: true,
         
         responsive: [
            {
                 breakpoint: 1199,
                    settings: {
                        adaptiveHeight: true
                    }
                }
             ]

        });
        
//        nav sequence slider
        
        $('.slider-for').on('afterChange', function(slideIndex){
            var thisIndex = $(this).slick('slickCurrentSlide');
           /// alert(thisIndex);
            $('.nav-panel li').removeClass('slick-current');
            $('.nav-panel li').eq(thisIndex).addClass('slick-current');
            //
            if( $('#design_sc').hasClass('slick-current')){
            	 $('.banner-out').addClass('newbanner');
            }
            else{
            	$('.banner-out').removeClass('newbanner');
            }
        });
      
        $('ul.nav-panel li a').click(function() {
           var navClick = $(this).parent('li').index();
           $('.slider-for').slick('slickGoTo', navClick)
            //alert(navClick);
           $('ul.nav-panel li').removeClass('slick-current');
           $(this).parent('li').addClass('slick-current');
        });
     
        
        
        $('.slider-for').on('afterChange', function(event,slick,i){
          $('.nav-panel .slick-slide').removeClass('slick-current');
          $('.nav-panel .slick-slide').eq(i).addClass('slick-current');                     
        });
        
        
        
//        button slide
        
        $('.detail').click(function(){

            setTimeout(function(){
                $('.detail').parent().toggleClass('abc');
            }, 200);

            $(this).parent().toggleClass('detail-cont');
            
        }); 
        
//        custom tab
        $('.tab-list li a').click(function (event) {
            event.preventDefault();
            $(this).parent().addClass('tab-active'); 
            $(this).parent().siblings().removeClass('tab-active'); 
            
            var banVar = $(this).attr("href");
            //alert('dfdefw');
             $(".pic-pad").not(banVar).css("display", "none");
             $(banVar).fadeIn();
            //alert('hi');
	  		//$('.banner').slick('resize');
        });
        
        //alert();
        
        // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        	// alert('hi');
	  		// $('.banner').slick('resize');
		// })
                 
//        header toggle js
        $('.toggle').click(function (){
            $('.nav-panel').slideToggle();
        })

	 });


$(window).load(function(){
    setTimeout(function(){
        $('.detail').addClass('fade');
    }, 2000);
    
//    custom scroolbar
    $(".content").mCustomScrollbar({
    	autoHideScrollbar:true,
    	 theme:"rounded"
    });
    
});
	 
	 
	
	//Footer fixed	
//	$(window).bind("load", function() {        
//       var footerHeight = 0,
//           footerTop = 0,
//           $footer = $(".footer");           
//       positionFooter();       
//       function positionFooter() {       
//            footerHeight = $footer.height();
//            footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";       
//           if ( ($(document.body).height()+footerHeight) < $(window).height()) {
//               $footer.css({
//                    position: "fixed",
//                    bottom: "0px", 
//                    left: "0", 
//                    right: "0"
//               })
//           } else {
//               $footer.css({
//                    position: "relative",
//                    display: "block"
//               })
//           }               
//       }
//       $(window)
//	       .scroll(positionFooter)
//	       .resize(positionFooter)
//               
//	});