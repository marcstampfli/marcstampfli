<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once $understrap_inc_dir . $file;
}

// Add current year
function currentYear( $atts ){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );

// Get my current age
function currentAge( $atts ){
    return do_shortcode("[year]") - 1990;
}
add_shortcode( 'age', 'currentAge' );

// Removes unnecessary words from any standard title
function prefix_category_title($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	} elseif ( is_tax() ) { //for custom post types
		$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}
add_filter('get_the_archive_title', 'prefix_category_title');

// Replace excerpt with post summary...
function the_post_summary($length = 128, $string = "") {
	if ($string) {
		$content = $string;
	} else {
		$content = wp_strip_all_tags(get_the_content());
	}
	if (strlen($content) > $length) {
		$content = substr($content,0,$length) . '...';
	}
	echo $content;
}

// Add copyright text
function copyrightText() {
	echo '<i class="fa fa-copyright"></i> ' .get_bloginfo("name"). ' ' .do_shortcode("[year]");
}
add_shortcode( 'copyrightText', 'copyrightText' );

// Set Featured Image column on custom and blog posts
function add_img_column($columns) {
	$columns = array_slice($columns, 0, 1, true) + array("img" => "Featured Image") + array_slice($columns, 1, count($columns) - 1, true);
	return $columns;
}

function manage_img_column($column_name, $post_id) {
	if( $column_name == 'img' ) {
	echo get_the_post_thumbnail($post_id, 'thumbnail');
	echo '<style> .column-img { width: 175px; }</style>';
	}
	return $column_name;
}

// add_filter('manage_post_posts_columns', 'add_img_column');
// add_filter('manage_post_posts_custom_column', 'manage_img_column', 10, 2);
// add_filter('manage_project_posts_columns', 'add_img_column');
// add_filter('manage_project_posts_custom_column', 'manage_img_column', 10, 2);

// if( function_exists('acf_add_options_page') ) {

// 	acf_add_options_page();

// }

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Add active class to current custom post type
function custom_active_item_classes($classes = array(), $menu_item = false){            
	global $post;
	$classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item active' : '';
	return $classes;
}
add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 2 );

// Hides CF7 form after submit, displays message
add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
/* <![CDATA[ */
document.addEventListener( 'wpcf7mailsent', function( event ) {
  jQuery(".wpcf7-form.sent").find('p').hide();
}, false );
/* ]]> */
</script>
<?php
}