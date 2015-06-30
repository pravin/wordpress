<?php get_header(); ?>

<?php require('blogtopnav.php'); ?>

<div id="content">
	<div id="left-pane">		
		<div class="archives">
			<h1>Archives by Month:</h1>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</div>

		<div class="archives">
			<h1>Archives by Subject:</h1>
			<ul>
				<?php wp_list_cats('children=0&optioncount=1'); ?>
			</ul>
		</div>
	</div>
	
	<div id="right-pane">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
