<?php

/**
 *
 * Create inline margin styles from ACF fields for section
 *
 * @param   integer  $pageID  Page ID
 * @return  string   Inline CSS styles
 *
 */

function display_margins_for_page($pageID){
  $ignore_margin_top_small_screens = get_sub_field('ignore_margin_top_small_screens', $pageID);
  $margin_padding_styles = 'style="';

  //generating margins
  $margin_padding_styles .= get_sub_field('margin_top', $pageID) ? 'margin-top: ' . strval(get_sub_field('margin_top', $pageID)) . 'px; ' : null;  
  $margin_padding_styles .= get_sub_field('margin_bottom', $pageID) ? 'margin-bottom: ' . strval(get_sub_field('margin_bottom', $pageID)) . 'px; ' : null;

  //generating paddings
  $margin_padding_styles .= get_sub_field('padding_top', $pageID) ? 'padding-top: ' . strval(get_sub_field('padding_top', $pageID)) . 'px; ' : null;
  $margin_padding_styles .= get_sub_field('padding_bottom', $pageID) ? 'padding-bottom: ' . strval(get_sub_field('padding_bottom', $pageID)) . 'px;' : null;
  $margin_padding_styles .= '"';

  echo $margin_padding_styles;
}


/**
 *
 * Creates CSS selector based on ACF true/false field and 
 *
 * @param   boolean  $field 1 or 0 (ACF true/false field)
 * @param   string   $selector a selector to add modifier without color modifier
 * @param   string   $modifier ('white' or 'black' for color)
 * @return  string   Selector with attached color modifier
 *
 */

function get_modifier_version($field, $selector, $modifier){
  $final_modifier = isset($modifier) ? $modifier : NULL;
  
  if ($field){
    return $selector . '--' . $final_modifier;
  }
}

/**
 *
 * generates content in sections/flexible/heading_columns.php
 *
 * @param   string  $side_string  'left' or 'right'
 * @param   string  $image_or_text  'obraz' or 'tekst'
 * @return  string  <img> OR .heading-columns__lead and .heading-columns__text
 *
 */

function display_column_content($side_string, $image_or_text){
    global $post;
    if (isset($side_string) && $image_or_text !== 'wybierz'){
      if ($image_or_text === 'obraz'){
        $image_field_name = 'image_' . $side_string;
        $image_ID = get_sub_field($image_field_name, $post->ID);
      
        echo wp_get_attachment_image($image_ID, 'image-758', NULL, array('class' => "columns-image-text__image",));

      }
      if ($image_or_text === 'tekst'){
        $lead_field_name = 'lead_' . $side_string;
        $text_field_name = 'text_' . $side_string;
        echo '<div class="columns-image-text__text">' . apply_filters('the_content', get_sub_field($text_field_name, $post->ID)) . '</div>';
      }
    }
  }