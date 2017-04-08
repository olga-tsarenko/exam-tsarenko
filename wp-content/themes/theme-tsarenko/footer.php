<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-tsarenko
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <section class="our-clients">
        <div class="wrap-container">
            <h2>
                <?php echo get_post_meta($post->ID, 'title-5', true) ?>
            </h2>
            <div class="slider-our-client">
                <?php
                $args = array(
                    'post_type' => 'clients',

                );
                $slider_clients_img = new WP_Query($args);

                if ($slider_clients_img->have_posts()) :
                ?>
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        $i = 1;
                        // Цикл!
                        while ($slider_clients_img->have_posts()) :$slider_clients_img->the_post();
                            ?>
                            <li class="item item-<?php echo $i; ?>">
                                <?php echo get_the_post_thumbnail() ?>
                            </li>
                            <?php
                            $i++;
                            ?>
                            <?php
                        endwhile;
                        ?>
                        <?php
                        else:
                            ?>
                            <h3>No slide</h3>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>

                    </ul>
                </div>
            </div>
    </section>
    <section class="wrap-contacts">

            <div class="wrap-container">
                <div class="contact-inner">
                    <div class="block-contact">
                        <h3>
                            <?php echo get_post_meta($post->ID, 'title-6', true) ?>
                        </h3>
                        <div class="description-contacts">
                            <p>
                                <?php echo get_post_meta($post->ID, 'content-6', true) ?>
                            </p>
                        </div>
                        <div class="phone">
                            <p>
                                <?php echo get_theme_mod('phone', 'phone'); ?>
                            </p>
                        </div>
                        <div class="adress">
                            <p>
                                <?php echo get_theme_mod('adress', 'adress'); ?>
                            </p>
                        </div>
                        <div class="map">
                            <?php echo get_theme_mod('map', 'map'); ?>
                        </div>
                    </div>
                    <div class="form">
                        <?php echo do_shortcode('[mc4wp_form id="71"]'); ?>

                    </div>
                </div>
            </div>
           </section>
    <section class="footer-zone-1">
        <div class="wrap-container">
            <div class="site-branding">
                <a href="/">
                    <?php echo get_header_image_tag(array(
                        'width' => 127,
                        'height' => 53,
                        'alt' => 'Site Logo',
                    )) ?>
                </a>
            </div><!-- .site-branding -->
        </div>
    </section>
    <section class="footer-zone-2">
        <div class="wrap-container">
            <div class="site-info">
                <div>
                    <p>&nbsp;&copy;&nbsp;<?php echo date('Y'); ?> All Rights Reserved. </p>
                </div>
            </div><!-- .site-info -->
        </div>
    </section>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
