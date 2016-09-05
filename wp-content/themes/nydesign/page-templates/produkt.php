<?php 

/*template name: produkter*/

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


	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<div class="container">

<div class="row">

<div class="col-md-9 col-sm-9">
	<div class="box-wrap">

	<h3 class="title-border">Produkter</h3>

	<?php $args = array( 'post_type' => 'produkt', 'posts_per_page' => 25 );?>

	<?php $the_query = new WP_Query( $args );  ?>

	<?php if ($the_query->have_posts() ) { ?>


		<div class="prod-wrap">

		<div class="row">

		<?php while ( $the_query->have_posts() ) { ?>



			<?php $the_query->the_post(); ?>

			<div class="produkt col-md-6 col-sm-6" >

			<a href="<?php the_permalink();?>">
			<div class="prod_img" style="background-image:url('<?php the_post_thumbnail_url('large')?>')">
			<div class="overlay-title-banner" style="opacity: 1; visibility: visible;">

			<h3><?php the_title(); ?></h3>

			</div>

			</div>
			</a>
			
				


			</div>



			

<?php } ?>

</div>

<div class="clearfix"></div>

<?php// wp_reset_postdata(); ?>


		</div>
		
	<?php }else{

		echo "no posts";


		} ?>





	</div>	

	
</div>

<div class="col-md-3 col-sm-3">
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
			<div class="emp-title"><strong><?php the_field('title'); ?></strong><div class="clearfix"></div></div>
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


</div>
	<?php the_content(); ?>

	</div>

			<div class="box-wrap">



	<h3 class="title-border">Leverantörer</h3>

	<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">


<?php $dbarg = array( 'post_type' => 'leverantor', 'posts_per_page' => -1 ); ?>


	<?php $my_query = new WP_Query( $dbarg );  ?>


	<?php if ($my_query->have_posts() ) { ?>




				<?php while ( $my_query->have_posts() ) { ?>

					<div class="swiper-slide">


					<?php $my_query->the_post(); ?>


					<a href="<?php the_field('permalink');?>"><?php the_post_thumbnail('large'); ?></a>

					</div>


					<?php } ?>


					<?php wp_reset_postdata(); ?>


	<?php }else{

		echo "no posts";


		} ?>

		</div>

		</div>
		</div>


</div>



			
</section>

</div>

<script type="text/javascript">
	
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        loop:true,
        slidesPerView: 5,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false,

        breakpoints: {

        	    320: {
      slidesPerView: 1,
      spaceBetweenSlides: 10
    },
    // when window width is <= 480px
    480: {
      slidesPerView: 2,
      spaceBetweenSlides: 20
    },
    // when window width is <= 640px
    640: {
      slidesPerView: 3,
      spaceBetweenSlides: 30
    }

        }


    });
</script>


<?php 

get_footer();

?>