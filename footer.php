<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EQ
 */

?>

<footer id="eqFooter" class="site-footer">
  <?php
	require get_template_directory() . '/footer-col-1.php';
	require get_template_directory() . '/footer-col-2.php';
	require get_template_directory() . '/footer-col-3.php';
	require get_template_directory() . '/footer-col-4.php';
	?>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>