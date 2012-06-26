<?php

class KWD_AdFull extends WP_Widget {
	
	function KWD_AdFull() {
		$widget_ops = array( 'description' => 'Add 300x250 Ad to your sidebar');
		parent::WP_Widget(false, 'Medium Rectangle Ad', $widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );
		$banner = $instance['banner'];
		$link = $instance['link'];

		echo $before_widget;
		?>
		<a href="<?php echo $link; ?>" target="_blank">
			<img src="<?php echo $banner; ?>" class="ad mediumRectangle" alt="">
		</a>
		<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) {
		$banner = $instance['banner'];
		$link = $instance['link'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id('banner'); ?>">URL of banner-image to display</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('banner'); ?>" id="<?php echo $this->get_field_id('banner'); ?>" value="<?php echo $banner; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>">URL to link to</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php echo $link; ?>">
		</p>
		<?php
	}

}

register_widget('KWD_AdFull');