<?php 

/*template name: begagnat*/

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-wrapper">

<section id="produkter">
<div class="banner" style="background-image:url(' <?php the_post_thumbnail_url( 'full' ); ?> ')">

<div class="overlay-title-banner">

<h1><?php the_title();?></h1>
</div>
	
</div>

<div class="container">

<div class="col-md-9">

	<div class="box-wrap">

<h3 class="title-border">Vi annonserar även på blocket!</h3>

<a href="https://www.blocket.se/traktor--maskin-i-sormland"><img src="http://tmsab.mediahelpcrm.se/wp-content/uploads/2016/08/Blocket.se_logo.png"></a>

</div>


	<div class="box-wrap">

<h3 class="title-border"><?php the_title(); ?></h3>
		<?php the_content(); ?>
</div>

</div>



	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<div class="col-md-3">
	<div class="box-wrap">
	<h3 class="title-border">Kontakta en säljare idag</h3>


<?php $args = array(
	'post_type' => 'worker', 
	'posts_per_page' => -1 ,
	'tax_query' => array( 
		array(
			'taxonomy' => 'uppdrag',
			'field' => 'slug',
			'terms' => 'saljare'
			),
		),

	); ?>


<?php $the_query = new WP_Query( $args ); 

if ( $the_query->have_posts() ) { ?>

<div class="worker-wrap">

<?php while ( $the_query->have_posts() ) { ?>



	<?php $the_query->the_post(); ?>



	
	<div class="worker">



		<img src="<?php the_post_thumbnail_url();?>">
			<h3><?php the_title();?></h3>
			<strong><?php the_field('titel'); ?></strong>
			<div class="phone"><i class="fa fa-phone"></i><span><?php the_field('telefon');?></span><div class="clearfix"></div></div>
			<div class="email"><i class="fa fa-envelope-o"></i><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email');?></a><div class="clearfix"></div></div>
		<div class="clearfix"></div>


	</div>


	<?php }


	wp_reset_postdata();


	}else{

		//no posts

		} ?>

</div>
		<div class="clearfix"></div>

</div>
			
</section>

</div>


</div>



<?php 

get_footer();

?>