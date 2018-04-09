<?php
/**
 * @file
 * Returns HTML for a region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728112
 */
?>
<?php if ($content): ?>
  <div class="<?php print $classes; ?> container grid-xl">
    <div class="columns">
      <?php print $content; ?>
    </div>
  </div>
<?php endif; ?>
