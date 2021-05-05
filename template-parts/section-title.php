<?php
$title = get_sub_field('title');
if ($title) : ?>
<section class="post-section post-section-title">
  <h4><?php echo $title; ?></h4>
</section>
<?php endif; ?>