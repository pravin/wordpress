<?php 
	get_header(); 
	require('blogtopnav.php');
?>

<div id="content">
	<div id="left-pane">
	<?php if (have_posts()) { ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="date"><?php the_time('F jS, Y') ?> </div>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permalink"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/permalink.png" alt="permalink" /> <?php the_title(); ?></a></h1>
				<div class="entry">
					<?php the_content(); ?>
				</div>
				
				<?php if(is_single() or is_page()) { ?>
					<div class="post-comments">
						<?php comments_template(); ?>
					</div>
				<?php } else { ?>
					<div class="byline">
						Posted in <?php the_category(', ') ?> | 
						<?php edit_post_link('Edit', '', ' | '); ?>  
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					</div>
				<?php } ?>
				
			</div>

		<?php endwhile; ?>
		
		<!-- hack for /blog -->
		<?php if(!$is_four_oh_four) { ?> 
			<div class="center-me">
				<?php next_posts_link('&laquo; Previous Entries') ?> <?php previous_posts_link('Next Entries &raquo;') ?>
			</div>
		<?php } ?>
		
	<?php } else {
		include('404-message.php'); 
	} ?>
	</div>
	
	<div id="right-pane">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
