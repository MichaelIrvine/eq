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
  <section id="about-heading" class="about-content flex__wrapper">
    <div class="staggered image__wrapper">
      <?php
          if (!empty($aboutImage)) : ?>
      <img src="<?php echo esc_url($preloadImage); ?>" data-src="<?php echo esc_url($aboutImage['url']); ?>"
        class="lazy" alt="<?php echo esc_attr($aboutImage['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="flex__wrapper content__wrapper content-editor__reset staggered">
      <div class="inner__wrapper">
        <h1><?php echo $aboutTitle; ?></h1>
        <div class="content-editor__reset">
          <?php echo $aboutContent; ?>
        </div>
      </div>
    </div>
  </section>
  <?php
    endwhile;
  endif;
  ?>
  <?php
  if (have_rows('about_info')) :
    while (have_rows('about_info')) : the_row();

      $aboutTitle = get_sub_field('about_info_title');
      $aboutContent = get_sub_field('about_info_text');
      $aboutImage = get_sub_field('about_info_image');
      $preloadImage = $aboutImage['sizes']['preloadHalfHero'];

  ?>
  <section id="about-info" class="about-content flex__wrapper">
    <div class="flex__wrapper content__wrapper content-editor__reset staggered">
      <div class="inner__wrapper">
        <h1><?php echo $aboutTitle; ?></h1>
        <div class="content-editor__reset">
          <?php echo $aboutContent; ?>
        </div>
      </div>
    </div>
    <div class="staggered image__wrapper">
      <?php
          if (!empty($aboutImage)) : ?>
      <img src="<?php echo esc_url($preloadImage); ?>" data-src="<?php echo esc_url($aboutImage['url']); ?>"
        class="lazy" alt="<?php echo esc_attr($aboutImage['alt']); ?>" />
      <?php endif; ?>
    </div>
  </section>
  <?php
    endwhile;
  endif;
  ?>
  <!-- About Info Row 2 -->
  <?php
  if (have_rows('about_info_second_row')) :
    while (have_rows('about_info_second_row')) : the_row();

      $aboutTitle = get_sub_field('about_info_title');
      $aboutContent = get_sub_field('about_info_text');
      $aboutImage = get_sub_field('about_info_image');
      $preloadImage = $aboutImage['sizes']['preloadHalfHero'];
  ?>
  <section id="about-info-2" class="about-content flex__wrapper">
    <div class="staggered image__wrapper">
      <?php
          if (!empty($aboutImage)) : ?>
      <img src="<?php echo esc_url($preloadImage); ?>" data-src="<?php echo esc_url($aboutImage['url']); ?>"
        class="lazy" alt="<?php echo esc_attr($aboutImage['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="flex__wrapper content__wrapper content-editor__reset staggered">
      <div class="inner__wrapper">
        <h1><?php echo $aboutTitle; ?></h1>
        <div class="content-editor__reset">
          <?php echo $aboutContent; ?>
        </div>
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
    'order' => 'DESC',
  );

  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) : ?>
  <div id="section-heading">
    <h4>Team Composition</h4>
  </div>

  <section id="eq-team" class="grid__wrapper anchor">
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

    wp_reset_postdata();
    ?>
  </section>


  <!-- Contact -->
  <section id="contactDetails" class="flex__wrapper anchor">

    <?php
      $contactDetails = get_field('about_contact_details');
      if ($contactDetails) : ?>
    <div>
      <h4><?php echo $contactDetails['about_contact_detail_title']; ?> </h4>
      <?php echo $contactDetails['about_contact_details']; ?>
    </div>
    <?php endif; ?>

    <div>
      <?php
        $careersDetails = get_field('about_career_details');
        if ($contactDetails) : ?>

      <h4><?php echo $careersDetails['about_careers_title']; ?> </h4>
      <?php echo $careersDetails['about_careers_text']; ?>

      <?php endif; ?>

      <?php
        $jobPosts = get_field('about_job_postings');

        if ($jobPosts) : ?>

      <p>Current Openings:</p>
      <ul>
        <?php
            foreach ($jobPosts as $jobPost) :  ?>
        <li>
          <p><?php echo $jobPost['job_posting_title']; ?></p>
          <a href="<?php echo esc_url($jobPost['job_posting_link']); ?>">Learn More</a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>

    <div>
      <?php echo the_field('about_contact_page_form'); ?>
    </div>
  </section>
  <section id="contactImage">
    <div>
      <?php
        $image = get_field('about_contact_image');
        $size = 'full';
        if ($image) {
          echo wp_get_attachment_image($image, $size);
        } ?>
    </div>
  </section>


</main>

<?php
get_footer();