<?php
		$boloday = get_option('boloday');
	?>
<div id="feature" class="<?php echo $boloday[3]; ?> static">
		<ul>
			<li>
				<div class="desktop">
					<?php the_post_thumbnail('feature_full'); ?>
				</div>
				<div class="mobile">
					<?php the_post_thumbnail('homepage_thumbnail'); ?>
				</div>
				<div class="inner">
					<div class="article">
						<h1 class="entry-title post-title beta">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h1>
						<div class="meta"><?php _e('by', 'boloday'); ?> <?php the_author(); ?> | <?php the_date('m/d/y'); ?></div>
					</div>
				</div>
			</li>
		</ul>
	</div>