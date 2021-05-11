<?php
$related_posts = get_field('related_projects');
if ($related_posts) :
?>
<div id="related-posts" class="flex__wrapper">
  <div>
    <h4>Related Case Studies</h4>
  </div>
  <div class="grid__wrapper">
    <?php
      foreach ($related_posts as $post) :
        setup_postdata($post);
      ?>
    <div>
      <a href="<?php the_permalink(); ?>">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>" alt="<?php the_title(); ?>">
      </a>
      <?php $tags = get_the_tags($post->ID);
          if ($tags) {
            foreach ($tags as $tag) {
              echo '<h4>' . $tag->name . '</h4>';
            }
          }
          ?>
      <a href="<?php the_permalink(); ?>">
        <h3><?php the_title(); ?></h3>
      </a>

      <p><?php eq_excerpt('20'); ?></p>

    </div>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</div>
<?php endif; ?>