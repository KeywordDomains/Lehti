<?php

  get_header();

  if (have_posts()): ?>

	<div id="main" role="main">
		<section id="content">
			<h1 class="beta title">Search results for "<?php the_search_query(); ?>"</h1>
			<div class="parent">	
				<?php get_template_part('loop', 'main'); ?>
			</div>

			<div id="pagination">
					<?php 

					global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'type' => 'list'
) );
 ?>
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