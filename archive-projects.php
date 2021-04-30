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

      <li class="category-filter__item">
        <p><?php echo $cat->name; ?></p>
        <ul>
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
          <li>
            <a href="/">
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
		);

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
        <p class="post-category">

          <?php
						$args = [
							'child_of' => '10, 12'
						];

						$postCats = get_the_category($args);
						foreach ($postCats as $cat) : ?>
        <p> <?php echo $cat->name; ?></p>

        <?php endforeach; ?>
        </p>

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