<?php
/*
Plugin Name: LAUDO Assignment
Plugin URI: https://lau.do/
Description: LAUDO
Author: Rich Thorp
Version: 1.0.0
Requires Plugins: advanced-custom-fields-pro, gravityforms
Author URI: https://richthorp-webdev.co.uk
*/


add_action('init', function () {
  $plugin_root = plugin_dir_path(__FILE__);

  // Add filter to Gravity forms plugin
  include_once($plugin_root . 'functions/gravity_forms.php');

  // Register the custom block
  register_block_type($plugin_root . 'block-files');

  // Add the custom fields
  include_once($plugin_root . 'block-files/acf-fields.php');
});
