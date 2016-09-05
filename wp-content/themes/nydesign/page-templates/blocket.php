<?php 

/*template name: produkter*/

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-wrapper">

<section class="produkter">

<h1 id="insta-title">Våra annonser på blocket</h1>
					<iframe class="IframeBox" width="600" height="225" frameborder="0" border="0" align="top" scrolling="no" src="https://www.blocket.se/store_box.htm?ca=10&id=25187"></iframe>
			
</section>

</div>

	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php 

get_footer();

?>