
<?php
  $heading_component = $args['heading_component'];
  $text_component = $args['text_component'];
  $enable_white_version = $args['enable_white_version'];
  $text_component_enable_full_width = $args['text_component_enable_full_width'];
  $heading_in_content = $args['heading_in_content'];
?>

<?php if ($heading_component) : ?>
  <h2 class="heading heading--center 
    <?php 
      echo ' ';
      echo get_modifier_version($heading_in_content, 'heading', 'margin-bottom-content'); 
      echo ' ';
      echo get_modifier_version($enable_white_version, 'heading', 'black'); 
    ?>">
    <?php echo $heading_component; ?>
  </h2>
<?php endif; ?>

<?php if ($text_component) : ?>
  <?php
    $classes = 'text ';
    $classes .= get_modifier_version($enable_white_version, 'text', 'black');
    $classes .= ' ';
    $classes .= get_modifier_version($text_component_enable_full_width, 'text', 'full-width');
  ?>
  <div class=" <?php echo $classes; ?>">
    <?php echo $text_component; ?>
  </div>
<?php endif;