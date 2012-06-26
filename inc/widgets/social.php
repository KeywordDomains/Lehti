<?php

class KWD_Social extends WP_Widget {
	
	function KWD_Social() {
		$widget_ops = array( 'description' => 'Display Links to your social profiles in the sidebar ');
		parent::WP_Widget(false, "Social Links", $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = $instance['title'];
		$feedburner_id = $instance['feedburner_id'];
		$twitter_id = $instance['twitter_id'];
		$facebook_id = $instance['facebook_id'];
		$google_plus_id = $instance['google_plus_id'];

		echo $before_widget;
		echo $before_title;

		if($title !== '') {
			echo $title;
		} else {
			echo 'Connect with us';
		}

		echo $after_title;
		?>

		<div class="social-icons">
			<ul>
				<li class="rss">
					<a href="http://feeds.feedburner.com/<?php echo $feedburner_id; ?>">RSS</a>
				</li>
				<li class="twitter">
					<a href="http://twitter.com/<?php echo $twitter_id; ?>">Twitter</a>
				</li>
				<li class="facebook">
					<a href="http://facebook.com/<?php echo $facebook_id; ?>">Facebook</a>
				</li>
				<li class="gplus">
					<a href="http://plus.google.com/<?php echo $google_plus_id; ?>">Google Plus</a>
				</li>
			</ul>
		</div>

		<?php

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['feedburner_id'] = $new_instance['feedburner_id'];
		$instance['twitter_id'] =  $new_instance['twitter_id'];
		$instance['facebook_id'] =  $new_instance['facebook_id'];
		$instance['google_plus_id'] =  $new_instance['google_plus_id'];		
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'feedburner_id' => 'themejunkie', 'twitter_id' => 'theme_junkie', 'facebook_id' => 'themejunkie', 'google_plus_id' => '116387478398345310130' ) );
		$title = $instance['title'];
		$feedburner_id = $instance['feedburner_id'];
		$twitter_id = format_to_edit($instance['twitter_id']);
		$facebook_id = format_to_edit($instance['facebook_id']);
		$google_plus_id = format_to_edit($instance['google_plus_id']);		
	?>

	<p>
		<label for="<?php $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
	</p>

	<p>
		<label for="<?php $this->get_field_id('feedburner_id'); ?>">Your Feedburner ID</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('feedburner_id'); ?>" name="<?php echo $this->get_field_name('feedburner_id'); ?>" value="<?php echo $feedburner_id; ?>">
	</p>

	<p>
		<label for="<?php $this->get_field_id('twitter_id'); ?>">Your Twitter Username</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" value="<?php echo $twitter_id; ?>">
	</p>

	<p>
		<label for="<?php $this->get_field_id('facebook_id'); ?>">Your Facebook ID</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('facebook_id'); ?>" name="<?php echo $this->get_field_name('facebook_id'); ?>" value="<?php echo $facebook_id; ?>">
	</p>

	<p>
		<label for="<?php $this->get_field_id('google_plus_id'); ?>">Your Google Plus ID</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('google_plus_id'); ?>" name="<?php echo $this->get_field_name('google_plus_id'); ?>" value="<?php echo $google_plus_id; ?>">
	</p>

	<?php
	}
}

register_widget('KWD_Social');