<?php get_header(); ?>
<div id="page-content">
<div class="container">
	<?php get_template_part('loop', 'single'); ?>
	<?php comments_template(); ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
