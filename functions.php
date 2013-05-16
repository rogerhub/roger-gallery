<?php

add_action('after_setup_theme', function() {
  add_theme_support('post-thumbnails');
  add_image_size('rg-main', 1024, 1024, false);
  add_image_size('rg-large', 1600, 1600, false);
});

add_action('wp_enqueue_scripts', function() {
  $template = get_template_directory_uri();
  wp_enqueue_style('rg-genericons', "$template/stylesheets/genericons.css");
  wp_enqueue_style('rg-noramlize', "$template/stylesheets/normalize.css");
  wp_enqueue_style('rg-style', "$template/stylesheets/app.css");
  wp_enqueue_script('rg-modernizr', "$template/javascripts/vendor/custom.modernizr.js");
  wp_enqueue_script('rg-jquery', "$template/javascripts/vendor/jquery.js");
  wp_enqueue_script('rg-foundation', "$template/javascripts/foundation/foundation.js", array('rg-jquery'));
  wp_enqueue_script('rg-zoom', "$template/javascripts/vendor/jquery.zoom.js", array('rg-jquery'));
  wp_enqueue_script('rg-script', "$template/javascripts/app.js", array('rg-zoom', 'rg-jquery'));
});
