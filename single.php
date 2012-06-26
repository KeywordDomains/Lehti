<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();
?>

<?php
  if (have_posts()) : while (have_posts()) : the_post();
  
  	$imgdata = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	$largeFeature = ($imgdata[1] > 1100) ? true : false;

  ?>
<?php if(has_post_thumbnail() && $largeFeature) { ?>
	<?php get_template_part('single', 'head'); ?>
<?php } ?>

<?php

?>

<div id="main" role="main" class="hfeed">
	<section id="content" <?php post_class(); ?>>
	 	<div class="post-inner">
	 		<?php if(!has_post_thumbnail() || !$largeFeature) { ?>
				<h1 class="entry-title beta"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php } ?>
			 <div class="entry-content">
			 	<?php if(has_post_thumbnail() && !$largeFeature) {
			 		the_post_thumbnail('single_image', array('class' => 'alignright'));
			 	} ?>
			 	<?php the_content(__('(more...)')); ?>

			 	 <?php wp_link_pages( ); ?> 
			 </div>

			 <?php if(get_the_tags() != '') { ?>
				<div class="post-tags">
					<?php the_tags(); ?>
				</div>
			<?php } ?>

			<div class="post-meta">
				<div class="info">
					<span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
					<abbr class="date published updated" title="<?php the_date('r'); ?>"><?php echo get_the_date('m/d'); ?></abbr>
				</div>

								<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fe1827d1a10d6d8"></script>
<!-- AddThis Button END -->

			</div>
			
				<?php
			
					// Related Posts
					global $post, $wpdb;
					$backup = $post; // backing up the old post
					$tags = wp_get_post_tags($post->ID);
					$tagIDs = array();
					if($tags) {
						$tagcount = count($tags);
						for($i = 0; $i < $tagcount; $i++) {
							$tagIDs[$i] = $tags[$i]->term_id;
						}
					
						$args = array(
							'tag__in' => $tagIDs,
							'post__not_in' => array($post->ID),
							'showposts' => 3,
							'ignore_sticky_posts' => 1
						);
					
						$query = new WP_Query($args);
						if($query->have_posts()) {
							$related_found = true;
						
							?>
							<div class="post-foot">
								<h3>Related Posts</h3>
								<ul class="related">
									<?php while($query->have_posts()) : $query->the_post(); ?>
										<li>
											<?php if(has_post_thumbnail()) { ?>
												<div class="post-thumbnail">
													<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail('square'); ?>
													</a>
												</div>
											<?php } ?>
											<h4><a href="<?php the_permalink(); ?>" class="more"><?php the_title(); ?></a></h4>
											<p>
												<?php truncate_post(60); ?>
											</p></li>
									<?php endwhile; ?>
								</ul>
							</div> <!-- post-foot -->
							<?php
						}
					}
					get_template_part('inc/breadcrumbs');
				?>
			
				<?php

			  comments_template();
				
				?>
		
		</div>
		
	</section>
	<aside id="sidebar">
		<?php get_sidebar(); ?>
	</aside>
</div>
<?php
endwhile; else: ?>

		<?php get_template('404', 'search'); ?>

<?php
  endif;
?>

<?php

  get_footer();

?>