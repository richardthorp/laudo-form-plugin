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

  // Gravity forms
  include_once($plugin_root . '/functions/gravity_forms.php');


});
