<?php

/**
 * LAUDO form selector fields
 * 
 */

$block_fields = array(
  'key' => 'group_laudo_form_block',
  'title' => 'LAUDO form',
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/laudo-form',
			),
		),
	),
  'fields' => array(
    array(
      'key' => 'field_laudo_form_sidebar_heading',
      'label' => 'Sidebar heading',
      'name' => 'sidebar_heading',
      'type' => 'text',
      'wrapper' => array(
        'width' => '75'
      )
    ),
    array(
      'key' => 'field_laudo_form_sidebar_heading_level',
      'label' => 'Heading level',
      'name' => 'sidebar_heading_level',
      'type' => 'select',
      'choices' => array(
        'h1' => 'H1',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6',
      ),
      'default_value' => 'h2',
      'wrapper' => array(
        'width' => '25'
      )
    ),
    array(
      'key' => 'field_laudo_form_sidebar_desc',
      'label' => 'Sidebar description',
      'name' => 'sidebar_description',
      'type' => 'textarea',
      'new_lines' => 'br'
    ),
    array(
      'key' => 'field_laudo_form_form_heading',
      'label' => 'Form heading',
      'name' => 'form_heading',
      'type' => 'text'
    ),
  )
);

// Get a list of available Gravity Forms to add to an ACF select field:

// Ensure Gravity Forms is installed and active
if (class_exists('GFAPI')) {
  $forms = GFAPI::get_forms();
  // If there are active forms, add a select field to the block's fields.
  // For each form, add to the $choices array the form ID as the array key and
  // the form title as labels. It is the array key which is returned by ACF
  $choices = array();
    foreach($forms as $form) {
      $choices[$form['id']] = $form['title'];
    }

  if (is_array($forms) && !empty($forms)) {
    $block_fields['fields'] []= array(
      'key' => 'field_laudo_form_form_selection',
      'label' => 'Form selection',
      'name' => 'form_selection',
      'type' => 'select',
      'choices' => $choices
    );


  } else {
    // If there aren't any active Gravity Forms, replace the fields with an error message
    $block_fields['fields'] =  array(
      'key' => 'field_laudo_form_gravity_forms_no_forms',
      'label' => '',
      'name' => 'no_forms',
      'type' => 'message',
      'message' => 'Please add at lease one Gravity form to use this block'
    );
    // return []; // Return an empty array if no forms are found.
  }
} else {
  // If the Gravity Forms plugin is not active, replace the fields with an error message
  $block_fields['fields'] =  array(
    'key' => 'field_laudo_form_gravity_forms_inactive',
    'label' => '',
    'name' => 'gravity_forms_inactive',
    'type' => 'message',
    'message' => 'Please install and activate the Gravity Forms plugin to use this block'
  );
}

if (function_exists('acf_add_local_field_group')) {
  acf_add_local_field_group($block_fields);
}
