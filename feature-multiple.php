<div id="feature" class="small multiple slider">
	<div class="current">
	<ul>
		<?php
			$boloday = get_option('boloday');

			$args = array(
				'posts_per_page' => $boloday[5],
				'tag'  => $boloday[4],
				'orderby' => 'date',
				'order' => 'DESC'
			);
			query_posts( $args );
			while(have_posts() ) : the_post();
		?>
		
		<li>
			<div class="desktop">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('feature_full'); ?>
				</a>
			</div>
			<div class="mobile">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('homepage_thumbnail'); ?>
				</a>
			</div>
			<div class="inner">
				<div class="article">
					<div class="nav">
						<span class="pre">&lsaquo;</span>
						<span class="next">&rsaquo;</span>
					</div>

					<h2 class="gamma post-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
				</div>
			</div>
		</li>
		
		<?php
			endwhile;
			wp_reset_query();
		?>
	</ul>
</div>
<div class="others">
	<?php 
	$args = array(
				'posts_per_page' => 3,
				'tag'  => $boloday[4],
				'orderby' => 'date',
				'order' => 'DESC',
				'offset' => $boloday[5]
			);
			query_posts( $args );
	while(have_posts()) : the_post(); ?>
		<div class="entry">
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'square' ); ?>
				</a>
			</div>
			<h3><a href="<?php the_permalink(); ?>" class="more"><?php the_title(); ?></a></h3>
		</div>
	<?php endwhile;
	wp_reset_query(); ?>
</div>
</div>