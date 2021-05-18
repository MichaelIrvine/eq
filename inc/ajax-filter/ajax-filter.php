<?php
add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax()
{
  $category = $_POST['category'];

  $args = array(
    'post_type' => 'projects',
    'posts_per_page' => -1,
  );

  if (isset($category)) {
    $args['category__in'] = array($category);
  }

  $the_query = new WP_Query($args);

  while ($the_query->have_posts()) : $the_query->the_post();
?>

<div class="article__wrapper">
  <div>
    <a href="<?= the_permalink(); ?>" class="feature-image-link">
      <div class="aspect__wrapper _5x8">
        <img src="<? echo get_the_post_thumbnail_url('', 'full'); ?>" alt="<?php echo the_title(); ?>">
      </div>
    </a>
  </div>
  <div>
    <?php
        $postCats = get_the_category();
        ?>
    <ul class="post-category-list">
      <?php foreach ($postCats as $postCat) : ?>
      <?php if ($postCat->parent != 0) : ?>
      <li>
        <p class="light"><?php echo $postCat->name; ?></p>
      </li>
      <?php endif; ?>
      <?php endforeach; ?>
    </ul>

    <a href="<?= the_permalink(); ?>">
      <h3><?php the_title(); ?></h3>
    </a>
  </div>
  <span></span>
</div>

<?php endwhile;
  wp_reset_postdata();
  die();
}