<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EQ
 */

get_header();
?>

<main class="site-main archive-page__projects">
  <div class="categories-filter__wrapper">
    <ul class="categories-filter__list">
      <p>Sort By</p>
      <li class="category-filter__item"><a class="current-active-category" href="<?php echo home_url('projects') ?>">All
          Projects</a>
      </li>
      <?php

      $cat_args_parents = array(
        'exclude' => array(1),
        'option_all' => 'All',
        'parent' => 0,
        'hide_empty' => false,
        'include' => '10, 12'
      );

      $categories = get_categories($cat_args_parents);

      foreach ($categories as $cat) : ?>

      <li class="parent-category-item">
        <a class="accordion__button" href="<?php home_url('projects'); ?>"><?php echo $cat->name; ?></a>
        <ul class="accordion__content">
          <?php
            $subCategories = get_categories(
              array(
                'child_of' => $cat->cat_ID,
                'order' => 'ASC',
                'hide_empty' => false
              )
            );

            ?>
          <?php
            foreach ($subCategories as $subCat) : ?>
          <li class="category-filter__item">
            <a data-category="<?php echo $subCat->term_id; ?>" href="<?php echo get_category_link($subCat->term_id) ?>">
              <?php echo $subCat->name ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php
      endforeach;
      ?>

    </ul>
  </div>

  <div class="filtered-articles grid__wrapper _3x">
    <?php

    $args = array(
      'post_type' => 'projects',
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'order' => 'DSC',
      'meta_query' => array(
        'relation' => 'OR',
        array(
          'key'     => 'excluded_project',
          'value'   => '0',
          'compare' => '=',
        ),
        array(
          'key'     => 'excluded_project',
          'compare' => 'NOT EXISTS',
        )
      )
    );

    $the_query = new WP_Query($args);

    while ($the_query->have_posts()) : $the_query->the_post();

    ?>

    <div class="article__wrapper staggered">
      <span></span>
      <div>
        <a href="<?= the_permalink(); ?>" class="feature-image-link">
          <img src="<? echo get_the_post_thumbnail_url('', 'preload'); ?>"
            data-src="<? echo get_the_post_thumbnail_url('', 'full'); ?>" alt="<?php echo the_title(); ?>" class="lazy">
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
    </div>

    <?php endwhile;
    wp_reset_postdata(); ?>

  </div>
</main>

<?php
get_footer();