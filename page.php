<?php get _hearder(); ?>
<div class ="content">
	<div id="main-content">
		<?php if ( have_posts() ) : while (have_posts()) : the_post();?>
			<?php get_template_part('content', get_post_format());?>
		<?php endwhile ?>
		<?php else: ?>

	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();?>