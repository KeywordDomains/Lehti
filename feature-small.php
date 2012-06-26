<div id="feature" class="small slider">
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
				<?php the_post_thumbnail('feature_full'); ?>
			</div>
			<div class="mobile">
				<?php the_post_thumbnail('homepage_thumbnail'); ?>
			</div>
			<div class="inner">
				<div class="article">
					<h2 class="gamma post-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
					<div class="nav">
						<span class="pre">&lsaquo;</span>
						<span class="next">&rsaquo;</span>
					</div>
				</div>
			</div>
		</li>
		
		<?php
			endwhile;
		
			wp_reset_query();
		?>
	</ul>
</div>