<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EQ
 */

get_header();
?>
<main id="primary" class="site-main">

  <section class="hero hero--full">
    <div>
      <?php
			$image = get_field('page_hero');
			$size = 'full';
			if ($image) {
				echo wp_get_attachment_image($image, $size);
			} ?>
    </div>
  </section>

  <?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();