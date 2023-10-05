<?php

/**
 * BasicTheme functions and definitions
 */

if (!function_exists('custom_setup')) {
  /**
   * Sets up theme defaults and registers support for various
   * WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme
   * hook, which runs before the init hook. The init hook is too late
   * for some features, such as indicating support post thumbnails.
   */
  function custom_setup()
  {
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     * If you're building a theme based on Crafty Press, use a find and replace
     * to change 'basictheme'to the name of your theme in all template files.
     */
    load_theme_textdomain('basictheme', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to <head>.
    add_theme_support('automatic-feed-links');

    /**
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /**
     * Enable support for Post Thumbnails on posts and pages.
     * 
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('custom_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    )));

    /**
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo.
    add_theme_support('custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ));

    // Add support for custom page header.
    add_theme_support('custom-header', array(
      'width'         => 1600,
      'height'        => 450,
      'flex-width'    => true,
      'flex-height'   => true,
      'default-image' => '',
    ));

    // Add post type support
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

    // Add support for custom navigation menus.
    register_nav_menus(array(
      'primary'   => esc_html__('Primary', 'basictheme'),
      'footer'    => esc_html__('Footer', 'basictheme'),
    ));
  }
}
add_action('after_setup_theme', 'custom_setup');

/**
 * Set the content width the pixels, based on the theme's design and stylesheet.
 * 
 * Priority 0 to make it available to lower priority callbacks.
 * 
 * @global int $content_width
 */
function custom_content_width()
{
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('custom_content_width', 1170);
}
add_action('after_setup_theme', 'custom_content_width', 0);

/**
 * Register Sidebar widgrt area.
 * 
 * @since 1.0.0
 */
function custom_sidebar_widgets_init()
{
  // Default Sidebar
  register_sidebar(array(
    'name'          => esc_html__('Sidebar', 'basictheme'),
    'id'            => 'default-sidebar',
    'description'   => esc_html__('Add widget here.', 'basictheme'),
    'before_widget' => '<section id="%1$s" class="widget $2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ));
}
add_action('widgets_init', 'custom_sidebar_widgets_init');

/**
 * Enqueue public scripts and styles
 */
function custom_public_scripts()
{
  // Styles
  wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css', [], wp_rand(), 'all');
  wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], wp_rand(), 'all');

  // Scripts
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], wp_rand(), true);
}
add_action('wp_enqueue_scripts', 'custom_public_scripts');

/**
 * Enqueue admin scripts and styles
 */
function custom_admin_scripts()
{
}
add_action('admin_enqueue_scripts', 'custom_admin_scripts');
