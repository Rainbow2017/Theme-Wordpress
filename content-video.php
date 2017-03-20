<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
                <?php thachpham_entry_header(); ?>
        </header>
        <div class="entry-content">
                <?php the_content(); ?>
                <?php
                        if ( is_single() ) :
                                thachpham_entry_tag();
                        endif;
                ?>
        </div>
</article>
