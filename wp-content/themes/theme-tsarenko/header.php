<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-tsarenko
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--//Custom contacts-->
<!--<div>-->
<!--    --><?php //echo get_theme_mod('phone', 'phone'); ?>
<!--    --><?php //echo get_theme_mod('email', 'email'); ?>
<!--</div>-->

<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner">
        <div class="wrap-container">
            <div class="header-block">
                <div class="site-branding">
                    <a href="/">
                        <?php echo get_header_image_tag(array(
                            'width' => 127,
                            'height' => 53,
                            'alt' => 'Site Logo',
                        )) ?>
                    </a>
                </div><!-- .site-branding -->
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu"
                            aria-expanded="false"><?php esc_html_e('Primary Menu', 'theme-tsarenko'); ?></button>
                    <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
        <?php if (!is_front_page()) { ?>
            <section class="title-part">
                <div class="wrap-container">
                    <div class="page-header">
                        <?php
                        if (is_single()) : ?>

                            <h1 class="page-title">
                                <?php echo get_the_title(); ?>
                            </h1>
                        <?php else:
                            single_post_title('<h1 class="page-title">', '</h1>');
                        endif;
                        ?>
                    </div>
                </div>
            </section>
            <?php
        } ?>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
