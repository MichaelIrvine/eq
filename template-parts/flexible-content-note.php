<?php
$content = get_sub_field('column_content');
$notes = get_sub_field('notes');
$alignment = get_sub_field('alignment');
?>

<section class="post-section flexible-content-notes flex__wrapper <?php echo $alignment; ?>">
  <div class="flex__wrapper">
    <div class="flex-col content-editor__reset"><?php echo $content; ?></div>
    <div class="flex-col content-editor__reset"><?php echo $notes; ?></div>
  </div>
</section>