<?php

include('inc/shortcodes.php');

include('inc/widgets/twitter.php');
include('inc/widgets/flickr.php');
include('inc/widgets/social.php');
include('inc/widgets/adfull.php');
include('inc/widgets/adsmall.php');

// =====================================================
//	Setup Options
// =====================================================
get_template_part('nhp', 'options');

add_action('after_setup_theme', 'boloday_theme_setup');
function boloday_theme_setup(){
    load_theme_textdomain('boloday', get_template_directory() . '/languages');
}

	// ============================================================
	//	Theme Setup
	// ============================================================
	if(function_exists("register_sidebar")) {
		register_sidebar(array(
			'name'          => "Sidebar",
			'id'            => 'sidebar',
			'description'   => 'Widgets presented in the main sidebar of the theme',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>' ));
		
		register_sidebar(array(
			'name'          => "Footer Widgets",
			'id'            => 'footer-widgets',
			'description'   => 'Widgets shown in the footer area of the theme',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>' ));
	}
	
	if(function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'primary-nav' => 'Primary Navigation',
				'secondary-nav' => 'Secondary Navigation',
			)
		);
	}
	
	if(function_exists('add_theme_support')) {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'homepage_thumbnail', 300, 150, true );
		add_image_size( 'feature_full', 1060, 469, true );
		add_image_size( 'feature_multiple', 650, 400, true );
		add_image_size( 'single_image', 300, 205, true );
		add_image_size( 'square', 100, 100, true );
	
		add_theme_support( 'automatic-feed-links' );
	}

	if ( ! isset( $content_width ) ) $content_width = 586;
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	
	// ============================================================
	//	Custom functions
	// ============================================================
	if(!function_exists('truncate_post')) {
		function truncate_post($max_char, $more_link_text = '', $stripteaser = 0, $more_file = '') {
		    $content = get_the_content($more_link_text, $stripteaser, $more_file);
		    $content = apply_filters('the_content', $content);
		    $content = str_replace(']]>', ']]&gt;', $content);
		    $content = strip_tags($content);

		   if (isset($_GET['p']) && strlen($_GET['p']) > 0) {
		      echo "";
		      echo $content;
		      echo " ...";
		   }
		   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
		        $content = substr($content, 0, $espacio);
		        $content = $content;
		        echo "";
		        echo $content;
		        echo " ...";
		   }
		   else {
		      echo "";
		      echo $content;
		   }
		}
	}

	function boloday_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		?>
		<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
  	<div class="avatar">
			<?php echo get_avatar( $comment, 72 ); ?>  
		</div>
		<div class="comment">
			<?php comment_text() ?>
			<p class="comment-meta"><cite><?php comment_type(__('Comment', 'boloday'), __('Trackback', 'boloday'), __('Pingback', 'boloday')); ?> <?php _e('by', 'boloday'); ?> <?php comment_author_link() ?> &#8212; <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></cite> <?php edit_comment_link(__("Edit This", 'boloday'), ' |'); ?></p>
		</div>
	</li>
	<?php
	}

?>