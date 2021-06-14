<?php $images = get_sub_field('images');

if ($images) : ?>

<?php
  if (count($images) == 1) : ?>

<section class="post-section gallery__wrapper --full-bleed">
  <?php foreach ($images as $image) : ?>

  <div class="gallery-item"><img class="lightbox-image" src="<?php echo $image; ?>" /></div>

  <?php endforeach; ?>
</section>

<?php elseif (count($images) > 1 && count($images) < 3) : ?>

<section class="post-section gallery__wrapper --two-col">
  <?php foreach ($images as $image) : ?>

  <div class="gallery-item"><img class="lightbox-image" src="<?php echo $image; ?>" /></div>

  <?php endforeach; ?>
</section>

<?php elseif (count($images) > 2) : ?>

<section class="post-section gallery__wrapper --multi-col">
  <?php foreach ($images as $image) : ?>

  <div class="gallery-item"><img class="lightbox-image" src="<?php echo $image; ?>" /></div>

  <?php endforeach; ?>

</section>
<?php endif; ?>
<?php endif; ?>