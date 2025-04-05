<?php
/**
 * Update functionality and styles of the Gravity Forms plugin
 */

// Ensure the Gravity forms plugin is installed and active
if(!class_exists( 'GFAPI' )) return;

 // Disable output of GravityForms default CSS styles
add_filter('gform_disable_css', '__return_true');

// Replace Gravity Forms submit input with button

add_filter('gform_next_button', 'laudo_input_to_button', 10, 2);
add_filter('gform_previous_button', 'laudo_input_to_button', 10, 2);
add_filter('gform_submit_button', 'laudo_input_to_button', 10, 2);

function laudo_input_to_button($button, $form) {
  $dom = new DOMDocument();
  $dom->loadHTML('<?xml encoding="utf-8" ?>' . $button);
  $input = $dom->getElementsByTagName('input')->item(0);
  $new_button = $dom->createElement('button');
  $new_button->appendChild($dom->createTextNode($input->getAttribute('value')));
  $input->removeAttribute('value');

  foreach($input->attributes as $attribute) {
    $new_button->setAttribute($attribute->name, $attribute->value);
  }

  $input->parentNode->replaceChild($new_button, $input);

  return $dom->saveHtml($new_button);
}

// Disable output of GravityForms default CSS styles
add_filter('gform_disable_css', '__return_true');

// Disabling CSS additionally
add_action('wp_enqueue_scripts', function() {
  wp_deregister_style('gform_basic');
  wp_deregister_style('gform_theme');
  wp_deregister_style('gform_theme_components');
}, 9999);

