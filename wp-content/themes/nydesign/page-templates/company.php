<?php 

/*template name: company*/

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-wrapper">

<section id="company">

<div class="banner" style="background-image:url(' <?php the_post_thumbnail_url( 'full' ); ?> ')">
	<div class="overlay-title-banner">

<h1><?php the_title();?></h1>
</div>
</div>

<div class="content-wrap">

<div class="container">
<h1><?php the_title(); ?></h1>

<div class="row">
<div class="col-md-7">
	<?php the_content(); ?>
</div>

<div class="col-md-5">
		<div class="row">
		<img src="<?php bloginfo('template_url')?>/images/fordon1.jpg">
	</div>
		<div class="row">
		<img src="<?php bloginfo('template_url')?>/images/fordon2.jpg">
	</div>
			<div class="row">
		<img src="<?php bloginfo('template_url')?>/images/fordon3.jpg">
	</div>

</div>
</div>

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