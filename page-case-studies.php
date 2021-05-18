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

<main class="page-case-studies site-main">
  <div class="flex__wrapper">
    <div class="content__wrapper">
      <?php echo the_field('case_studies_text'); ?>
      <p>Scroll to explore our selected case studies <span><svg width="13" height="8" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12.354 4.354a.5.5 0 000-.708L9.172.464a.5.5 0 10-.708.708L11.293 4 8.464 6.828a.5.5 0 10.708.708l3.182-3.182zM0 4.5h12v-1H0v1z"
              fill="#8F8E8B" />
          </svg></span></p>
    </div>
    <div class="case-studies__wrapper">
      <?php
      $case_studies = get_field('case_studies');
      if ($case_studies) : ?>
      <ul class="grid__wrapper">
        <?php foreach ($case_studies as $case_study) :
            $permalink = get_permalink($case_study->ID);
            $title = get_the_title($case_study->ID);
            $postCats = get_the_category($case_study->ID);
          ?>
        <li>
          <span></span>
          <a href="<?php echo esc_url($permalink); ?>">
            <img src="<?php echo get_the_post_thumbnail_url($case_study->ID, "preload"); ?>"
              data-src="<?php echo get_the_post_thumbnail_url($case_study->ID, "full"); ?>" class="lazy"
              alt="<?php echo esc_html($title); ?>">
          </a>
          <div>
            <ul class="post-category-list">
              <?php foreach ($postCats as $postCat) : ?>
              <?php if ($postCat->parent != 0) : ?>
              <li>
                <p class="light"><?php echo $postCat->name; ?></p>
              </li>

              <?php
                    endif;
                  endforeach; ?>
            </ul>
            <a href="<?php echo esc_url($permalink); ?>">
              <h3><?php echo esc_html($title); ?></h3>
            </a>
            <p><?php echo get_the_excerpt($case_study->ID); ?></p>
          </div>
        </li>

        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php
get_footer();