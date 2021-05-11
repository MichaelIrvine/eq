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
  <section id="post-info" class="post-section flex__wrapper">
    <!-- Title Col -->
    <div class="post-title__col">
      <h4>Tags</h4>
      <h1><?php echo the_title(); ?></h1>
    </div>
    <!-- Info Col -->
    <div class="post-info__col flex__wrapper">
      <div class="content-editor__reset">
        <?php echo the_field('project_post_description'); ?>
      </div>
      <div>
        <?php if (have_rows('project_post_details')) : ?>
        <ul>
          <?php while (have_rows('project_post_details')) : the_row();
								$detail_title = get_sub_field('detail_title');
								$detail = get_sub_field('detail');
							?>
          <li>
            <h4><?php echo $detail_title; ?></h4>
            <p><?php echo $detail; ?></p>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>

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

	endwhile; // End of the loop.
	?>
</main>
<?php
get_template_part('template-parts/related', 'posts');
get_footer();