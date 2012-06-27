		<footer>
			<div class="inner widgets">
				<?php
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) {
						?>
							&copy;
						<?php
					}
				?>
			</div>
			<div class="inner copyright">
				&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php echo bloginfo('name'); ?></a> | <a href="http://kiev.com">kiev.com</a> | <?php _e('Proudly powered by <a href="http://wordpress.org">WordPress', 'boloday'); ?></a>
			</div>
		</footer>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.js"><\/script>')</script>

		<script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>

	<?php wp_footer(); ?>

	</body>
</html>