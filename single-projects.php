<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EQ
 */

get_header();
?>

<main id="project-post" class="project-post-page site-main">
  <?php
	while (have_posts()) :
		the_post(); ?>

  <section class="hero post-hero">
    <?php eq_post_thumbnail(); ?>
  </section>
  <section class="post-info flex__wrapper">
    <!-- Title Col -->
    <div class="post-title__col">
      <h4>Tags</h4>
      <h1><?php echo the_title(); ?></h1>
    </div>
    <!-- Info Col -->
    <div class="post-info__col">
      <div>
        <?php echo the_field('project_post_description'); ?>
      </div>
      <div>
        <ul>
          <li>
            <h4>Title</h4>
            <p>Description</p>
          </li>
        </ul>

      </div>
    </div>

  </section>
  <!-- Flexible Content Starts -->
  <?php

		if (have_rows('project_content')) :
			while (have_rows('project_content')) : the_row();

				if (get_row_layout() == 'section_title') :

					get_template_part('template-parts/section', 'title');

				elseif (get_row_layout() == 'gallery') :

					get_template_part('template-parts/gallery');

				elseif (get_row_layout() == 'content_columns') :

					get_template_part('template-parts/flexible', 'columns');

				endif;

			endwhile;
		endif;
		?>




  <?php endwhile; // End of the loop.
	?>
</main>

<?php
get_footer();