<?php get_header(); ?>
<div class="content-sidebar-wrap">
	<main class="content" style="width: 100% !important;">
		<div class="timeline_items_wrapper">
			<div class="postwrap postwrapBlog tl2">
				<div class="entry">
					<h1 class="title"><?php _e( 'Page Not Found', 'the-funk' ); ?></h1>
					<p><?php _e( 'The page you were looking for doesn&rsquo;t exist. Sasquatch, on the other hand, just might.', 'the-funk' ); ?></p>
					<p><?php _e( 'But hey, you can always use our search form:', 'the-funk' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</main>
</div>
</div>

<?php get_footer(); ?>