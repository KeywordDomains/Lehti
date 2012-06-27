<?php

class KWD_Social extends WP_Widget {
	
	function KWD_Social() {
		$widget_ops = array( 'description' => 'Display Links to your social profiles in the sidebar ');
		parent::WP_Widget(false, "Social Links", $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = $instance['title'];
		$feed_url = $instance['feed_url'];
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
				<?php if($feed_url != '') { ?>
				<li class="rss">
					<a href="http://feeds.feedburner.com/<?php echo $feed_url; ?>">RSS</a>
				</li>
				<?php } if($twitter_id != '') { ?>
				<li class="twitter">
					<a href="http://twitter.com/<?php echo $twitter_id; ?>">Twitter</a>
				</li>
				<?php } if($facebook_id != '') { ?>
				<li class="facebook">
					<a href="http://facebook.com/<?php echo $facebook_id; ?>">Facebook</a>
				</li>
				<?php } if($google_plus_id != '') { ?>
				<li class="gplus">
					<a href="http://plus.google.com/<?php echo $google_plus_id; ?>">Google Plus</a>
				</li>
				<?php } ?>
			</ul>
		</div>

		<?php

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['feed_url'] = $new_instance['feed_url'];
		$instance['twitter_id'] =  $new_instance['twitter_id'];
		$instance['facebook_id'] =  $new_instance['facebook_id'];
		$instance['google_plus_id'] =  $new_instance['google_plus_id'];		
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'feedburner_id' => 'themejunkie', 'twitter_id' => 'theme_junkie', 'facebook_id' => 'themejunkie', 'google_plus_id' => '116387478398345310130' ) );
		$title = $instance['title'];
		$feed_url = $instance['feed_url'];
		$twitter_id = format_to_edit($instance['twitter_id']);
		$facebook_id = format_to_edit($instance['facebook_id']);
		$google_plus_id = format_to_edit($instance['google_plus_id']);		
	?>

	<p>
		<label for="<?php $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
	</p>

	<p>
		<label for="<?php $this->get_field_id('feedburner_id'); ?>">Your RSS Feed URL</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('feed_url'); ?>" name="<?php echo $this->get_field_name('feed_url'); ?>" value="<?php echo $feed_url; ?>">
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