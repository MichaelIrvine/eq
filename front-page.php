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
  <section id="front-page-content__wrapper">
    <div id="front-page__col-01" class="col_2x">
      <div>
        <?php
				$featured_cs = get_field('featured_case_study');
				if ($featured_cs) : ?>
        <div class="featured-post__wrapper flex__wrapper">
          <div class="col_2x">
            <div class="featured-post-title__wrapper">
              <h4>Case Studies</h4>
              <h2><?php echo esc_html($featured_cs->post_title); ?></h2>
            </div>
            <div class="featured-post-details__wrapper">
              <h4>Location</h4>

              <p><?php echo strip_tags($featured_cs->post_content); ?></p>
              <a href="<?php echo get_the_permalink($featured_cs); ?>">Go To Case Study</a>
            </div>
          </div>
          <div class="col_2x flex__wrapper">
            <div>
              <?php echo get_the_post_thumbnail($featured_cs, "full"); ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="featured-post-image__wrapper">
          <?php
					$image = get_field('featured_article_image');
					$size = 'full';
					if ($image) {
						echo wp_get_attachment_image($image, $size);
					} ?>
        </div>
      </div>
    </div>
    <div id="front-page__col-02" class="col_2x">
      <div>
        <div class="about">
          <div class="section-title__wrapper">
            <h4 class="section-title">About</h4>
          </div>
          <div>
            <?php the_field('front_page_about'); ?>
            <a href="/about" class="eq-link">Read More</a>
          </div>
        </div>
        <div class="news">
          <div class="featured-post__wrapper">
            <?php
						$featured_posts = get_field('featured_news');
						if ($featured_posts) : ?>
            <ul>
              <?php foreach ($featured_posts as $featured_post) :

									$post_date = get_the_date("m.d.y", $featured_post->ID);
									$permalink = get_permalink($featured_post->ID);
									$title = get_the_title($featured_post->ID);
									$excerpt = get_the_excerpt($featured_post->ID);

								?>
              <li>
                <?php echo esc_html($post_date); ?>
                <?php echo esc_html($excerpt); ?>
                <a href="<?php echo esc_url($permalink); ?>">Article Link</a>

              </li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
var_dump($featured_cs);
get_footer();