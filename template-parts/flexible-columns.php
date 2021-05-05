<?php
$columnOne = get_sub_field('column_one');
$columnTwo = get_sub_field('column_two');
$columnThree = get_sub_field('column_three');
?>

<section class="flexible-columns flex__wrapper">
  <div class="flex-col"><?php echo $columnOne; ?></div>
  <div class="flex-col"><?php echo $columnTwo; ?></div>
  <div class="flex-col"><?php echo $columnThree; ?></div>
</section>