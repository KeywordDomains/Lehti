<?php

  /**
  * Template Name: Contact Page
  *@desc A single blog post See page.php is for a page layout.
  */

  if(isset($_POST['submitted'])) {
  	if(trim($_POST['contactname']) === '') {
			$nameError = __('Please enter your name.', 'boloday');
			$hasError = true;
		} else {
			$name = trim($_POST['contactname']);
		}
		
		if(trim($_POST['email']) === '')  {
			$emailError = __('Please enter your email address.', 'boloday');
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = __('You entered an invalid email address.', 'boloday');
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['message']) === '') {
			$commentError = __('Please enter a message.', 'boloday');
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['message']));
			} else {
				$comments = trim($_POST['message']);
			}
		}
			
		if(!isset($hasError)) {
			$emailTo = "lnolte@i.biz";
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = '[Contact Form] From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
  }

  get_header();
?>

<?php
  if (have_posts()) : while (have_posts()) : the_post();
  ?>

				<?php
		$boloday = get_option('boloday');
	?>

<?php if(has_post_thumbnail()) { ?>
	<div id="feature" class="<?php echo $boloday[3]; ?>">
		<?php the_post_thumbnail('feature_full'); ?>
	</div>
<?php } ?>

<div id="main" role="main">
	<section id="content" class="post hentry">
	 	<div class="page-inner">	
			<h1 class="post-title beta"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<div class="post"><?php the_content(__('(more...)')); ?></div>

			<?php if(isset($emailSent) && $emailSent == true) { ?>
					
		                <div class="alert success">
		                    <?php _e('Thanks! Your Message has been sent.', 'boloday'); ?>
		                </div><!-- .thanks -->
		                
		            <?php } ?>
		
		                <?php if(isset($hasError) || isset($captchaError)) { ?>
		                    <div class="alert error"><?php _e('Sorry an error occured', 'boloday'); ?></div>
		                <?php } ?>
			
			<form id="contactForm" method="post" action="<?php the_permalink(); ?>">
				<p>
					<label for="contactname"><?php _e('Your Name', 'boloday'); ?></label><br>
					<input type="text" name="contactname" id="contactname" value="<?php if(isset($_POST['contactname']))  echo $_POST['contactname'];?>">
					<?php if(isset($nameError)) { ?>
		                                <div class="alert error"><?php echo $nameError; ?></div>
		                            <?php } ?>
				</p>
				<p>
					<label for="email"><?php _e('Your Email', 'boloday'); ?></label><br>
					<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>">
					<?php if(isset($emailError)) { ?>
		                                <div class="alert error"><?php echo $emailError; ?></div>
		                            <?php } ?>
				</p>
				<p>
					<label for="message"><?php _e('Your Message', 'boloday'); ?></label><br>
					<textarea name="message" id="message" rows="12"><?php if(isset($_POST['message']))  echo $_POST['message'];?></textarea>
					<?php if(isset($commentError)) { ?>
		                                <div class="alert error"><?php echo $commentError; ?></div>
		                            <?php } ?>
				</p>
				<p>
					<input type="hidden" name="submitted" value="1">
					<input type="submit" class="primary large" value="Submit">
				</p>
			</form>
			<?php get_template_part('inc/breadcrumbs'); ?>
		</div>
	</section>
	<aside id="sidebar">
		<?php get_sidebar(); ?>
	</aside>
</div>
<?php
endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'boloday'); ?></p>

<?php
  endif;
?>

<?php

  get_footer();

?>