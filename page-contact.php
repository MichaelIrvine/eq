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

<main class="page-contact site-main">

  <section id="contactDetails" class="flex__wrapper">

    <?php
    $contactDetails = get_field('contact_details');
    if ($contactDetails) : ?>
    <div class="staggered">
      <h4><?php echo $contactDetails['contact_details_title']; ?> </h4>
      <?php echo $contactDetails['contact_details']; ?>
    </div>
    <?php endif; ?>

    <div class="staggered">
      <?php
      $careersDetails = get_field('careers_details');
      if ($contactDetails) : ?>

      <h4><?php echo $careersDetails['careers_title']; ?> </h4>
      <?php echo $careersDetails['careers_text']; ?>

      <?php endif; ?>

      <?php
      $jobPosts = get_field('job_postings');

      if ($jobPosts) : ?>

      <p>Current Openings:</p>
      <ul>
        <?php
          foreach ($jobPosts as $jobPost) :  ?>
        <li>
          <p><?php echo $jobPost['job_title']; ?></p>
          <a href="<?php echo esc_url($jobPost['job_link']); ?>">Learn More</a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>

    <div class="staggered">
      <?php echo the_field('contact_form'); ?>
    </div>
  </section>
  <section id="contactImage">
    <div>
      <?php
      $image = get_field('contact_image');
      $size = 'full';
      if ($image) {
        echo wp_get_attachment_image($image, $size);
      } ?>
    </div>
  </section>
</main>

<?php
get_footer();