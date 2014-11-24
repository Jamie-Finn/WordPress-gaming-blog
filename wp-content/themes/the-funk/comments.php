<?php if ( post_password_required() ) : ?>
	<div class="entry-comments" id="comments">
		<p class="alert"><?php _e( 'This post is password protected. Enter the password to view comments.', 'the-funk'); ?></p>
	</div>
<?php endif; ?>

<?php if ( have_comments() ) : ?>
	<div class="entry-comments" id="comments">

	<h2 id="comments-number"><?php _e( 'Comments', 'the-funk'); ?></h2>

		<?php if ( get_option( 'page_comments' ) && 1 < get_comment_pages_count() ) : ?>

			<div class="comments-nav">
				<?php previous_comments_link( __( '&larr; Previous', 'the-funk' ) ); ?>
				<span class="page-numbers"><?php printf( __( 'Page %1$s of %2$s', 'the-funk' ), ( get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1 ), get_comment_pages_count() ); ?></span>
				<?php next_comments_link( __( 'Next &rarr;', 'the-funk' ) ); ?>
			</div><!-- .comments-nav -->

		<?php endif; ?>

		<ol class="comment-list">
			<?php wp_list_comments('type=comment'); ?>
		</ol><!-- .comment-list -->
	</div>
<?php endif; ?>

<?php if ( thefunk_post_has( 'pings', $post->ID ) ) : ?>
	<div class="entry-pings">

		<h2 id="pings-number"><?php _e( 'Pings', 'the-funk'); ?></h2>

	<ol class="ping-list">
		<?php wp_list_comments('type=pings'); ?>
	</ol><!-- .comment-list -->
	</div>
<?php endif; ?>

<?php if ( pings_open() && !comments_open() ) : ?>
	<div class="entry-comments" id="comments">
		<p class="comments-closed pings-open">
			<?php printf( __( 'Comments are closed, but <a href="%s" title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', 'the-funk' ), esc_url( get_trackback_url() ) ); ?>
		</p><!-- .comments-closed .pings-open -->
	</div>
<?php elseif ( !comments_open() ) : ?>
	<?php if ( is_single() ) : ?>
		<div class="entry-comments" id="comments">
			<p class="comments-closed">
			<?php _e( 'Comments are closed.', 'the-funk' ); ?>
			</p><!-- .comments-closed -->
		</div>
	<?php elseif ( is_page() ) : ?>
	<?php endif; ?>
<?php endif; ?>

<?php comment_form(); // Loads the comment form. ?>