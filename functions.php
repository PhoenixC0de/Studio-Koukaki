<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

// Get customizer options form parent theme
if (get_stylesheet() !== get_template()) {
  add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ($value, $old_value) {
    update_option('theme_mods_' . get_template(), $value);
    return $old_value; // prevent update to child theme mods
  }, 10, 2);
  add_filter('pre_option_theme_mods_' . get_stylesheet(), function ($default) {
    return get_option('theme_mods_' . get_template(), $default);
  });
}
function theme_scripts()
{
  wp_enqueue_script(
    'animations',
    get_stylesheet_directory_uri() . '/js/scriptcustom.js',
    array(),
    null,
    true // charge le script dans le footer
  );
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function theme_enqueue_swiper()
{

  // CSS Swiper
  wp_enqueue_style(
    'swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
  );

  // JS Swiper
  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    array(),
    null,
    true
  );

  // Ton script d'initialisation
  wp_enqueue_script(
    'swiper-init',
    get_stylesheet_directory_uri() . '/js/swiper-init.js',
    array('swiper-js'),
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_swiper');
