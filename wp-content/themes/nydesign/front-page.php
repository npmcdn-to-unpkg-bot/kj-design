<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-wrapper">
<div class="banner">
	<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide" style="background-image:url('<?php bloginfo('url')?>/wp-content/uploads/2016/09/banner1.jpg')"><div class="overlay"></div></div>
        <div class="swiper-slide" style="background-image:url('<?php bloginfo('url')?>/wp-content/uploads/2016/09/20151022_151024-1.jpg')"><div class="overlay"></div></div>
        <div class="swiper-slide" style="background-image:url('<?php bloginfo('url')?>/wp-content/uploads/2016/09/slide3.jpg')"><div class="overlay"></div></div>
        ...
    </div>
    <!-- If we need pagination -->
    
    

      <span class="scroll-btn">
	<a href="#">
		<span class="mouse">
			<span>
			</span>
		</span>
	</a>
  <p>Scrolla ner för mer</p>

</span>
</div>
</div>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
	</div>
</section>

<section class="guld">
	<div class="container">
		<h1>Guld</h1>
		<div class="row">
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-12">
					<div class="full_h_img" style="background-image:url('<?php bloginfo('url')?>/wp-content/uploads/2016/09/uring1.jpg')">
						<div class="overlay"></div>
					</div>
					<h3>Ring i rödguld med vitguldsinfattade diamanter</h3>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
					<div class="full_h_img" style="background-image:url('<?php bloginfo('url')?>/wp-content/uploads/2016/09/2092.jpg')"><div class="overlay"></div></div>
					<h3></h3>
					</div>
				</div>
			</div>
		</div>
						<a class="black-border-btn" href="<?php bloginfo('url')?>/brollop">Se alla Guldsmycken</a>
	</div>
</section>

<section class="bridal">
	<div class="container">
		<h1>Bröllop</h1>
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12" >
					<div class="full_h_img" style="background-image:url('<?php bloginfo('url')?>//wp-content/uploads/2016/06/bild2.jpg')">					<div class="overlay"></div></div>

					</div>

					<div class="col-md-12">
					<h3>Ring i vitt och gult guld</h3>

					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-12 regular_h_img">
						<div class="regular_h_img" style="background-image:url('<?php bloginfo('url')?>//wp-content/uploads/2016/06/bild3.jpg')"><div class="overlay"></div></div>
					</div>
					<div class="col-md-12">
					<h3>Ring i platina med naturfärgad, oval diamant och två vita diamanter.</h3>
					</div>
					<div class="col-md-12">
						<div class="regular_h_img" style="background-image:url('<?php bloginfo('url')?>/wp-content/uploads/2016/06/bild1.jpg')"><div class="overlay"></div></div>
					</div>
					<div class="col-md-12">
					<h3>Trippelring med diamanter i vitt och blått.</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a class="black-border-btn" href="<?php bloginfo('url')?>/brollop">Se alla Bröllopssmycken</a>
			</div>
		</div>
	</div>
</section>
<section class="bridal">
	<div class="container">
		<h1>Herrsmycken</h1>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12"><img src="http://localhost:8080/kj/wp-content/uploads/2016/09/2203.jpg"></div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-12"></div>
					<div class="col-md-12"></div>
				</div>
			</div>
		</div>
	</div>
</section>
		</div>

	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<script type="text/javascript">
var mySwiper = new Swiper('.swiper-container', {
    speed: 400,
    loop: true,
    autoplay: 3000,
    spaceBetween: 100
});  

console.log('footer');
</script>

<?php get_footer();?>