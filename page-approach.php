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

<main class="page__approach site-main">
  <!-- Page Heading -->
  <?php
  if (have_rows('approach_heading')) :
    while (have_rows('approach_heading')) : the_row();

      $apContent = get_sub_field('approach_text');
      $apImage = get_sub_field('approach_image');
      $preloadImage = $apImage['sizes']['preloadHalfHero'];
  ?>
  <section id="approach-heading" class="flex__wrapper">
    <div class="flex__wrapper staggered">
      <div class="content__wrapper">
        <?php echo $apContent; ?>
      </div>
    </div>
    <div class="staggered">
      <?php
          if (!empty($apImage)) : ?>
      <img src="<?php echo esc_url($preloadImage); ?>" data-src="<?php echo esc_url($apImage['url']); ?>" class="lazy"
        alt="<?php echo esc_attr($apImage['alt']); ?>" />
      <?php endif; ?>
    </div>
  </section>
  <?php
    endwhile;
  endif;
  ?>
  <!-- Timeline Section -->
  <section id="approach-timeline">
    <div id="timeline__title-row" class="timeline__row grid__wrapper">
      <div>
        <h4>History</h4>
      </div>
      <div></div>
      <div></div>
      <div></div>
    </div>

    <!-- Flexible Content -->
    <?php
    if (have_rows('approach_timeline')) :
      while (have_rows('approach_timeline')) : the_row();
        if (get_row_layout() == 'timeline') :

          $rows = get_sub_field('timeline_item'); ?>

    <?php foreach ($rows as $key => $row) : ?>

    <div class="timeline__row grid__wrapper">
      <div>
        <h4><?php echo $row['year']; ?></h4>
      </div>
      <?php if ($key % 2 == 0) : ?>
      <div>
        <div class="content__wrapper">
          <?php echo $row['content'] ?>
        </div>
        <!-- Link - If exists -->
        <?php if ($row['link']) : ?>
        <a class="project-link" href="<?php echo esc_url($row['link']); ?>">See Project</a>
        <?php endif; ?>
      </div>
      <div></div>
      <?php else : ?>
      <div>
        <div class="content__wrapper nth-even">
          <?php echo $row['content'] ?>
        </div>
      </div>
      <div>
        <div class="content__wrapper">
          <?php echo $row['content'] ?>
        </div>
        <!-- Link - If exists -->
        <?php if ($row['link']) : ?>
        <a class="project-link" href="<?php echo esc_url($row['link']); ?>">See Project</a>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <div>
        <!-- Link - If exists -->
        <?php if ($row['link']) : ?>
        <a class="project-link" href="<?php echo esc_url($row['link']); ?>">See Project</a>
        <?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>

    <?php
        endif;
      endwhile;
    endif; ?>

    <!-- Timeline Footer -->
    <div class="timeline__footer-row timeline__row grid__wrapper">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </section>

</main>

<?php
get_footer();