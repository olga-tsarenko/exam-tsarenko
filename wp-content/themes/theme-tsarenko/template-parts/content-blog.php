<?php
/**
 * Template part for displaying page content in home.php
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <a href="<?php the_permalink(); ?>" ?>
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('homepage-thumb');
            } ?>
        </a>
        <h3>
            <?php
            the_title();
            ?>
        </h3>
        <div class="content">
            <?php
            $content = get_the_content('подробнее');
            $postOutput = preg_replace('/<img[^>]+./', '', $content);
            echo $postOutput;
            ?>
        </div>
        <div class="time-post">
            <span>
            <?php
            the_time('M. j, Y');
            ?>
    </span>
        </div>

        <?php

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'theme-tsarenko'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->
    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                /* translators: %s: Name of current post */
                    esc_html__('Edit %s', 'theme-tsarenko'),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-## -->

