<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>">
	<div class="page-content">
	<div class="container">
	<div class="row">
	<div class="col-md-12">
		<?php the_content(); ?>
	</div>
	</div>
	</div>
	</div>
	</article>
<?php endif;?>