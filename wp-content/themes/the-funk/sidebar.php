<aside class="sidebar sidebar-primary widget-area">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : // If the sidebar has widgets. ?>

		<?php dynamic_sidebar( 'sidebar' ); ?>

	<?php else : // if the sidebar has no widgets. ?>

		<?php the_widget( 'WP_Widget_Search' ); ?>

		<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

		<?php the_widget( 'WP_Widget_Recent_Comments' ); ?>
		
		<?php the_widget( 'WP_Widget_Meta' ); ?>

		<?php endif; // End widgets check. ?>
</aside>