<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();
?>


<div id="main" role="main">
	<section id="content" class="post hentry">
	 	<div class="page-inner">	
			<h1 class="page-title beta"><?php _e('Nothing found here', 'boloday'); ?> <small>Error 404</small></h1>
			 <div class="post">
			 	<p><?php _e('The page you\'ve requested <strong>can not be displayed</strong>. It appears you\'ve missed your intended destination, either trough a bad or outdated link, or a typo in the page you were hoping to reach.', 'boloday'); ?></p>
			 </div>
		</div>
		
	</section>
	<aside id="sidebar">
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php

  get_footer();

?>