<?php 
/*template name: kontakt*/

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-wrapper">

<section id="kontakt">

<div class="map-banner banner">
<div class="overlay-title-banner">

<h1><?php the_title();?></h1>
</div>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2064.9473729435067!2d16.521728116052255!3d58.83166298148748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465ed25693e0128f%3A0x75cd617c31b73745!2sTraktor+%26+Maskin+i+S%C3%B6rmland+AB!5e0!3m2!1sen!2sse!4v1467364170919" width="900" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="container">



<div class="col-md-8 col-sm-8">
<div class="box-wrap">


<?php $args = array('post_type' => 'worker'); ?>


<?php $the_query = new WP_Query( $args ); 

if ( $the_query->have_posts() ) { ?>

<div class="worker-wrap">

<?php while ( $the_query->have_posts() ) { ?>


	<?php $the_query->the_post(); ?>



	
	<div class="worker">

<div class="kont-image" style="background-image:url('<?php the_post_thumbnail_url();?>')"></div>

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

</div>

<div class="col-md-4 col-sm-4">

<div class="box-wrap">

<h3 class="title-border">Traktor & Maskin i Sörmland AB</h3>
<h4>E-post</h4>
<a href="mailto:info@tmsab.se">info@tmsab.se</a>
<h4>Björkvik</h4>
<p>Vedeby, 640 20 Björkvik</p>
<p>Telefon: 0155-714 40</p>

<h4>Järna</h4>
<p>Överkumla 1, 153 91 Järna</p>
<p>Telefon: 08-55060490</p>

<h3 class="title-border">Fyll i formuläret nedan så återkommer vi inom kort</h3>




<?php echo do_shortcode('[contact-form-7 id="24" title="Contact form 1"]'); ?>

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