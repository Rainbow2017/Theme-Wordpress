<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php thachpham_thumbnail('thumbnail'); ?>
    </div>
    <header class="entry-header">
        <?php thachpham_entry_header(); ?>
        <?php thachpham_entry_meta() ?>
    </header>
        <div class="entry-content">
            <?php thachpham_entry_content(); ?>
            <?php ( is_single() ? thachpham_entry_tag() : '' ); ?>
        </div>
</article>