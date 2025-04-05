<?php

/**
 * LAUDO form block markup
 * 
 */

$form_id = get_field('form_selection');

// If there isn't a form selected, show an error message in the admin
if (!$form_id) {
  if (is_admin()) { ?>
    <section style="text-align: center; background-color: #000; padding: 3rem 2rem;">
      <h2 style="color:#FFF">LAUDO form block</h2>
      <p style="color:#FFF">No form selected</p>
    </section>
<?php
  }
  // On the front end and in the admin, exit the file
  return;
}

$sidebar_heading = get_field('sidebar_heading');
$sidebar_heading_level = get_field('sidebar_heading_level');
$sidebar_description = get_field('sidebar_description');
$form_heading = get_field('form_heading');

?>
<section class="block laudo-form-block">
  <div class="container">
    <div class="sidebar">
      <?php
      if ($sidebar_heading) {
        echo "<{$sidebar_heading_level} class='sidebar-heading'>";
        echo $sidebar_heading;
        echo "</{$sidebar_heading_level}>";
      }
  
      echo $sidebar_description ? '<p class="sidebar-description">' . $sidebar_description . '</p>' : '';
      ?>
    </div>
    <div class="form-content">
      <?= $form_heading ? '<p class="form-heading">' . $form_heading . '</p>' : ''; ?>
      <?php
      // Output the selected form
      // See https://docs.gravityforms.com/adding-a-form-to-the-theme-file/#h-basic-function-call
      gravity_form($form_id, false, false, false, '', true);
      ?>
    </div>
  </div>
</section>