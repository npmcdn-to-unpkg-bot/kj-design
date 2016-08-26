<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<footer class="footer">
    <div class="container clearfix">
        <div class="footer-cont">
            <ul class="footer-thumb">
            	<?php
                		query_posts( 'cat=1&order=ASC' );                		
			
			    while ( have_posts() ) : the_post();  ?>
            <?php	$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
               <?php	$imagethumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail' ); ?>
                
                <li class="abcd" data-image="<?php echo esc_url($image[0]); ?>"><img width="99" height="70" src="<?php echo esc_url($imagethumb[0]); ?>" alt="" /></li>
           <?php 
				endwhile;
				?>
            </ul>
            <div class="footer-text">
                <?php $pg=get_post(54); echo $pg->post_content;?>
            </div>
            
        </div>
    </div>
    
</footer>
</div>
<!--footer part closed   -->

<script>
	jQuery(document).ready(function($){
		call_fun();
		function call_fun()
		{
		if($('.ft-sldr').hasClass('slick-current'))
		{
			$('ul.footer-thumb').fadeIn(300,'swing');
			
		}
		else
		{
			$('ul.footer-thumb').fadeOut(300,'swing');
		}
		}
		
		$('.nav-panel > li').click(function(){
			call_fun();
			
		});
		var i=0;
		$('body').on('click','.slick-arrow',function(){
			console.log(i++);
			setTimeout(function(){ 	call_fun(); },600);
		
			
		});
		
		
		$('.smy-slider > li > a').click(function(){
			
			var xc=$(this).attr('data-id');
		$('.smy-trg').attr('src',xc);
		});
	});
</script>

<style>
	ul.footer-thumb {
		display: none;
	}
	.smy-slider a {
    color: rgb(0, 0, 0);
    display: block;
    padding: 7px 0;
}
ul.smy-slider {
	    text-align: center;
	
}
</style>


		
	<?php wp_footer(); ?>
</body>
</html>