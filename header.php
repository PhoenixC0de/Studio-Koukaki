<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fleurs_d\'oranger_&_Chats_errants
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class('burger'); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'foce'); ?></a>

    <header id="masthead" class="site-header">
      <nav id="site-navigation" class="main-navigation menu-burger">
        <ul class="menu-ferme">
          <li class="site-title">
            <h1>Fleur d'oranger & chats errants</h1>
          </li>
        </ul>
        <div class="toggle">
          <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
            <span class="line l1"></span>
            <span class="line l2"></span>
            <span class="line l3"></span>
          </button>
        </div>

        <div class="menu-ouvert">
          <div class="menu-content">
            <div class="images-menu">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/cat.png'; ?>" class="menu-img1 float-multi">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/cat2.png'; ?>" class="menu-img2 float-multi">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/cat1.png'; ?>" class="menu-img3 float-multi">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/flower.png'; ?>" class="menu-img4 rotation">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/random_flower.png'; ?>" class="menu-img5 rotation">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/sunflower.png'; ?>" class="menu-img6 rotation">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/orchid.png'; ?>" class="menu-img7 rotation">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/hibiscus_footer.png'; ?>" class="menu-img8 rotation">
            </div>
            <div class="logo-menu">
              <img src="<?php echo get_stylesheet_directory_uri() . '/images/logo.png'; ?> " alt="logo Fleurs d'oranger & chats errants">
            </div>
            <ul class="menu-list">
              <li><a href="#story">Histoire</a></li>
              <li><a href="#characters">Personnages</a></li>
              <li><a href="#place">Lieu</a></li>
              <li><a href="#studio">Studio Koukaki</a></li>
            </ul>
            <div class="footer-burger">
              <ul class="burger-menu-footer-link">
                <li><a href="#colophon">STUDIO KOUKAKI</a></li>
              </ul>
            </div>
          </div>
        </div>

      </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
  </div><!-- #page -->