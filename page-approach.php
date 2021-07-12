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
  <section id="approach-heading" class="flex__wrapper approach_two_cols">
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
  <!-- Approach Info Section 1 -->
  <?php
  if (have_rows('approach_info')) :
    while (have_rows('approach_info')) : the_row();

      $apContent = get_sub_field('approach_text');
      $apImage = get_sub_field('approach_image');
      $preloadImage = $apImage['sizes']['preloadHalfHero'];
  ?>
  <section id="approach-info-1" class="flex__wrapper approach_two_cols">
    <div class="staggered">
      <?php
          if (!empty($apImage)) : ?>
      <img src="<?php echo esc_url($preloadImage); ?>" data-src="<?php echo esc_url($apImage['url']); ?>" class="lazy"
        alt="<?php echo esc_attr($apImage['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="flex__wrapper staggered">
      <div class="content__wrapper">
        <?php echo $apContent; ?>
      </div>
    </div>
  </section>
  <?php
    endwhile;
  endif;
  ?>

  <!-- Approach info section 2 -->

  <?php
  if (have_rows('approach_info_2')) :
    while (have_rows('approach_info_2')) : the_row();

      $apContent = get_sub_field('approach_text');
      $apImage = get_sub_field('approach_image');
      $preloadImage = $apImage['sizes']['preloadHalfHero'];
  ?>
  <section id="approach-info-2" class="flex__wrapper approach_two_cols">
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

  <!-- ********************** -->
  <!--   Timeline Row Layout  -->
  <!-- ********************** -->
  <div id="history" class="anchor"></div>
  <?php
  if (get_field('display_history_section_toggle')) : ?>

  <?php
    // Keeping track of row index for alternating layouts
    $rowCount = 0;

    if (have_rows('approach_timeline_row_layout')) : ?>
  <!-- Timeline Row Layout Section Begin -->
  <section id="timeline-row-layout">
    <div class="timeline-title-row__wrapper">
      <div>
        <h4>History</h4>
      </div>
      <div></div>
    </div>
    <?php while (have_rows('approach_timeline_row_layout')) : the_row();
          $date = get_sub_field('timeline_date');
          $timelineText = get_sub_field('timeline_text');
          $timelineImage = get_sub_field('timeline_image');
        ?>
    <div class="timeline__wrapper">
      <!-- Date Block -->
      <div class="timeline-date__wrapper">
        <h4><?php echo $date; ?></h4>
      </div>

      <!-- Check row index - alternate layout -->
      <?php if ($rowCount % 2 === 0) : ?>

      <div class="col__wrapper odd">
        <div class="flex__wrapper">
          <div><?php echo $timelineText; ?></div>
        </div>
        <div>
          <div>
            <?php if (!empty($timelineImage)) : ?>
            <img src="<?php echo esc_url($timelineImage['url']); ?>"
              alt="<?php echo esc_attr($timelineImage['alt']); ?>" />
            <?php endif; ?>
          </div>
        </div>
      </div>


      <?php else : ?>
      <div class="col__wrapper even">
        <div>
          <div>
            <?php if (!empty($timelineImage)) : ?>
            <img src="<?php echo esc_url($timelineImage['url']); ?>"
              alt="<?php echo esc_attr($timelineImage['alt']); ?>" />
            <?php endif; ?>
          </div>
        </div>
        <div class="flex__wrapper">
          <div><?php echo $timelineText; ?></div>
        </div>
      </div>
      <?php endif;
            $rowCount++; ?>
      <!-- End of Timeline Row Main Wrapper -->
    </div>
    <?php
        // End loop.
        endwhile; ?>
    <!-- End Timeline Section -->
    <!-- Timeline Footer -->
    <div class="timeline-row-layout__footer">
      <div></div>
      <div></div>
    </div>
  </section>
  <?php endif; ?>
  <?php endif; ?>

</main>

<?php
get_footer();