<?php

// Désactiver les styles qui écrasent ton CSS enfant
add_action('wp_enqueue_scripts', function () {
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('global-styles');
  wp_dequeue_style('classic-theme-styles');
}, 5);


// Charger tous les styles et scripts du thème
function theme_enqueue_assets()
{
  // Style du parent
  wp_enqueue_style(
    'parent-style',
    get_template_directory_uri() . '/style.css'
  );

  // Style du thème enfant (compilé par ton SCSS)
  wp_enqueue_style(
    'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('parent-style'),
    filemtime(get_stylesheet_directory() . '/style.css')
  );

  // Script custom
  wp_enqueue_script(
    'animations',
    get_stylesheet_directory_uri() . '/js/scriptcustom.js',
    array(),
    null,
    true
  );

  // Swiper CSS
  wp_enqueue_style(
    'swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
  );

  // Swiper JS
  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    array(),
    null,
    true
  );

  // Script d'initialisation Swiper
  wp_enqueue_script(
    'swiper-init',
    get_stylesheet_directory_uri() . '/js/swiper-init.js',
    array('swiper-js'),
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');


// Synchroniser les options du customizer avec le parent
if (get_stylesheet() !== get_template()) {

  add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ($value, $old_value) {
    update_option('theme_mods_' . get_template(), $value);
    return $old_value;
  }, 10, 2);

  add_filter('pre_option_theme_mods_' . get_stylesheet(), function ($default) {
    return get_option('theme_mods_' . get_template(), $default);
  });
}
