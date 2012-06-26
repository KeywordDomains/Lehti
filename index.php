<?php

  get_header();

  if (have_posts()): ?>

  					<?php
		$boloday = get_option('boloday');
	?>

	<?php
		get_template_part('feature', 'multiple');
	?>

	<div id="main" role="main">
		<section id="content" class="hfeed">
			<div class="parent">
				<?php get_template_part('loop', 'main'); ?>
			</div>

			<div id="pagination">
					<?php echo paginate_links( array(
	'base' => '%_%' ,
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'type' => 'list'
) ); ?>
				</div>

		</section>
		<aside id="sidebar">
			<?php get_sidebar(); ?>
		</aside>
	</div>

<?php else: ?>

  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php

  endif;
  ?>

  <?php
  get_footer();
?>