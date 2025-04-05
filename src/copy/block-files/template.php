<?php
/**
 * LAUDO form block markup
 * 
 */

$form = get_field('form_selection');

// No form selected:
if (!$form) {
  // In the admin, show an error message
  if (is_admin()) { ?>
    <section style="text-align: center; background-color: #000; padding: 3rem 2rem;">
      <h2 style="color:#FFF">LAUDO form block</h2>
      <p style="color:#FFF">No form selected</p>
    </section>
<?php
  }
  // Exit the file
  return;
}