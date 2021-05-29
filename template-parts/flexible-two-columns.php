<?php
$columnOne = get_sub_field('column_one');
$columnTwo = get_sub_field('column_two');
?>

<section class="post-section flexible-columns flexible-columns--two flex__wrapper">
  <div class="flex-col content-editor__reset"><?php echo $columnOne; ?></div>
  <div class="flex-col content-editor__reset"><?php echo $columnTwo; ?></div>
</section>