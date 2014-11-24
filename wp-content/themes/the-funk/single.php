<?php get_header(); ?>
	<div class="content-sidebar-wrap">
		<main class="content">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
					<header class="entry-header">
						<h1 class="entry-title" ><?php the_title(); ?></h1> 
						<p class="entry-meta">
							<time class="entry-time"><?php the_time( get_option( 'date_format' ) ); ?></time> <?php _e( 'by', 'the-funk' ); ?> <span class="entry-author"><?php  the_author_posts_link(); ?></span> <span class="entry-comments-link"><a href="#comments"><?php echo get_comments_number();?> <?php _e( 'Comments', 'the-funk' ); ?></a></span>
						</p>
					</header>
					<?php if ( has_post_thumbnail() ) : ?>
						<p><?php the_post_thumbnail(); ?></p>
					<?php endif; ?>
					<div class="entry-content">
						<span><?php the_content( __( 'Read the rest of this entry &raquo;', 'the-funk' )); ?></span>
					</div>
					<footer class="entry-footer">
						<p class="entry-meta">
							<?php wp_link_pages('before=<spam id="page-links">' . __( 'Pages:', 'the-funk' ) . ' &after=</spam>'); ?>
							<span class="entry-categories">Categories <?php the_category(', '); ?></span>
							<span class="entry-tags"><?php the_tags('Tags: ', ', '); ?> </span>
						</p>
					</footer>
				</article>
				<?php thefunk_authorbox(); ?>
			<?php endwhile; ?>
				<div class="clear"></div>
				<?php comments_template(); ?>
			<?php endif; ?>
		</main>
		<?php thefunk_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>