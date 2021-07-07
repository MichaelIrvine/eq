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
<div class="pin__wrapper">
  <main id="primary" class="site-main">

    <section id="front-page-hero" class="hero--full">
      <div class="screen-reveal"></div>
      <div class="hero-img__wrapper">
        <?php
        $image = get_field('page_hero');
        $size = 'full';
        if ($image) {
          echo wp_get_attachment_image($image, $size);
        } ?>
      </div>
    </section>
    <section id="front-page-content__wrapper">
      <div id="front-page__col-01">

        <?php
        $featured_cs = get_field('featured_case_study');
        if ($featured_cs) : ?>
        <div class="featured-post__wrapper grid__wrapper">
          <span></span>
          <div>
            <div class="featured-post-title__wrapper">
              <h4>Case Studies</h4>
              <h2><?php echo esc_html($featured_cs->post_title); ?></h2>
            </div>
            <div class="featured-content__wrapper">
              <?php if (have_rows('featured_case_study_details')) : ?>
              <div class="featured-post-details__wrapper">
                <?php while (have_rows('featured_case_study_details')) : the_row(); ?>

                <h4><?php the_sub_field('study_detail_title'); ?></h4>
                <p><?php the_sub_field('study_detail_text'); ?></p>

                <?php endwhile; ?>
              </div>
              <?php endif; ?>
              <div class="featured-post-text__wrapper">
                <p><?php echo substr(get_field('featured_case_study_text', false, false), 0, 300) . '...' ?></p>
                <a href="<?php echo get_the_permalink($featured_cs); ?>">Go To Case Study</a>
              </div>
            </div>
          </div>
          <div>

            <div>
              <?php echo get_the_post_thumbnail($featured_cs, "full"); ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="featured-post-image__wrapper">
          <span></span>
          <?php
          $featuredImage = get_field('featured_article_image');
          if (!empty($featuredImage)) : ?>

          <img src="<?php echo esc_url($featuredImage['url']); ?>"
            alt="<?php echo esc_attr($featuredImage['alt']); ?>" />
          <?php endif; ?>

        </div>
        <span></span>
      </div>
      <div id="front-page__col-02">

        <svg id="columnLogo" width="186" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M31.405 17.238l-4.981-4.328 1.529-1.467 4.982 4.328c.96-1.307 1.529-2.995 1.529-4.954 0-4.682-3.144-7.784-7.696-7.784-4.557 0-7.7 3.102-7.7 7.784s3.143 7.785 7.7 7.785c1.806 0 3.363-.492 4.637-1.364zm3.314.082l2.15 1.877-1.502 1.498-2.209-1.933c-1.7 1.25-3.877 1.989-6.395 1.989-6.054 0-10.218-4.216-10.218-9.934C16.545 5.1 20.71.88 26.763.88 32.85.88 36.95 5.1 36.95 10.817c.005 2.529-.818 4.79-2.231 6.503zM40.662 13.1V1.29h2.432v11.707c0 4 1.981 5.605 6.029 5.605 4.073 0 6.059-1.605 6.059-5.605V1.29h2.432V13.1c0 5.257-3 7.652-8.491 7.652-5.46 0-8.461-2.395-8.461-7.651zM64.84 1.29h-2.432v19.056h2.433V1.29zM69.693 1.29v19.056h13.473v-2.153h-11.04V1.29h-2.433zM88.648 1.29h-2.432v19.056h2.433V1.29zM102.582 18.193c3.453 0 4.955-1.062 4.955-3.431 0-2.42-1.413-3.405-4.87-3.405h-6.734v6.836h6.649zm.34-8.847c2.603 0 3.877-1.005 3.877-3.046 0-1.851-1.328-2.861-3.877-2.861h-6.993v5.907h6.993zM93.496 1.29h9.963c3.51 0 5.804 1.933 5.804 4.898 0 1.877-.907 3.322-2.352 3.948v.056c1.843.626 3.086 2.287 3.086 4.548 0 3.647-2.406 5.606-6.99 5.606h-9.511V1.29zM123.381 10.49c2.942 0 4.418-1.2 4.418-3.538 0-2.318-1.472-3.513-4.472-3.513h-7.021v7.051h7.075zm.988 2.149l5.151 7.703h-2.83l-5.036-7.703h-5.348v7.703h-2.432V1.29h9.623c4.244 0 6.766 2.093 6.766 5.662 0 3.374-2.183 5.415-5.89 5.661v.026h-.004zM136.228 1.29h-2.433v19.056h2.433V1.29zM140.981 13.1V1.29h2.433v11.707c0 4 1.981 5.605 6.028 5.605 4.074 0 6.059-1.605 6.059-5.605V1.29h2.433V13.1c0 5.257-3.001 7.652-8.492 7.652-5.46 0-8.461-2.395-8.461-7.651zM182.207 1.29l-8.063 15.405h-.058L165.992 1.29h-3.286v19.056h2.437V4.526h.053l8.407 15.82h.993l8.376-15.82h.058v15.82h2.464V1.29h-3.287zM0 11.84v8.505h14.238v-2.153H2.433V11.84H0zM0 1.29l.004 7.84h2.438l-.01-5.691h11.806V1.29H0zM13.33 9.432H7.795v2.106h5.537V9.432z"
            fill="#191A17" />
        </svg>

        <div id="section-about">
          <div class="section-title__wrapper">
            <h4 class="section-title">About Us</h4>
          </div>
          <div class="section-content__wrapper">
            <?php the_field('front_page_about'); ?>
            <a href="/about" class="eq-link">Read More</a>

            <div class="image__wrapper--mobile">
              <?php
              if (!empty($featuredImage)) : ?>

              <img src="<?php echo esc_url($preloadImage); ?>" data-src="<?php echo esc_url($featuredImage['url']); ?>"
                class="lazy" alt="<?php echo esc_attr($featuredImage['alt']); ?>" />
              <?php endif; ?>
            </div>

          </div>
        </div>
        <div id="section-news">
          <div class="section-title__wrapper">
            <h4 class="section-title">News</h4>
          </div>
          <div class="section-content__wrapper">
            <?php
            $featured_posts = get_field('featured_news');
            if ($featured_posts) : ?>
            <ul class="news-article-list">
              <?php foreach ($featured_posts as $featured_post) :
                  $post_date = get_the_date("m.d.y", $featured_post->ID);
                  $permalink = get_permalink($featured_post->ID);
                  $title = get_the_title($featured_post->ID);
                  $excerpt = get_the_excerpt($featured_post->ID);
                ?>
              <li class="news-article">
                <p class="underlined"><?php echo esc_html($post_date); ?></p>
                <p><?php echo $excerpt; ?></p>
                <a href="<?php echo esc_url($permalink); ?>">Article Link</a>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </section>
  </main>
</div>
<?php
get_footer();