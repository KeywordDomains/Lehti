<?php

  get_header();

  if (have_posts()): ?>

	<div id="main" role="main">
		<section id="content">
			<div class="parent">	
				<?php get_template_part('loop', 'main'); ?>
			</div>

			<div id="pagination">
					<?php echo paginate_links( array(
	'base' =>  preg_replace('/\/page\/[^\/]+/', '', $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]). '%_%',
	'format' => 'page/%#%/',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'type' => 'list',
	'prev_text' => __('&laquo; Previous', 'boloday'),
	'next_text' => __('Next &raquo', 'boloday')
) ); ?>
				</div>

			<?php get_template_part('inc/breadcrumbs'); ?>
		</section>
		<aside id="sidebar">
			<?php get_sidebar(); ?>
		</aside>
	</div>

<?php else: ?>
	
	<?php get_template('404', 'search'); ?>
	
<?php

  endif;
  ?>

  <?php
  get_footer();
?>