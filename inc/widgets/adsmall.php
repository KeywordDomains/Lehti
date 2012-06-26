<?php

class KWD_AdSmall extends WP_Widget {
	
	function KWD_AdSmall() {
		$widget_ops = array( 'description' => 'Add 125x125 ads to your sidebar');
		parent::WP_Widget(false, 'Square Button Ads', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$banner1 = $instance['banner1'];
		$link1 = $instance['link1'];

		$banner2 = $instance['banner2'];
		$link2 = $instance['link2'];

		$banner3 = $instance['banner3'];
		$link3 = $instance['link3'];

		$banner4 = $instance['banner4'];
		$link4 = $instance['link4'];

		$banner5 = $instance['banner5'];
		$link5 = $instance['link5'];

		$banner6 = $instance['banner6'];
		$link6 = $instance['link6'];

		echo $before_widget;
		?>

		<ul class="ads">
			<?php if($banner1 !== '') { ?>
				<li>
					<a href="<?php echo $link1; ?>" target="_blank">
						<img src="<?php echo $banner1; ?>" class="ad squareButton" alt="">
					</a>
				</li>
			<?php } ?>

			<?php if($banner2 !== '') { ?>
				<li>
					<a href="<?php echo $link2; ?>" target="_blank">
						<img src="<?php echo $banner2; ?>" class="ad squareButton" alt="">
					</a>
				</li>
			<?php } ?>

			<?php if($banner3 !== '') { ?>
				<li>
					<a href="<?php echo $link3; ?>" target="_blank">
						<img src="<?php echo $banner3; ?>" class="ad squareButton" alt="">
					</a>
				</li>
			<?php } ?>

			<?php if($banner4 !== '') { ?>
				<li>
					<a href="<?php echo $link4; ?>" target="_blank">
						<img src="<?php echo $banner4; ?>" class="ad squareButton" alt="">
					</a>
				</li>
			<?php } ?>

			<?php if($banner5 !== '') { ?>
				<li>
					<a href="<?php echo $link5; ?>" target="_blank">
						<img src="<?php echo $banner5; ?>" class="ad squareButton" alt="">
					</a>
				</li>
			<?php } ?>

			<?php if($banner6 !== '') { ?>
				<li>
					<a href="<?php echo $link6; ?>" target="_blank">
						<img src="<?php echo $banner6; ?>" class="ad squareButton" alt="">
					</a>
				</li>
			<?php } ?>
		</ul>

		<?php

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) {
		$banner1 = $instance['banner1'];
		$link1 = $instance['link1'];

		$banner2 = $instance['banner2'];
		$link2 = $instance['link2'];

		$banner3 = $instance['banner3'];
		$link3 = $instance['link3'];

		$banner4 = $instance['banner4'];
		$link4 = $instance['link4'];

		$banner5 = $instance['banner5'];
		$link5 = $instance['link5'];

		$banner6 = $instance['banner6'];
		$link6 = $instance['link6'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id('banner1'); ?>">URL of Banner 1</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('banner1'); ?>" id="<?php echo $this->get_field_id('banner1'); ?>" value="<?php echo $banner1; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link1'); ?>">Link for Banner 1</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('link1'); ?>" id="<?php echo $this->get_field_id('link1'); ?>" value="<?php echo $link1; ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('banner2'); ?>">URL of Banner 2</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('banner2'); ?>" id="<?php echo $this->get_field_id('banner2'); ?>" value="<?php echo $banner2; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link2'); ?>">Link for Banner 2</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('link2'); ?>" id="<?php echo $this->get_field_id('link2'); ?>" value="<?php echo $link2; ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('banner3'); ?>">URL of Banner 3</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('banner3'); ?>" id="<?php echo $this->get_field_id('banner3'); ?>" value="<?php echo $banner3; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link3'); ?>">Link for Banner 3</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('link3'); ?>" id="<?php echo $this->get_field_id('link3'); ?>" value="<?php echo $link3; ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('banner4'); ?>">URL of Banner 4</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('banner4'); ?>" id="<?php echo $this->get_field_id('banner4'); ?>" value="<?php echo $banner4; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link4'); ?>">Link for Banner 4</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('link4'); ?>" id="<?php echo $this->get_field_id('link4'); ?>" value="<?php echo $link4; ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('banner5'); ?>">URL of Banner 5</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('banner5'); ?>" id="<?php echo $this->get_field_id('banner5'); ?>" value="<?php echo $banner5; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link5'); ?>">Link for Banner 5</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('link5'); ?>" id="<?php echo $this->get_field_id('link5'); ?>" value="<?php echo $link5; ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('banner6'); ?>">URL of Banner 6</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('banner6'); ?>" id="<?php echo $this->get_field_id('banner6'); ?>" value="<?php echo $banner6; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link6'); ?>">Link for Banner 6</label>
			<input type="text" calss="widefat" name="<?php echo $this->get_field_name('link6'); ?>" id="<?php echo $this->get_field_id('link6'); ?>" value="<?php echo $link6; ?>">
		</p>
		<?php
	}

}

register_widget('KWD_AdSmall');