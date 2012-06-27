<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php if(is_home()) bloginfo('name'); else wp_title('') ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php
		$boloday = get_option('boloday');
	?>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/css/<?php echo $boloday[2]; ?>.css">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php
    wp_get_archives('type=monthly&format=link');
    wp_head();
  ?>

	<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
</head>
<body <?php body_class(); ?>>
	<!--[if lt IE 8]><div class="chromeframe"><?php _e('Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.', 'boloday'); ?></div><![endif]-->
	<header id="mastHead">
		<div class="inner">
			<a href="<?php echo home_url(); ?>">
				<div id="branding">
					<img src="<?php
						if($boloday[1] !== "") {
							echo $boloday[1];
						} else {
							echo get_bloginfo('template_directory').'/img/logo.png';
						}
					?>" id="logo" alt="<?php bloginfo('name'); bloginfo('description'); ?>">
				</div>
			</a>
			<a id="showMobileNav">
				
			</a>
			<nav id="primaryNav">
				 <?php $menuClass = 'nav';
				$menuID = 'primary-navigation';
				$primaryNav = '';
				if (function_exists('wp_nav_menu')) {
					$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-nav', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) );
				};
				if ($primaryNav == '') { ?>
					<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
						<?php wp_list_pages('title_li='); ?>
					</ul>
				<?php }	else echo($primaryNav); ?>
			</nav>
		</div>
		<nav id="secondaryNav">
			<div class="inner">
			<?php $menuClass = 'nav';
			$menuID = 'secondary-navigation';
			$secondaryNav = '';
			if (function_exists('wp_nav_menu')) {
				$secondaryNav = wp_nav_menu( array( 'theme_location' => 'secondary-nav', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) );
			};
			if ($secondaryNav == '') { ?>
				<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
					<?php wp_list_categories('title_li='); ?>
				</ul>
			<?php }	else echo($secondaryNav); ?>
			</div>
		</nav>
	</header>