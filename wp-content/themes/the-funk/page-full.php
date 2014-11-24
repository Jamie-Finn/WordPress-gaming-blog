<?php
/*Template Name: Full Width*/
get_header(); ?>
	<div class="content-sidebar-wrap">
		<main class="content">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
					<header class="entry-header">
						<h1 class="entry-title" ><?php the_title(); ?></h1>
					</header>
					<?php if ( has_post_thumbnail() ) : ?>
						<p><?php the_post_thumbnail(); ?></p>
					<?php endif; ?>
					<div class="entry-content">
						<span><?php the_content( __( 'Read the rest of this entry &raquo;', 'the-funk' )); ?></span>
					</div>
					<?php wp_link_pages('before=<footer class="entry-footer"><p class="entry-meta"><spam id="page-links">' . __( 'Pages:', 'the-funk' ) . ' &after=</spam></p></footer>'); ?>
				</article>
			<?php endwhile; ?>
				<div class="clear"></div>
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>
			<?php endif; ?>
		</main>
	</div>
</div>
                
<?php get_footer(); ?>