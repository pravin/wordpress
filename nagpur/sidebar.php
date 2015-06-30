		<h2>Feeds</h2>
		<ul>
			<li><a href="<?php bloginfo('rss2_url'); ?>" title="posts rss (2.0)"><img src="<?php bloginfo('template_directory') ?>/images/feed.gif" alt="entries rss (2.0)" /> Entries Rss (2.0)</a></li>
			<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="comments rss"><img src="<?php bloginfo('template_directory') ?>/images/feed.gif" alt="comments rss" /> Comments Rss (2.0)</a></li>
		</ul>
		
		<h2>Pages</h2>
		<ul>
		<?php wp_list_pages('title_li=&depth=1'); ?>
		</ul>
		
		<h2>Archives</h2>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h2>Meta</h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
		</ul>
		
		<h2>Blogroll</h2>
		<ul class="blogroll">
			<?php get_links('-1', '<li>', '</li>', '', FALSE, 'name', FALSE, FALSE, -1, TRUE); ?>
		</ul>