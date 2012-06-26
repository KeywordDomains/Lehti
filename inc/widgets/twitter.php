<?php

class KWD_Twitter extends WP_Widget {

   function KWD_Twitter() {
	   $widget_ops = array( 'description' => 'Add your Twitter feed to your sidebar with this widget.' );
       parent::WP_Widget(false, "Twitter Updates",$widget_ops);      
   }
   
   function widget($args, $instance) {  
    extract( $args );
   	$title = $instance['title'];
    $limit = $instance['limit']; if (!$limit) $limit = 5;
	$username = $instance['username'];
	$unique_id = $args['widget_id'];
	?>
		<?php echo $before_widget; ?>
        <a href="http://twitter.com/<?php echo $username; ?>"><?php if ($title) echo $before_title . $title . $after_title; ?></a>
        <ul id="twitter_update_list_<?php echo $unique_id; ?>"><li></li></ul>
        <div class="clear"></div>
        <script type="text/javascript">
	<!--//--><![CDATA[//><!--
	
	    function twitterCallback2(twitters) {
	    
	      var statusHTML = [];
	      for (var i=0; i<twitters.length; i++){
	        var username = twitters[i].user.screen_name;
	        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
	          return '<a href="'+url+'">'+url+'</a>';
	        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
	          return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
	        });
	        statusHTML.push( '<li><span class="content">'+status+'</span> <a style="font-size:85%" class="time" href="http://twitter.com/'+username+'/statuses/'+twitters[i].id_str+'">'+relative_time(twitters[i].created_at)+'</a></li>' );
	      }
	      document.getElementById( 'twitter_update_list_<?php echo $unique_id; ?>').innerHTML = statusHTML.join( '' );
	    }
	    
	    function relative_time(time_value) {
	      var values = time_value.split( " " );
	      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	      var parsed_date = Date.parse(time_value);
	      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	      delta = delta + (relative_to.getTimezoneOffset() * 60);
	    
	      if (delta < 60) {
	        return 'less than a minute ago';
	      } else if(delta < 120) {
	        return 'about a minute ago';
	      } else if(delta < (60*60)) {
	        return (parseInt(delta / 60)).toString() + ' minutes ago';
	      } else if(delta < (120*60)) {
	        return 'about an hour ago';
	      } else if(delta < (24*60*60)) {
	        return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
	      } else if(delta < (48*60*60)) {
	        return '1 day ago';
	      } else {
	        return (parseInt(delta / 86400)).toString() + ' days ago';
	      }
	    }
	//-->!]]>
	</script>
	<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/<?php echo $username; ?>.json?callback=twitterCallback2&amp;count=<?php echo $limit; ?>&amp;include_rts=t"></script> 
        <?php echo $after_widget; ?>
        
   		
	<?php
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {        
   
       $title = esc_attr($instance['title']);
       $limit = esc_attr($instance['limit']);
	   $username = esc_attr($instance['username']);
       ?>
       <p>
	   	   <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
	       <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
       </p>
       <p>
	   	   <label for="<?php echo $this->get_field_id( 'username' ); ?>">Twitter Username</label>
	       <input type="text" name="<?php echo $this->get_field_name( 'username' ); ?>"  value="<?php echo $username; ?>" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" />
       </p>
       <p>
	   	   <label for="<?php echo $this->get_field_id( 'limit' ); ?>">Tweets to display</label>
	       <input type="text" name="<?php echo $this->get_field_name( 'limit' ); ?>"  value="<?php echo $limit; ?>" class="" size="3" id="<?php echo $this->get_field_id( 'limit' ); ?>" />

       </p>
      <?php
   }
   
} 
register_widget( 'KWD_Twitter' );
?>