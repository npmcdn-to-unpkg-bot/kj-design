<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>">

	<div class="row">
		<div id="forelasning-info" class="col-md-12">
</div>
	</div>

	<div class="row">
	<div id="intro-text" class="col-md-12">
		<?php the_content(); ?>
	</div>
		</div>

		<div class="tjanster">
		<div class="row">
			<div class="col-md-6">
				<h2>Skapa en annons idag!</h2>

				<div class="wizard">
					<img src="http://megamarknad.mediahelpcrm.se/wp-content/uploads/2016/05/AdobeStock_55620181_WM.png">
				</div>
				<div class="annonsform">
				<form>
				<div class="col-md-12">
				<label>Titel</label>
					<input type="text" name="">
				</div>
				<div class="col-md-12">
				<label>Pris</label>
					<input type="text" name="">
				</div>
				<div class="col-md-12">
				<label>Bild</label>
					<input type="file" name="pic" accept="image/*">
				</div>
				</form>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<h2>Populära kategorier</h2>
			</div>
		</div>
			<div class="row">
				<div class="col-md-4">
				<a href="http://relationscentrum.mediahelpcrm.se/litteratur-2/">
				<div class="tjanst-item" style="background-image:url('http://relationscentrum.mediahelpcrm.se/wp-content/uploads/2016/05/litteratur.jpg');">
					<h3>Kläder</h3>
					<i class="fa fa-play" aria-hidden="true"></i>
				</div>
				</a>
				</div>
				<div class="col-md-4">
				<a href="http://relationscentrum.mediahelpcrm.se/litteratur-2/">
					<div class="tjanst-item" style="background-image:url('http://relationscentrum.mediahelpcrm.se/wp-content/uploads/2016/05/föreläsningar.jpg');">
					<h3>Leksaker</h3>
					<i class="fa fa-play" aria-hidden="true"></i>
				</div>
				</a>
				</div>
				<div class="col-md-4">
				<a href="http://relationscentrum.mediahelpcrm.se/litteratur-2/">
					<div class="tjanst-item" style="background-image:url('http://relationscentrum.mediahelpcrm.se/wp-content/uploads/2016/05/forelasningar.jpg');">
					<h3>Elektronik</h3>
					<i class="fa fa-play" aria-hidden="true"></i>
				</div>
				</a>
				</div>
				<div class="col-md-4">
				<a href="http://relationscentrum.mediahelpcrm.se/litteratur-2/">
					<div class="tjanst-item animated" style="background-image:url('http://relationscentrum.mediahelpcrm.se/wp-content/uploads/2016/05/relations.jpg');">
					<h3>Fordon</h3>
					<i class="fa fa-play" aria-hidden="true"></i>
				</div>
				</a>
				</div>
			</div>
		</div>

		<div class="lang">
			<h1>Välj språk</h1>
		</div>
	</article>

	<script type="text/javascript">
		jQuery(document).ready(function ($) {

			/*

			$('.tjanst-item').mouseenter(function(){
				$(this).addClass('animated zoomIn');
			});
			$('.tjanst-item').mouseleave(function(){
				$(this).removeClass('animated zoomIn');
			});

			*/

		});
	</script>


<?php  endif; ?>
