<?php

  /**
	* Template Name: Page Full Width
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();
?>

<?php
		$boloday = get_option('boloday');
	?>

<?php
  if (have_posts()) : while (have_posts()) : the_post();
  ?>
<?php if(has_post_thumbnail()) { ?>
	<div id="feature" class="<?php echo $boloday[3]; ?>">
		<?php the_post_thumbnail('feature_full'); ?>
	</div>
<?php } ?>

<div id="main" role="main">
	<section id="content" class="full page hentry">
	 	<div class="page-inner">	
			<h1 class="post-title beta"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			 <div class="post"><?php the_content(__('(more...)', 'boloday')); ?></div>
				<?php
				get_template_part('inc/breadcrumbs');
			  	comments_template();
				
				?>
		
		</div>
		
	</section>
</div>
<?php
endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'boloday'); ?></p>

<?php
  endif;
?>

<?php

  get_footer();

?>