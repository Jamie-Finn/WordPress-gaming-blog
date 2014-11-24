<?php
/**
 * Hey
 * Only edit this file if you know what you're doing or make a backup before editing it
 * Happy Blogging
*/

include (TEMPLATEPATH . '/assets/lib/customize.php');

function thefunk_setup_theme_function()
{
    
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 656;
    }

    // Makes theme available for translation.
	load_theme_textdomain( 'the-funk', get_template_directory() . '/languages');

    // Adding pagination support. Removing this will also remove the number page navigation from the homepage.
    add_theme_support('loop-pagination');

    // Add automatic feed links support. http://codex.wordpress.org/Automatic_Feed_Links
    add_theme_support('automatic-feed-links');

    // Add post thumbnails support. http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');

    // Add custom background support. http://codex.wordpress.org/Custom_Backgrounds
    add_theme_support('custom-background', array(
    	// Default color
    	'default-color' => 'f5f5f5',
    	// Default image
    	'default-image' => get_stylesheet_directory_uri() . '/assets/images/body.png',
    ));

    // Add custom header support. http://codex.wordpress.org/Custom_Headers
    add_theme_support('custom-header', array(
    	// Flex height
    	'flex-height' => true,
    	// Recommended height
    	'height' => 194,
    	// Flex width
    	'flex-width' => false,
    	// Recommended width
    	'width' => 1349,
    	// Header text
    	'header-text' => false,
    ));
}

add_action( 'after_setup_theme', 'thefunk_setup_theme_function' );

/**
 * Proper way to enqueue scripts and styles to theme header
 */

function thefunk_scripts()
{
	wp_enqueue_style('thefunk_stylesheet', get_stylesheet_uri());
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}

add_action('wp_enqueue_scripts', 'thefunk_scripts');

// add ie conditional html5 shim to header
function thefunk_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'thefunk_ie_html5_shim');

function thefunk_wp_title($title, $sep)
{
	if (is_feed()) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name

	$title.= get_bloginfo('name', 'display');

	// Add the blog description for the home/front page.

	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		$title.= " $sep $site_description";
	}

	// Add a page number if necessary:

	if (($paged >= 2 || $page >= 2) && !is_404()) {
		$title.= " $sep " . sprintf(__('Page %s', 'the-funk') , max($paged, $page));
	}

	return $title;
}

add_filter('wp_title', 'thefunk_wp_title', 10, 2);

// Register Navigation Menus

register_nav_menus(array(
	'nav-header' => __('Header Navigation', 'the-funk'),
	'nav-primary' => __('Primary Navigation', 'the-funk')
));
/*-----------------------------------------------------------------------------------*/
/*    Widgets Register
/*-----------------------------------------------------------------------------------*/

function thefunk_sidebars() {
	register_sidebar(array(
		'name' => __('Sidebar', 'the-funk'),
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="row widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'description' => __('The widgets which will appear on the main sidebar.', 'the-funk'),
	));
	register_sidebar(array(
		'name' => __('Footer One', 'the-funk'),
		'id' => 'footer-one',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'description' => __('The widgets which will appear in the first column of the footer.', 'the-funk'),
	));
	register_sidebar(array(
		'name' => __('Footer Two', 'the-funk'),
		'id' => 'footer-two',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'description' => __('The widgets which will appear in the second column of the footer.', 'the-funk'),
	));
	register_sidebar(array(
		'name' => __('Footer Three', 'the-funk'),
		'id' => 'footer-three',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'description' => __('The widgets which will appear in the third column of the footer.', 'the-funk'),
	));
}

add_action( 'widgets_init', 'thefunk_sidebars' );

/*
*    Configure Custom Homepage Excerpt Length
*/

/**
 * Sets the post excerpt length to 30 words.
 */
function thefunk_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'thefunk_excerpt_length' );

/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */

function thefunk_new_setup($args)
{
	// see wp-includes/nav-menu-template.php for available arguments

	extract($args);
	$link = $link_before . '<a href="' . esc_url( home_url( '/' ) ) . '">' . $before . __( 'Home', 'the-funk' ) . $after . '</a>' . $link_after;

	// We have a list

	if (FALSE !== stripos($items_wrap, '<ul') or FALSE !== stripos($items_wrap, '<ol')) {
		$link = "<li class='menu-item'>$link</li>";
	}

	$output = sprintf($items_wrap, $menu_id, $menu_class, $link);
	if (!empty($container)) {
		$output = '<' . esc_attr( $container) . ' class="' . esc_attr( $container_class ) . '" id="' . esc_attr( $container_id ) . '">' . esc_textarea( $output ) . '</' . esc_attr( $container ) . '>';
	}

	if ($echo) {
		echo $output;
	}

	return $output;
}

function thefunk_post_has($type, $post_id)
{
	$comments = get_comments('status=approve&type=' . $type . '&post_id=' . $post_id);
	$comments = separate_comments($comments);
	return 0 < count($comments[$type]);
}

function thefunk_authorbox()
{
    echo '<section class="author-box">' . "\n";
    global $post;
    echo get_avatar($post->post_author, 70);
    echo '<h4 class="author-box-title">' . __( 'About', 'the-funk' ) . '<span>' . "\n";
    the_author_meta('display_name');
    echo '</span></h4>' . "\n";
    echo '<div class="author-box-content">' . "\n";
    global $user_ID;
    if (get_the_author_meta('description', $user_ID)) {
        echo '<p>';
        the_author_meta('description');
        echo '</p>' . "\n";
    } else {
        echo '<p>' . __( 'See all the posts by ', 'the-funk' ) .  get_the_author_meta('display_name') . ' <a href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . __( 'at this link', 'the-funk' ) . '</a>.</p>' . "\n";
    }
    echo '</div>' . "\n";
    echo '</section>' . "\n";
}

function thefunk_customizer_header()
{
	$thememod				  = get_theme_mod('thefunk_theme_options');
	$themeopt				  = get_option('thefunk_theme_options');
    $header_color             = $themeopt['header_color'];
    $site_title_color         = $themeopt['site_title_color'];
    $site_title_color_hover   = $themeopt['site_title_color_hover'];
    $site_description_color   = $themeopt['site_description_color'];
    $primary_site_color       = $themeopt['primary_site_color'];
    $primary_color_hover      = $themeopt['primary_color_hover'];
    $post_meta_color          = $themeopt['post_meta_color'];
    $headnav_color            = $themeopt['headnav_color'];
    $headnav_color_hover      = $themeopt['headnav_color_hover'];
    $primarynav_color         = $themeopt['primarynav_color'];
    $primarynav_color_hover   = $themeopt['primarynav_color_hover'];
    $primarynav_color_active  = $themeopt['primarynav_color_active'];
    $footer_background        = $themeopt['footer_background'];
    $footer_color             = $themeopt['footer_color'];
    $footer_title             = $themeopt['footer_title'];
    $footer_link              = $themeopt['footer_link'];
    $footer_link_hover        = $themeopt['footer_link_hover'];
 	$homepage_sidebar		  = $thememod['homepage_sidebar'];
    $posts_sidebar            = $thememod['posts_sidebar'];
    $pages_sidebar            = $thememod['pages_sidebar'];
    $custom_css_section       = $thememod['custom_css_section'];

?>

<style>
.site-header {
    background-color: <?php echo $header_color; ?> !important;
}

.site-title a {
    color: <?php echo $site_title_color; ?> !important;
}

.site-title a:hover {
    color: <?php echo $site_title_color_hover; ?> !important;
}

.site-description {
    color: <?php echo $site_description_color; ?> !important;
}

.nav-primary,
.ribbon-color .banner::before,
.no-css-transforms .ribbon-color .text,
.ribbon-color .text::before,
.ribbon-color .text::after,
.meta-category a,
.postwrap.postwrapBlog .item .post_date,
.postwrap .item .read_more,
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.button,
.pagination a {
    background-color: <?php echo $primary_site_color; ?> !important;
}

h2.entry-title,
a {
    color: <?php echo $primary_site_color; ?> !important;
}

h2.entry-title:hover,
a:hover {
    color: <?php echo $primary_color_hover; ?> !important;
}

.postwrap .item .read_more:hover,
button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.button:hover,
.pagination span,
.pagination a:hover {
    background-color: <?php echo $primary_color_hover; ?> !important;
}

.meta-category a,
.postwrap.postwrapBlog .item .post_date,
postwrap .item .read_more,
.pagination span,
.pagination a,
.postwrap .item .read_more,
.ribbon .text {
    color: <?php echo $post_meta_color; ?> !important;
}

.thefunk-nav-menu > .menu-item > a {
    color: <?php echo $primarynav_color; ?> !important;
}

.thefunk-nav-menu > .menu-item > a:hover {
    color: <?php echo $primarynav_color_hover; ?> !important;
}

.thefunk-nav-menu .current-menu-item > a {
    color: <?php echo $primarynav_color_active; ?> !important;
}

.thefunk-head-nav > .menu-item > a {
    color: <?php echo $headnav_color; ?> !important;
}

.thefunk-head-nav > .menu-item > a:hover {
    color: <?php echo $headnav_color_hover; ?> !important;
}

.footer-widgets,
.footer-widgets {
    background-color: <?php echo $footer_background; ?> !important;
    color: <?php echo $footer_color; ?> !important;
}

.footer-widgets a {
    color: <?php echo $footer_link; ?> !important;
}

.footer-widgets a:hover {
    color: <?php echo $footer_link_hover; ?> !important;
}

.footer-widgets h3,
.footer-widgets h2 {
    color: <?php echo $footer_title; ?> !important;
}
    
<?php if (is_home()) { ?>
<?php if ($homepage_sidebar == 1) { ?>
.sidebar-primary { float: left !important;}
.content { float: right !important;}
<?php } ?>
        
<?php if ($homepage_sidebar == 2) { ?>
.sidebar-primary { float: right !important;}
.content { float: left !important;}
<?php } ?>
        
<?php if ($homepage_sidebar == 3) { ?>
.content, .postwrap .item { width: 97.5% !important;}
@media only screen and (max-width: 1139px) {
	.content, .postwrap .item { width: 98% !important;}
}
<?php }?>
<?php } elseif (is_single()) { ?>
<?php if ($posts_sidebar == 1) { ?>
.sidebar-primary { float: left !important;}
.content { float: right !important;}
<?php } ?>
        
<?php if ($posts_sidebar == 2) { ?>
.sidebar-primary { float: right !important;}
.content { float: left !important;}
<?php } ?>

<?php if ($posts_sidebar == 3) { ?>
.content, .postwrap .item { width: 100% !important;}
<?php } ?>
<?php } elseif (is_page()) { ?>
<?php if (is_page_template('page-full.php')) { ?>
.content, .postwrap .item { width: 100% !important;}
<?php } else { ?>
<?php if ($pages_sidebar == 1) { ?>
.sidebar-primary { float: left !important;}
.content { float: right !important;}
<?php } ?>

<?php if ($pages_sidebar == 2) { ?>
.sidebar-primary { float: right !important;}
.content { float: left !important;}
<?php } ?>

<?php if ($pages_sidebar == 3) { ?>
.content, .postwrap .item { width: 100% !important;}
<?php } ?>
<?php } ?>
<?php } elseif (is_archive() || is_search() || is_day() || is_month() || is_year() || is_time()) { ?>
<?php if ($homepage_sidebar == 1) { ?>
.sidebar-primary { float: left !important;}
.content { float: right !important;}
<?php } ?>

<?php if ($homepage_sidebar == 2) { ?>
.sidebar-primary { float: right !important;}
.content { float: left !important;}
<?php } ?>

<?php if ($homepage_sidebar == 3) { ?>
.content, .postwrap .item { width: 97.5% !important;}
@media only screen and (max-width: 1139px) {
.content, .postwrap .item { width: 98% !important;}
}
<?php } ?>
<?php } ?>

<?php
if(!empty($custom_css_section)) {
echo $custom_css_section;
}
?>
</style>
<?php
}

add_action('wp_head', 'thefunk_customizer_header');

function thefunk_sidebar()
{
	$thememod = get_theme_mod('thefunk_theme_options');
    if (is_home()) {
		$thememod = get_theme_mod('thefunk_theme_options');
        $homepage_sidebar = $thememod['homepage_sidebar'];
        if ($homepage_sidebar == 3) {
        } else {
            get_sidebar();
        }
    } elseif (is_single()) {
        $posts_sidebar = $thememod['posts_sidebar'];
        if ($posts_sidebar == 3) {
        } else {
            get_sidebar();
        }
    } elseif (is_page()) {
        $pages_sidebar = $thememod['pages_sidebar'];
        if ($pages_sidebar == 3) {
        } else {
            get_sidebar();
        }
    } elseif (is_archive() || is_search() || is_day() || is_month() || is_year() || is_time()) {
        $homepage_sidebar = $thememod['homepage_sidebar'];
        if ($homepage_sidebar == 3) {
        } else {
            get_sidebar();
        }
    }
}

function thefunk_footer_credits()
{
	$thememod = get_theme_mod('thefunk_theme_options');
    $footer_credits = $thememod['footer_credits_section'];
    if(!empty($footer_credits)) {
        echo '<p>'.$footer_credits.'</p>';
    } else {
    	echo '<p>' . __( 'Copyright', 'the-funk' ) . ' &#x000A9;&nbsp;'.date("Y").' ~ <a href="'.esc_url( home_url( '/' ) ).'" title="'.get_bloginfo( 'name' ).'"> '.get_bloginfo( 'name' ).'</a> ~ <a rel="nofollow" href="http://www.hardeepasrani.com/portfolio/wordpress-themes/the-funk/">' . __( 'The Funk', 'the-funk' ) . '</a>';
        echo '<br/>';
        echo '' . __( 'Proudly powered by WordPress', 'the-funk' ) . '</p>';
    }
}
?>