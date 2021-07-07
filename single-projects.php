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
    <?php
      $preload = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'preload')[0];
      $postThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0];

      ?>
    <img src="<?php echo $preload; ?>" data-src="<?php echo $postThumbnail; ?>" class="lazy staggered"
      alt="<?php echo the_title(); ?>" />
  </section>
  <section id="post-info" class="post-section flex__wrapper">
    <!-- Title Col -->
    <div class="post-title__col">
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
  <div class="project-heading">
    <h4><?php echo the_field('project_heading'); ?></h4>
  </div>
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

        elseif (get_row_layout() == 'two_content_columns') :

          get_template_part('template-parts/flexible', 'two-columns');

        elseif (get_row_layout() == 'one_third__two_third_content_column') :

          get_template_part('template-parts/flexible', 'one-third-two-third-columns');

        elseif (get_row_layout() == 'two_third__one_third_content_column') :

          get_template_part('template-parts/flexible', 'two-third-one-third-columns');

        elseif (get_row_layout() == 'content_with_note') :

          get_template_part('template-parts/flexible', 'content-note');

        endif;

      endwhile;
    endif;

  endwhile; // End of the loop.
  ?>
</main>
<?php
get_template_part('template-parts/related', 'posts');
get_footer();