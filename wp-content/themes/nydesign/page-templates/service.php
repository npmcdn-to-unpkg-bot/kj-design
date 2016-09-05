<?php 

/*template name: service*/

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-wrapper">

<section id="service">

<div class="banner" style="background-image:url(' <?php the_post_thumbnail_url( 'full' ); ?> ')">

<div class="overlay-title-banner">

<h1><?php the_title();?></h1>
</div>
	
</div>

<div class="container">

<div class="service-wrap flex"></div>

<div class="service-item right">
	<div class="service-text"><?php the_field('service');?></div>
	<img src="<?php the_field('servicebild');?>">
		<div class="clearfix"></div>
	</div>
	<div class="service-item left">
	<img src="<?php the_field('reservdelarbild');?>">
	<div class="service-text"><?php the_field('reservdelar');?></div>
	<div class="clearfix"></div>
	</div>
	<div class="service-item right">
	<div class="service-text"><?php the_field('kontakt');?></div>
	<img src="<?php the_field('kontaktbild');?>">
		<div class="clearfix"></div>
	</div>
</div>
			
</section>

</div>

	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php 

get_footer();

?>