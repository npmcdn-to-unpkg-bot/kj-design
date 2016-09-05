jQuery(function($){



			$(document).ready(function(){

				var body = $('body');


				$('.overlay-title').mouseover(function(){

					console.log('hover');

					$(this).css({ 
								opacity:0,
								visibility:'hidden',

					});

				})

				$('#info-section').mouseleave(function(){

					console.log(body[0].scrollTop);


					if (body[0].scrollTop < 100) {

					console.log('leave');

							$('.overlay-title').css({
								opacity:1,
								visibility:'visible',
							});

										
					}

						});

				$('.banner .overlay-title-banner').mouseover(function(){

					console.log('hover');

					$(this).css({ 
								opacity:0,
								visibility:'hidden',

					});

				})


				$('.banner').mouseleave(function(){


						$('.banner .overlay-title-banner').css({
								opacity:1,
								visibility:'visible',
							});


				});


								$('.prod_img .overlay-title-banner').mouseover(function(){

					console.log('hover');

					$(this).css({ 
								opacity:0,
								visibility:'hidden',

					});

				})


				$('.prod_img').mouseleave(function(){


						$('.prod_img .overlay-title-banner').css({
								opacity:1,
								visibility:'visible',
							});


				});



				$('.menu-toggle').click(function(){

					$('#left-nav').css({
						opacity: 1
					})

					$('#left-nav').slideToggle();

					$('#right-nav').slideToggle();

					$('#right-nav').css({
						opacity: 1
					})




				});


				var headerW = $('.branding img').width();

				var boxOutW = $('.boxout').width();



				$('.branding').css({
					//width: headerW,
					'margin-left': -headerW/2,
					//'margin-right': headerW/2,
				})
/*

				var $grid = $('.grid').masonry({


  // options
  itemSelector: '.grid-item',
  columnWidth: 200
});

				console.log($grid);

				$grid.imagesLoaded().progress( function() {
  $grid.masonry('layout');
});
*/



				$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});


				var body = $('body');

				var para = $('#welcome-section-para');

				var offset = para.offset();

				var headerH = $('top-header').height();


				//para.height($(window).height());


				$(window).scroll(function(e){

					console.log($(document).height());

					console.log(body[0].scrollTop);


					if (body[0].scrollTop > 100) {



							$('.overlay-title').css({
								opacity:0,
								visibility:'visible',
							});


					}

					if ($(document).height() - $('.bot-footer').height() < body[0].scrollTop + body.height() ) {

						$('.bot-footer').addClass('visible');
					}else{

						$('.bot-footer').removeClass('visible');
					}

					if (body[0].scrollTop == 0) {

						$('#info-section #insta-title').addClass('visible');

					}else{

						$('#info-section #insta-title').removeClass('visible');

					}


					if (body[0].scrollTop > offset.top - para.height()) {

						$('#text').addClass('fadeInUp');

					}


				//console.log($('section#welcome-section-para').scrollTop());

			});

				//$('#instafeed').append('<p>Test</p>');


				$('.fa-search').click(function(){
					console.log('klick');
					$('.searchbar').slideToggle();
				})


			});


					})