<?php

  while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="post hentry">
		<?php if(has_post_thumbnail()) { ?>
			<a href="<?php the_permalink() ?>" rel="bookmark">
				<div class="post-thumbnail">
					<?php the_post_thumbnail('homepage_thumbnail'); ?>
					<div class="overlay">
					</div>
				</div>
			</a>
		<?php } ?>
		<div class="post-title">
			<h2 class="gamma entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</div>
		<div class="post-excerpt entry-content">
			<?php truncate_post(120); ?>
		</div>
		<div class="post-meta">
			<span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
			<abbr class="date published updated" title="<?php the_date('r'); ?>"><?php echo get_the_date('m/d'); ?></abbr>
			<span class="comments"><?php comments_popup_link(__('0 Comments', 'boloday'), __('1 Comment', 'boloday'), __('% Comments', 'boloday')) ?></span>
		</div>
	</article>
<?php endwhile; ?>