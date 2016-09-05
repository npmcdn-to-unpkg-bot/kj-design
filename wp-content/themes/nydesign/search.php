<?php 


get_header();
?>


<div class="page-wrapper">
<section id="searchresults">
<div class="container">

<div class="row">

<div class="col-md-10">

<div class="box-wrap">


<h2><?php printf( __( 'Söresultat för: %s' ), '<span>' . get_search_query() . '</span>'); ?></h2>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="col-md-10">

	<div class="col-md-4">


<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
</div>

<div class="col-md-8">

<?php the_post_thumbnail('small'); ?>
	
</div>

</div>




<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<div class="clearfix"></div>

</div>
</div>

</div>
	
</div>
</section>
</div>



<?php get_footer(); ?>