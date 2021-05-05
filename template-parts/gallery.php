<?php $images = get_sub_field('images');

if ($images) : ?>
<section class="post-section gallery masonry__wrapper">


  <?php
    if (count($images) > 1) : ?>

  <?php foreach ($images as $image) : ?>

  <div class="gallery-item --two-col"><img src="<?php echo $image; ?>" /></div>

  <?php endforeach; ?>

  <?php endif; ?>
  <?php endif; ?>
</section>