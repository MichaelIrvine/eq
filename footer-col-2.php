<?php

/**
 * Footer Row 2 widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarbminLab_Theme
 */

if (!is_active_sidebar('footer_column-2')) {
  return;
}
?>

<div class="footer__col">
  <?php dynamic_sidebar('footer_column-2'); ?>
</div>