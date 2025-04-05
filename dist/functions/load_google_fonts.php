<?php
/**
 * Enqueue Google Fonts
 */

function laudo_load_google_fonts() {
  echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
  echo '<link href=https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap" rel="stylesheet">';
}

add_action( 'wp_head', 'laudo_load_google_fonts' );
