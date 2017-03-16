<?php get_header();?>
<div class="content">
<div id="main-content">
<?php if( have_posts() ) : while(have_posts() ) :  the_posts() ;?>
	<?php get_template_part('content', get_post_format());?>
<?php endwhile?>
<?php thachpham_pagination();?>
<?php else: ?>
	<?php get_template_part('content','none');?>
<?php endif;?>
</div>
<div id="sidebar"></div>
<?php get_sidebar();?>
</div>
<?php get_footer();?>
