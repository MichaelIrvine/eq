<?php

/**
 * Template Name: EQ News
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EQ
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <section class="post-article-hero">
    <?php eq_post_thumbnail(); ?>
  </section>

  <section id="article-content" class="grid__wrapper">
    <header class="entry-header">
      <?php
			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif; ?>
      <?php
			$datePosted = get_the_date("m.d.y");
			$postAuthor = get_the_author();
			?>
      <p class="light">Posted on <?php echo $datePosted; ?><br /> by <?php echo $postAuthor; ?></p>

    </header>

    <div class="entry-content">
      <?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'eq'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'eq'),
					'after'  => '</div>',
				)
			);
			?>
      <footer class="entry-footer">
        <?php eq_entry_footer(); ?>
      </footer>
      <?php the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'eq') . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'eq') . '</span> <span class="nav-title">%title</span>',
				)
			); ?>
    </div>
  </section>

</article>