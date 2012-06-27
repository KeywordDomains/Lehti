<div id="comments">
<?php if ( comments_open() ) : ?>
<?php

  /**
  *@desc Included at the bottom of post.php and single.php, deals with all comment layout
  */

  if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) :
?>
<p><?php _e('Enter your password to view comments.', 'boloday'); ?></p>
<?php return; endif; ?>

<h3 id="comments"><?php comments_number(__('No Comments', 'boloday'), __('1 Comment', 'boloday'), __('% Comments', 'boloday')); ?>
</h3>

<?php if ( $comments ) : ?>
<ol id="commentlist">

<?php wp_list_comments('type=comment&callback=boloday_comment'); ?>

</ol>

<?php paginate_comments_links(); ?>

<?php else : // If there are no comments yet ?>
	<p><?php _e('No comments yet.', 'boloday'); ?></p>
<?php endif; ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'boloday'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
<?php else : ?>

<?php comment_form(array(
	'fields' => array(
		'author' => '<p><input type="text" name="author" id="author" value="'.$comment_author.'" size="22" tabindex="1" />
<label for="author"><small>'.__('Name (required)', 'boloday').'</small></label></p>',
	
		'email' => '<p><input type="text" name="email" id="email" value="'.$comment_author_email.'" size="22" tabindex="2" />
<label for="email"><small>'.__('Email (will not be published) (required)', 'boloday').'</small></label></p>',

		'url' => '<p><input type="text" name="url" id="url" value="'.$comment_author_url.'" size="22" tabindex="3" />
<label for="url"><small>'.__('Website', 'boloday').'</small></label></p>'),

	'comment_field' => '<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>',

	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'label_submit' => __('Post Comment', 'boloday'),
	'title_reply' => __('Leave a reply', 'boloday'),
	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'boloday' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',



)); ?>

<?php endif; // If registration required and not logged in ?>
<?php endif; ?>
</div>