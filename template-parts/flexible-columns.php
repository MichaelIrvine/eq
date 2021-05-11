<?php
$columnOne = get_sub_field('column_one');
$columnTwo = get_sub_field('column_two');
$columnThree = get_sub_field('column_three');
?>

<section class="post-section flexible-columns flex__wrapper">
  <div class="flex-col content-editor__reset"><?php echo $columnOne; ?></div>
  <div class="flex-col content-editor__reset"><?php echo $columnTwo; ?></div>
  <div class="flex-col content-editor__reset"><?php echo $columnThree; ?></div>
</section>