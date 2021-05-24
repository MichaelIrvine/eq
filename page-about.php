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

<main class="page__about site-main">
  <?php
  if (have_rows('about_heading')) :
    while (have_rows('about_heading')) : the_row();

      $aboutTitle = get_sub_field('about_page_title');
      $aboutContent = get_sub_field('about_text');
      $aboutImage = get_sub_field('about_image');
      $preloadImage = $aboutImage['sizes']['preloadHalfHero'];
  ?>
  <section id="about-heading" class="flex__wrapper">
    <div class="staggered">
      <?php
          if (!empty($aboutImage)) : ?>
      <img src="<?php echo esc_url($preloadImage); ?>" data-src="<?php echo esc_url($aboutImage['url']); ?>"
        class="lazy" alt="<?php echo esc_attr($aboutImage['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="flex__wrapper content-editor__reset staggered">
      <h1><?php echo $aboutTitle; ?></h1>
      <div class="content-editor__reset">
        <?php echo $aboutContent; ?>
      </div>
    </div>
  </section>
  <?php
    endwhile;
  endif;
  ?>

  <?php
  // Team Members
  $args = array(
    'post_type' => 'team',
    'posts_per_page' => -1,
  );

  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) : ?>
  <div id="section-heading">
    <h4>Team Composition</h4>
  </div>

  <section id="eq-team" class="grid__wrapper">
    <?php
      while ($the_query->have_posts()) : $the_query->the_post();
        $teamMember = get_field('team_member');
        $memberPic = $teamMember['member_picture'];
        $memberName = $teamMember['member_name'];
        $memberEdu = $teamMember['member_education'];
        $memberTitle = $teamMember['member_title'];
        $memberBio = $teamMember['member_bio'];
      ?>

    <!-- Team Member -->
    <div class="grid-item">
      <span></span>
      <div class="flex__wrapper">
        <div class="member-img__wrapper">
          <?php
              echo wp_get_attachment_image($memberPic, 'teamImgGrid');
              ?>
        </div>
        <div class="member-info__wrapper flex__wrapper">
          <div>
            <p><?php echo $memberName; ?></p>
            <p><?php echo $memberEdu; ?></p>
            <p class="light"><?php echo $memberTitle; ?></p>
          </div>

          <button class="btn--team-bio" data-id="<?php the_ID(); ?>"
            data-team-member="<?php echo sanitize_title($memberName); ?>">Read
            Bio</button>
        </div>
      </div>
      <!-- Team Member Bios -->
      <div class="team-bio__wrapper" data-bio-id="<?php the_ID(); ?>">


        <div class="bio-panel">
          <div class="close__wrapper">
            <button id="<?php the_ID(); ?>" class="panel-close">
              <span></span>
              <span></span>
            </button>
          </div>
          <div class="panel-img__wrapper">
            <?php
                echo wp_get_attachment_image($memberPic, 'full');
                ?>
          </div>
          <div class="panel-text__wrapper">
            <div>
              <p class="light"><?php echo $memberEdu; ?></p>
              <p class="eq-blue"><?php echo $memberTitle; ?></p>
              <h2><?php echo $memberName; ?></h2>
            </div>
            <div>
              <p><?php echo $memberBio; ?></p>
            </div>
          </div>
        </div>

      </div>
      <!-- End Grid Item -->
    </div>

    <?php
      endwhile;
    endif;
    ?>
  </section>
</main>

<?php
get_footer();