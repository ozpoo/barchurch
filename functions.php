<?php
/*
 *  Author: Eric Andren | @ericandren
 */

if (!isset($content_width)) {
  $content_width = 900;
}

if (function_exists('add_theme_support')) {

  add_theme_support('menus');
  add_theme_support('automatic-feed-links');

  add_theme_support('post-thumbnails');
  add_image_size('12',   2880, '', true);
  add_image_size('11',   2560, '', true);
  add_image_size('10',   1920, '', true);
  add_image_size('09',   1440, '', true);
  add_image_size('08',   1366, '', true);
  add_image_size('07',   1280, '', true);
  add_image_size('06',   1024, '', true);
  add_image_size('05',   960, '', true);
  add_image_size('04',   800, '', true);
  add_image_size('03',   640, '', true);
  add_image_size('02',   480, '', true);
  add_image_size('01',   10, '', true);

  add_image_size('xx-large', 3200, '', true);
  add_image_size('x-large', 2400, '', true);
  add_image_size('large', 1200, '', true);
  add_image_size('large-square', 1200, 1200, true);
  add_image_size('medium', 600, '', true);
  add_image_size('medium-square', 600, 600, true);
  add_image_size('small', 300, '', true);
  add_image_size('small-square', 300, 300, true);
  add_image_size('x-small', 150, '', true);
  add_image_size('x-small-square', 150, 150, true);
}

function header_scripts () {
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    wp_register_script('fontawesome',
      get_template_directory_uri() . '/assets/font/Font Awesome/svg-with-js/js/fontawesome-all.min.js',
      array('jquery'), '1.0.0');
    wp_enqueue_script('fontawesome');

    wp_register_script('lazysizes',
      get_template_directory_uri() . '/assets/js/_lib/lazysizes/lazysizes.min.js',
      array(), '1.0.0');
    wp_enqueue_script('lazysizes');

    wp_register_script('flickity',
      get_template_directory_uri() . '/node_modules/flickity/dist/flickity.pkgd.min.js',
      array('jquery'), '1.0.0');
    wp_enqueue_script('flickity');

    wp_register_script('script',
      get_template_directory_uri() . '/assets/js/build/script.js?v='.time(),
      array('jquery'), '1.0.0');
    wp_enqueue_script('script');
  }
}
add_action('init', 'header_scripts');

function conditional_scripts () {

  if (is_page('pagenamehere')) {

    wp_register_script('scriptname',
      get_template_directory_uri() . '/assets/js/scriptname.js',
      array('jquery'), '1.0.0');
    wp_enqueue_script('scriptname');
  }
}
add_action('wp_print_scripts', 'conditional_scripts');

function styles () {
  wp_register_style('Fonts',
    get_template_directory_uri() . '/assets/font/Fonts/stylesheet.css?v='.time(),
    array(), '1.0', 'all');
  wp_enqueue_style('Fonts');

  wp_register_style('style',
    get_template_directory_uri() . '/assets/css/build/style.css?v='.time(),
    array(), '1.0', 'all');
  wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'styles');

function pagination () {
  global $wp_query;
  $big = 999999999;
  echo paginate_links(array(
    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages
  ));
}
add_action('init', 'pagination');

function wp_rest_api_alter () {
  register_api_field ( 'selfies', 'fields',
    array (
      'get_callback'    => function($data, $field, $request, $type){
        if (function_exists('get_fields')) {
          return get_fields($data['id']);
        }
        return [];
      },
      'update_callback' => null,
      'schema'          => null,
    )
  );
}
add_action ( 'rest_api_init', 'wp_rest_api_alter');

function my_prefix_add_rest_orderby_params( $params ) {
    $params['orderby']['enum'][] = 'menu_order';
    return $params;
}
add_filter( 'rest_page_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1 );
add_filter( 'rest_post_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1 );

function my_wp_nav_menu_args ($args = '') {
  $args['container'] = false;
  return $args;
}
add_filter ('wp_nav_menu_args', 'my_wp_nav_menu_args');

function my_css_attributes_filter ($var) {
  return is_array($var) ? array() : '';
}

function remove_category_rel_from_category_list ($thelist) {
  return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}
add_filter ('the_category', 'remove_category_rel_from_category_list');

function add_slug_to_body_class ($classes) {
  global $post;
  if (is_home()) {
    $classes[] = "journal";
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}
add_filter ('body_class', 'add_slug_to_body_class');

function index ($length) {
  return 20;
}

function custom_post ($length) {
  return 40;
}

function excerpt ($length_callback = '', $more_callback = '') {
  global $post;
  if (function_exists($length_callback)) {
    filter('excerpt_length', $length_callback);
  }
  if (function_exists($more_callback)) {
    add_filter('excerpt_more', $more_callback);
  }
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

function view_article ($more) {
  global $post;
  return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}
add_filter ('excerpt_more', 'view_article');

function remove_admin_bar () {
  return false;
}
add_filter ('show_admin_bar', 'remove_admin_bar');

function style_remove ($tag) {
  return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}
add_filter ('style_loader_tag', 'style_remove');

function remove_thumbnail_dimensions ( $html ) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
add_filter ('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
add_filter ('image_send_to_editor', 'remove_thumbnail_dimensions', 10);

function fb_unautop_4_img ( $content ) {
  $content = preg_replace (
    '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',
    '<figure>$1</figure>',
    $content
  );
  return $content;
}
add_filter ( 'the_content', 'fb_unautop_4_img', 99 );

function alx_embed_html ( $html ) {
  return '<figure>' . $html . '</figure>';
}
add_filter ( 'embed_oembed_html', 'alx_embed_html', 10, 3 );
add_filter ( 'video_embed_html', 'alx_embed_html' );

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

remove_filter ('the_excerpt', 'wpautop');


// Add keywords to general settings
class new_general_setting {
    function new_general_setting( ) {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }
    function register_fields() {
        register_setting( 'general', 'key_words', 'esc_attr' );
        add_settings_field('key_words', '<label for="key_words">'.__('Key Words' , 'key_words' ).'</label>' , array(&$this, 'fields_html') , 'general' );
    }
    function fields_html() {
        $value = get_option( 'key_words', '' );
        echo '<input class="regular-text ltr" type="text" id="key_words" name="key_words" value="' . $value . '" />';
    }
}
$new_general_setting = new new_general_setting();

add_action( 'admin_footer-options-general.php', function() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready( function($)
    {
        var son = $("label[for='key_words']").parent().parent(); // Our setting field
        var father = $("label[for='home']").parent().parent(); // WordPress setting field
        son.insertAfter(father);
        $('#wpbody .wrap form').show();
    });
    </script>
    <?php
});

add_action( 'admin_head-options-general.php', function() {
    echo '<style>#wpbody .wrap form{display:none}</style>';
});

// class new_general_setting {
//   private $f_id;
//   private $f_name;
//
//   function new_general_setting($array) {
//     $this->f_id = $array[0];
//     $this->f_name = $array[1];
//     add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
//   }
//
//   function register_fields() {
//     register_setting( 'general', $this->f_id, 'esc_attr' );
//     add_settings_field($this->f_id, '<label for="'.$this->f_id.'">'.__($this->f_name , $this->f_id ).'</label>' , array(&$this, 'fields_html') , 'general' );
//   }
//
//   function fields_html() {
//     $value = get_option( $this->f_id, '' );
//     echo '<input class="regular-text" type="text" id="'.$this->f_id.'" name="'.$this->f_id.'" value="' . $value . '" />';
//   }
// }
// $new_general_setting = new new_general_setting( array('facebook_url', 'facebook_icon', 'Endereço do facebook') );

?>
