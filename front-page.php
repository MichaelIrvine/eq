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
              <?php if (get_field('featured_title')) : ?>
              <h4><?php echo get_field('featured_title'); ?></h4>
              <?php endif; ?>
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
        <svg id="columnLogo" width="403" height="44" viewBox="0 0 403 44" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="M68.2302 35.5409L57.4073 26.1377L60.73 22.9501L71.5528 32.3533C73.6416 29.5127 74.8754 25.847 74.8754 21.5908C74.8754 11.4188 68.0456 4.67816 58.1554 4.67816C48.2556 4.67816 41.4257 11.4188 41.4257 21.5908C41.4257 31.7627 48.2556 38.5034 58.1554 38.5034C62.0804 38.5034 65.4613 37.4346 68.2302 35.5409ZM75.4292 35.719L80.1022 39.7971L76.8379 43.0503L72.0386 38.8503C68.3468 41.569 63.6154 43.1722 58.1457 43.1722C44.9912 43.1722 35.9463 34.0127 35.9463 21.5908C35.9463 9.16881 44.9912 0 58.1457 0C71.3682 0 80.2771 9.16881 80.2771 21.5908C80.2868 27.0846 78.4992 31.9971 75.4292 35.719Z"
            fill="#191A17" fill-opacity="0.1" />
          <path
            d="M88.3408 26.5516V0.892029H93.6259V26.3266C93.6259 35.0172 97.9298 38.5048 106.722 38.5048C115.573 38.5048 119.886 35.0172 119.886 26.3266V0.892029H125.171V26.5516C125.171 37.9704 118.653 43.1735 106.722 43.1735C94.8598 43.1735 88.3408 37.9704 88.3408 26.5516Z"
            fill="#191A17" fill-opacity="0.1" />
          <path d="M140.872 0.892029H135.587V42.2923H140.872V0.892029Z" fill="#191A17" fill-opacity="0.1" />
          <path d="M151.413 0.892029V42.2923H180.685V37.6142H156.698V0.892029H151.413Z" fill="#191A17"
            fill-opacity="0.1" />
          <path d="M192.596 0.892029H187.311V42.2923H192.596V0.892029Z" fill="#191A17" fill-opacity="0.1" />
          <path
            d="M222.868 37.6142C230.369 37.6142 233.633 35.3079 233.633 30.161C233.633 24.9016 230.563 22.7641 223.053 22.7641H208.422V37.6142H222.868ZM223.607 18.3953C229.261 18.3953 232.03 16.2109 232.03 11.7765C232.03 7.75458 229.145 5.56081 223.607 5.56081H208.412V18.3953H223.607ZM203.127 0.892029H224.773C232.399 0.892029 237.383 5.09206 237.383 11.5327C237.383 15.6109 235.411 18.7515 232.273 20.1109V20.2328C236.276 21.5922 238.976 25.2016 238.976 30.1141C238.976 38.036 233.75 42.2923 223.791 42.2923H203.127V0.892029Z"
            fill="#191A17" fill-opacity="0.1" />
          <path
            d="M268.054 20.8797C274.447 20.8797 277.653 18.2734 277.653 13.1921C277.653 8.1577 274.456 5.56081 267.938 5.56081H252.685V20.8797H268.054ZM270.201 25.5484L281.393 42.2829H275.243L264.304 25.5484H252.685V42.2829H247.399V0.892029H268.307C277.527 0.892029 283.006 5.43893 283.006 13.1921C283.006 20.5234 278.265 24.9578 270.211 25.4922V25.5484H270.201Z"
            fill="#191A17" fill-opacity="0.1" />
          <path d="M295.966 0.892029H290.681V42.2923H295.966V0.892029Z" fill="#191A17" fill-opacity="0.1" />
          <path
            d="M306.294 26.5516V0.892029H311.579V26.3266C311.579 35.0172 315.883 38.5048 324.675 38.5048C333.526 38.5048 337.839 35.0172 337.839 26.3266V0.892029H343.125V26.5516C343.125 37.9704 336.606 43.1735 324.675 43.1735C312.813 43.1735 306.294 37.9704 306.294 26.5516Z"
            fill="#191A17" fill-opacity="0.1" />
          <path
            d="M395.86 0.892029L378.343 34.361H378.217L360.632 0.892029H353.491V42.2923H358.786V7.92333H358.903L377.167 42.2923H379.324L397.521 7.92333H397.647V42.2923H403V0.892029H395.86Z"
            fill="#191A17" fill-opacity="0.1" />
          <path d="M0 23.8127V42.291H30.9335V37.6128H5.28511V23.8127H0Z" fill="#191A17" fill-opacity="0.1" />
          <path d="M0 0.892029L0.00971528 17.9265H5.30454L5.28511 5.56081H30.9335V0.892029H0Z" fill="#191A17"
            fill-opacity="0.1" />
          <path d="M28.9616 18.5814H16.9341V23.1564H28.9616V18.5814Z" fill="#191A17" fill-opacity="0.1" />
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