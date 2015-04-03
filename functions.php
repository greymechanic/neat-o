<?php
// Enable thumbnails
add_theme_support( 'post-thumbnails');

add_filter('acf/settings/show_admin', '__return_false');

// HTML5 Searchform
add_theme_support( 'html5', array( 'search-form' ) );

// SVG Upload Support

function custom_upload_mimes($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'custom_upload_mimes');


// Put post thumbnails into rss feed
function wpfme_feed_post_thumbnail($content) {
  global $post;
  if(has_post_thumbnail($post->ID)) {
    $content = '' . $content;
  }
  return $content;
}
add_filter('the_excerpt_rss', 'wpfme_feed_post_thumbnail');
add_filter('the_content_feed', 'wpfme_feed_post_thumbnail');

// Excerpt length
// function custom_excerpt_length( $length ) {
//   return 20;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//
// function new_excerpt_more( $more ) {
//   return '...';
// }
// add_filter('excerpt_more', 'new_excerpt_more');

// Add custom menus
// register_nav_menus( array(
//   'header-menu' => __( 'Header Menu' )
// ) );

// function wpfme_has_sidebar($classes) {
//     if (is_active_sidebar('sidebar')) {
//         // add 'class-name' to the $classes array
//         $classes[] = 'has_sidebar';
//     }
//     // return the $classes array
//     return $classes;
// }
// add_filter('body_class','has_sidebar');


// Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling
function wpfme_remove_img_ptags($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'wpfme_remove_img_ptags');

// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);

// Custom Post Types

// Custom Post Type 1 - People
add_action( 'init', 'custom_init' );
function people_init() {
    $args = array(
      'public' => true,
      'label'  => 'Custom'
    );
    register_post_type( 'Custom',
    array(
        'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
        'labels' => array(
            'name' => __( 'Custom' ),
            'singular_name' => __( 'Custom' )
        ),
        'taxonomies' => array('post_tag'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'custom'),
    )
  );
}

// Custom Post Type 2 - Event
add_action( 'init', 'events_init' );
function events_init() {
    $args = array(
      'public' => true,
      'label'  => 'Events'
    );
    register_post_type( 'Events',
    array(
        'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
        'labels' => array(
            'name' => __( 'Events' ),
            'singular_name' => __( 'Event' )
        ),
        'taxonomies' => array('post_tag'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'event'),
    )
  );
}

// Custom Post Type 3 - Music
add_action( 'init', 'music_init' );
function music_init() {
    $args = array(
      'public' => true,
      'label'  => 'Music'
    );
    register_post_type( 'Music',
    array(
        'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
        'labels' => array(
            'name' => __( 'Music' ),
            'singular_name' => __( 'Music' )
        ),
        'taxonomies' => array('post_tag'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'Music'),
    )
  );
}

// Add Page Slug to Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

function custom_fix_blog_tab_on_cpt($classes,$item,$args) {
    if(!is_singular('post') && !is_category() && !is_tag()) {
        $blog_page_id = intval(get_option('page_for_posts'));
        if($blog_page_id != 0) {
            if($item->object_id == $blog_page_id) {
        unset($classes[array_search('current_page_parent',$classes)]);
      }
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class','custom_fix_blog_tab_on_cpt',10,3);

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    tr.term-description-wrap{
      display: none;
    }
  </style>';
}

?>
