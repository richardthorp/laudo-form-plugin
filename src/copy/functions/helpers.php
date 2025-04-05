<?php

/**
 * Add any helper functions to be accessed anywhere in plugin code
 */


/**
 * Get a string containing the ID and class attributes for a Guttenberg block
 *
 * @param object $block The Gutenberg block passed into a block template file
 * @param array | string $classes Array or string of classes to add to the block
 * 
 * @return string The ID and class attributes for the block
 * @author Rich Thorp
 *
 */
function laudo_get_block_attrs($block, $classes)
{
  $args = array();
  // Add the block anchor
  if (isset($block['anchor'])) {
    $args['id'] = $block['anchor'];
  }
  // Add any classes
  if ($classes) {
    if (is_array($classes)) {
      $args['class'] = esc_attr(implode(' ', $classes));
    } else if (is_string($classes)) {
      $args['class'] = $classes;
    }
  }
  return wp_kses_data(get_block_wrapper_attributes($args));
}
