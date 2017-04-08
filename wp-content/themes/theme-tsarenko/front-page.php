<?php
/**
 * Template for front page
 */
get_header();
?>
    <div class="front-page-wrapper">
        <main id="main" class="site-main" role="main">
            <section class="wrap-why">
                <div class="wrap-container">
                    <div class="block-why">
                        <div class="why-image">
                            <img src="http://localhost/geekhub-test/home-tsarenko/wp-content/uploads/2017/04/img1.png"
                                 alt="img">
                        </div>
                        <div class="text-block-why">
                            <h2 class="title-why">
                                <?php echo get_post_meta($post->ID, 'title-1', true) ?>
                            </h2>
                            <div class="content-why">
                                <?php echo get_post_meta($post->ID, 'content-1', true) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="wrap-welcome">
                <div class="wrap-container">
                    <div class="block-welcome">
                        <div class="welcome-image">
                            <img src="http://localhost/geekhub-test/home-tsarenko/wp-content/uploads/2017/04/img2.png"
                                 alt="img">
                        </div>
                        <div class="welcome-text-block">
                            <h2 class="title-welcome">
                                <?php echo get_post_meta($post->ID, 'title-2', true) ?>
                            </h2>
                            <div class="content-welcome">
                                <p>
                                    <?php echo get_post_meta($post->ID, 'content-2', true) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="wrap-offer">
                <div class="wrap-container">
                    <h2 class="title-offer">
                        <?php echo get_post_meta($post->ID, 'title-3', true) ?>
                    </h2>
                    <div class="content-offer">
                        <p>
                            <?php echo get_post_meta($post->ID, 'content-3', true) ?>
                        </p>
                    </div>
                    <div class="block-offers">
                        <?php
                        $posts = new WP_query('post_type=offers', 'posts_per_page=3');
                        if ($posts->have_posts()) :
                            while ($posts->have_posts()) : $posts->the_post(); ?>
                                <div class="offers-posts-query">
                                    <?php the_post_thumbnail('offers-thumb');
                                    the_title('<h4>', '</h4>');
                                    the_content('<p>', '</p>');
                                    ?>
                                    <div>

                                    </div>
                                </div>
                            <?php endwhile;
                        else:
                            echo '<div>no content</div>';
                        endif;

                        ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            </section>
            <section class="wrap-works">
                <div class="wrap-container">
                    <h2 class="title-works">
                        <?php echo get_post_meta($post->ID, 'title-4', true) ?>
                    </h2>
                    <div class="content-works">
                        <p>
                            <?php echo get_post_meta($post->ID, 'content-4', true) ?>
                        </p>
                    </div>
                    <div class="our-works">

                    </div>
                </div>
            </section>

        </main><!-- #main -->
    </div>


<?php
get_footer();
