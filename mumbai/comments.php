<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
<?php
				return;
            }
        }
		$comment_count = 1;
		$alt = 1;
?>
	<!-- You can start editing here. -->
	<?php if ($comments) : ?>
	<h2>Comments
		<small>(<a href="<?php echo get_settings('siteurl'); ?>/wp-commentsrss2.php?p=<?php echo $post->ID; ?>" title="comments rss">rss</a>)
		<?php if ('open' == $post->ping_status) { ?>
		(<a href="<?php trackback_url() ?>" title="trackback">trackback</a>)
		<?php } ?>
		</small>
	</h2>

	<ol>
	<?php foreach ($comments as $comment) : ?>
		<?php
			$li_class_name = 'comment-entry';
			if($comment->comment_author_email ==  the_author_email())
			{
				$li_class_name .= '-author';
			}
			if($alt == 1)
			{
				$alt = 0;
				$li_class_name .= '-alt';
			}
			else
			{
				$alt = 1;
			}
		?>
		<li class="<?php echo $li_class_name; ?>">
		<a name="comment-<?php echo $comment->comment_ID ?>"></a>
		<div class="comment-info">
			<img src="http://www.gravatar.com/avatar.php?gravatar_id=<?php echo md5($comment->comment_author_email) ?>" 
				width="50" height="50" alt="<?php comment_author(); ?>" />
			<b><?php echo $comment_count;?>. <?php comment_author_link(); ?> said</b><br />on <?php comment_date('F jS, Y') ?> @ <?php comment_date('g:i a') ?>
		</div>
		<div class="comment-body">
			<?php if ($comment->comment_approved == '0') : ?>
				<em>Your comment is awaiting moderation.</em> 
			<?php endif; ?>
			<?php comment_text() ?>
		</div>
		</li>
		<?php $comment_count++; ?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>
	<?php else : // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post->comment_status) : ?> <!-- If comments are open, but there are no comments. -->
		<?php else : // comments are closed ?>
			
		<?php endif; ?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
		<div id="comment-form"> 
			<h3 class="formhead">Add a Comment:</h3>
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<div class="comment-left">
				<?php if ( $user_ID ) : ?>
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
					<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
				<?php else : ?>
					<label class="text">Name <?php if ($req) echo " (required)"; ?></label><br />
					<input type="text" name="author" value="<?php echo $comment_author; ?>" tabindex="1" /><br />
					<label class="text">Email <?php if ($req) echo " (required)"; ?> [for <a href="http://gravatar.com">gravatar</a>]</label><br />
					<input type="text" name="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /><br />
					<label class="text">Website</label><br />
					<input type="text" name="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
				<?php endif; ?>
				</div>
				<div class="comment-right">
					<textarea name="comment" class="commentbox" tabindex="4" rows="5" cols="50"></textarea>
					<div class="formactions">
						<input type="submit" name="submit" tabindex="5" class="submit" value="Comment" />
					</div>
	    
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
					<?php do_action('comment_form', $post->ID); ?>
				</div>
				</form>
		</div>
	<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
