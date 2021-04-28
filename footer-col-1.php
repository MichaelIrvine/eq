<?php

/**
 * Footer Row 1 widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EQ
 */

if (!is_active_sidebar('footer_column-1')) {
  return;
}
?>

<div class="footer__col">
  <?php dynamic_sidebar('footer_column-1'); ?>
</div>