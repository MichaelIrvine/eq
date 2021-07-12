<?php
if (get_field('display_history_section_toggle')) : ?>


<!-- ********************** -->
<!-- ********************** -->
<!--    Timeline Section     -->
<!-- ********************** -->
<!-- ********************** -->

<?php
  if (have_rows('approach_timeline')) : ?>

<section id="approach-timeline" class="anchor">
  <div id="timeline__title-row" class="timeline__row grid__wrapper">
    <div>
      <h4>History</h4>
    </div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <?php while (have_rows('approach_timeline')) : the_row();
        if (get_row_layout() == 'timeline') :

          $rows = get_sub_field('timeline_item'); ?>

  <?php foreach ($rows as $key => $row) : ?>

  <div class="timeline__row grid__wrapper">

    <div>
      <h4><?php echo $row['year']; ?></h4>
    </div>

    <?php if ($key % 2 == 0) : ?>

    <div>
      <div class="content__wrapper">
        <?php echo $row['content'] ?>
      </div>
      <!-- Link - If exists -->
      <?php if ($row['link']) : ?>
      <a class="project-link" href="<?php echo esc_url($row['link']); ?>">See Project</a>
      <?php endif; ?>
    </div>

    <div></div>

    <?php else : ?>
    <div>
      <div class="content__wrapper nth-even">
        <?php echo $row['content'] ?>
      </div>
    </div>
    <div>
      <div class="content__wrapper">
        <?php echo $row['content'] ?>
      </div>
      <!-- Link - If exists -->
      <?php if ($row['link']) : ?>
      <a class="project-link" href="<?php echo esc_url($row['link']); ?>">See Project</a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    <div>
      <!-- Link - If exists -->
      <?php if ($row['link']) : ?>
      <a class="project-link" href="<?php echo esc_url($row['link']); ?>">See Project</a>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; ?>

  <?php
        endif;
      endwhile; ?>

  <div class="timeline__footer-row timeline__row grid__wrapper">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</section>
<!-- End timeline section -->
<?php endif; ?>
<!-- End Toggle Display -->
<?php
endif;
?>