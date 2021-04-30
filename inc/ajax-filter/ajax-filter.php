<?php
add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax()
{
  $category = $_POST['category'];

  $args = array(
    'post_type' => 'news',
    'posts_per_page' => -1,
  );

  if (isset($category)) {
    $args['category__in'] = $category;
  }

  $the_query = new WP_Query($args);

  while ($the_query->have_posts()) : $the_query->the_post();
?>

<div class="article__wrapper">
  <div>
    <a href="<?= the_permalink(); ?>" class="feature-image-link">
      <?php
          the_post_thumbnail('full');
          ?>
    </a>
  </div>
  <div>
    <span class="post-category"><?php the_category(' '); ?></span>
    <a href="<?= the_permalink(); ?>">
      <h2><?php the_title(); ?></h2>
    </a>
  </div>
</div>

<?php endwhile;
  wp_reset_postdata();
  die();
}