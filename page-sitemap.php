<?php

  /**
	* Template Name: Sitemap
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();
?>

				<?php
		$boloday = get_option('boloday');
	?>

<div id="main" role="main">
	<section id="content" class="full">
	 	<div class="page-inner">	
			<?php
			  if (have_posts()) : while (have_posts()) : the_post();
			  ?>
			<?php if(has_post_thumbnail()) { ?>
				<div id="feature" class="<?php echo $boloday[3]; ?>">
					<?php the_post_thumbnail('feature_full'); ?>
				</div>
			<?php } ?>
			<h1 class="post-title beta"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			 <div class="post">
			
			<?php the_content(__('(more...)')); ?></div>
			<?php
			endwhile; else: ?>

					<p><?php _e('Sorry, no posts matched your criteria.', 'boloday'); ?></p>

			<?php
			  endif;
			?>

			<div class="sitemap">
				<div class="pages">
					<h2 class="gamma"><?php _e('Pages', 'boloday'); ?></h2>
					<ul>
						<?php wp_list_pages('depth=0&sort_column=menu_order&title_li='); ?>
					</ul>
				</div>
				
				<div class="categories">
					<h2 class="gamma"><?php _e('Categories', 'boloday'); ?></h2>
					<ul>
						<?php wp_list_categories('show_count=true&title_li=')?>
					</ul>
				</div>
				
				<div class="post-per-category">
					<h2 class="gamma"><?php _e('Posts per Category', 'boloday'); ?></h2>
					 <?php

		        $cats = get_categories();

		      foreach ( $cats as $cat ) {

		          query_posts( 'cat=' . $cat->cat_ID );

		    ?>
		            <h4><?php echo $cat->cat_name; ?></h4>

		            <ul>
		                <?php while ( have_posts() ) { the_post(); ?>
		              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php _e( 'Comments', 'boloday' ); ?> (<?php echo $post->comment_count; ?>)</li>
		              <?php }  ?>
		            </ul>

		            <?php } ?>
				</div>
				
			</div>
			<?php get_template_part('inc/breadcrumbs'); ?>
		</div>
		
	</section>
</div>
<?php

  get_footer();

?>