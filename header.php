<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EQ
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="apple-touch-icon" sizes="180x180"
    href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32"
    href="<?php bloginfo('template_directory'); ?>/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16"
    href="<?php bloginfo('template_directory'); ?>/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/favicons/site.webmanifest">
  <link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/favicons/safari-pinned-tab.svg" color="#000000">
  <meta name="msapplication-TileColor" content="#f0f0f0">
  <meta name="theme-color" content="#f0f0f0">

  <?php wp_head(); ?>
</head>

<body <?php body_class('transparent-header js-loading'); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <header id="site-header">
      <div id="site-branding">
        <?php
        if (is_active_sidebar('header-branding')) : ?>
        <?php dynamic_sidebar('header-branding'); ?>
        <?php endif;
        if (is_active_sidebar('header-branding-mobile')) : ?>
        <?php dynamic_sidebar('header-branding-mobile'); ?>
        <?php endif;
        ?>
      </div>
      <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          <span></span>
          <span></span>
        </button>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
          )
        );
        ?>
      </nav>
    </header>