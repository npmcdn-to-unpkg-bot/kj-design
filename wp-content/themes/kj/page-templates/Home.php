<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>



<style type="text/css">

.acf-map {
	width: 100%;
	height: 500px;
	border: #ccc solid 1px;
	margin: 0px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>


<div class="banner-out">
    <div class="banner slider-for">
        <div class="banner-item slide-cover">
            <div class="banner-l">
                <div class="container">
                    <div class="banner-l-pic">
                        <h2 class="home-ttl"> <?php echo get_field('heading',5); ?></h2>
                        
                        <?php query_posts('page_id=5');  while (have_posts()) : the_post();  the_content();  endwhile; ?>

                               </div>
                </div>
            </div>
            <div class="banner-r">
            	<?php	$image = wp_get_attachment_image_src( get_post_thumbnail_id(5), 'full' ); ?>
								
                <div class="aaaaa"><img src="<?php echo esc_url($image[0]); ?>" alt="" /></div>
            </div>
        </div>
<!--        banner part 2-->
        <div id="design_sc" class="banner-item slide-cover design">
            <div class="container">
            	
	                <div class="design-cont">
	                    <h2><span><?php echo get_field('heading',17); ?></span></h2>
	                    <?php query_posts('page_id=17');  while (have_posts()) : the_post();  the_content();  endwhile; ?>
	                     <?php //$pg=get_post(17); echo $pg->post_content;?>
	                </div>
              
                <!-- <div class="design-glry clearfix">
                	<?php
                		query_posts( 'cat=3' );
				$i=0;
			    while ( have_posts() ) :the_post();  ?>
                    <div class="design-box">
                        <div class="design-pic">
                        		<?php	$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
                            <div class="design-l"><img src="<?php echo esc_url($image[0]); ?>" alt=""></div>
                        </div>
                        <div class="design-pic">
                            <div class="design-r">
                                <h4><?php echo get_the_title(get_the_ID()); ?></h4>
                                <p>   <?php $pg=get_post(get_the_ID()); echo $pg->post_content;?></p>
                                <a href="<?php get_permalink(); ?>">[More Details]</a>
                            </div>
                        </div>
                    </div>
                   <?php endwhile; ?>
                    
                </div> -->
                
            </div>
          
        </div>
   <!--        banner part 3 starts-->
        <div class="banner-item slide-cover" id="tab-cont">
            <div class="banner-l">
                <div class="container">
                	<ul class="tab-list">
                        	 <?php
                		$key_var= new WP_Query( array('post_type' => 'smycken','order' => 'DESC') ); 
						$i=1;
						    while ($key_var-> have_posts() ) : $key_var->the_post();  ?>
                  <li <?php if($i==1){?> class="tab-active" <?php } ?> ><a href="#tab-<?php echo $i; ?>"><?php echo get_the_title(get_the_ID()); ?></a></li>
                           <?php $i++; endwhile; wp_reset_query(); ?>
                        </ul>
                    <div class="banner-l-pic sympage">
                        <?php //query_posts('page_id=30');  while (have_posts()) : the_post();  the_content();  endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="banner-r banVar clearfix">
            	
            <?php	$key_var= new WP_Query( array('post_type' => 'smycken','order' => 'DESC') ); 
						$i=1;
						    while ($key_var-> have_posts() ) : $key_var->the_post();  ?>
            	
            	
                    <div class="pic-pad clearfix" id="tab-<?php echo $i; ?>">
                    	  <?php	$galdata1 = get_post_meta(get_the_ID(), 'inpost_gallery_data', true); $img = 0;
                    	  foreach($galdata1 as $imgurl){ if($img==9) break; ?>
                        <div class="pic-box">
                              <a href="<?php echo $imgurl['imgurl']; ?>" class="fancybox" rel="gallery"><img alt="" src="<?php echo $imgurl['imgurl']; ?>"></a>
                        </div>
                       <?php $img++; } ?>
			
                    </div>
                 <?php $i++; endwhile; wp_reset_query(); ?>
                
               
               
            </div>
        </div>
    <!--    slide 4    -->
         <div class="banner-item slide-cover">
             <div class="banner-l">
            <div class="container">
                <div class="banner-l-pic">
                    
                    <p>   <?php $pg=get_post(32); echo $pg->post_content; ?></p>

                    <h2><?php echo get_field('heading',32); ?></h2>
                    <ul class="slide-list">
                       <?php echo get_field('listing_editor',32); ?>
                    </ul>
                </div>
            </div>
                 </div>
             <div class="banner-r">
             		<?php	$image = wp_get_attachment_image_src( get_post_thumbnail_id(32), 'full' ); ?>
                    <div class="aaaaa"><img src="<?php echo esc_url($image[0]); ?>" alt="" /></div>
                </div>
        </div>
    <!--    slider 5    -->
         <div class="banner-item slide-cover clearfix">
                  <!-- <div class="detail-outer">
                    <div class="detail">
                        <div class="arw"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="" /><span>Details</span> </div>
                         <div class="detail-box">

                         </div>
                    </div>  
                </div>-->
             <div class="banner-l">
                <div class="container">
                    <div class="banner-l-pic">
                        <h2><?php echo get_field('heading',38); ?></h2>
                        <p>   <?php $pg=get_post(38); echo $pg->post_content; ?></p>
                        <div class="contact">
                            <span><i class="fa fa-phone" aria-hidden="true"></i></span><a href="javascript:void(0);"><?php echo get_field('phone',38); ?></a>
                        </div>
                        <div class="contact">
                            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <a href="mailto:<?php echo get_field('mail',38); ?>"><?php echo get_field('mail',38); ?></a>
                        </div>
                        <!-- <div class="hour">
                            <h3>Opening Hours</h3>
                            <div class="day">
                                <div class="event"><img src="<?php //echo get_template_directory_uri(); ?>/images/event.png" alt="" /></div>
                                <div class="event-cont">
                                   <?php echo get_field('opening_days',38); ?>
                                   
                                </div>
                            </div>
                            <div class="day">
                                <div class="event"><img src="<?php //echo get_template_directory_uri(); ?>/images/time.png" alt="" /></div>
                                <div class="event-cont">
                                	
                                	
                                	 <?php //echo get_field('working_hours',38); ?>
                                   
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>
             </div>     
            <div class="banner-r">
                    <div class="aaaaab">
                    	<?php query_posts('page_id=38'); ?>
						<?php while (have_posts()) : the_post(); ?>	
							<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
							<img src="<?php echo $large_image_url[0]; ?>" alt="" />

						<?php endwhile; ?>

                       <?php 

//$location = get_field('map',38);

//if( !empty($location) ):
?>
<!-- <div class="acf-map">
	<div class="marker" data-lat="<?php //echo $location['lat']; ?>" data-lng="<?php //echo $location['lng']; ?>"></div>
</div> -->
<?php //endif; ?>
                    </div>
                </div>
        </div>
    </div>
</div>
		<?php
		$key_var= new WP_Query( array('post_type' => 'smycken','order' => 'DESC') ); 
		$i=1;
		while ($key_var-> have_posts() ) : $key_var->the_post();  ?>

			<div class="smycken-sub-cont" style="display: none; " >
				
				<?php the_content(); ?>
				
			</div>
		
		 <?php $i++; endwhile; wp_reset_query(); ?>


		<script>
			jQuery(document).ready(function($){
				$('.nav-panel >li:eq('+2+') > a').click(function(){
					
						var y=$('.smycken-sub-cont').eq(0).html();
					$('.tab-list').parents('.container').find('.banner-l-pic').html(y);
					
				});
				$('.tab-list > li > a').click(function(){
					
					var x= $(this).parent().index();
					var y=$('.smycken-sub-cont').eq(x).html();
					$(this).parents('.container').find('.banner-l-pic').html(y);
				});
				
			});
		</script>
<?php
get_footer();

?>





