<?php get_header(); ?>
	<div class="content-sidebar-wrap">
		<main class="content">
			<div class="timeline_items_wrapper">
				<div class="postwrap postwrapBlog tl2">
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
							<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
							 	<div class="ribbon ribbon-color">
									<div class="banner">
										<div class="text"><?php _e( 'STICKY', 'the-funk' ); ?></div>
									</div>
								</div>
							<?php endif; ?>
							<?php if ( has_post_thumbnail() ) : ?>
								<a class="image_rollover_bottom con_borderImage" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							<?php endif; ?>
							<span class="meta-category">
								<?php $category = get_the_category(); if ($category) { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'the-funk' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> '; } ?>
							</span>
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post_date"><?php the_time('j'); ?><span><?php the_time('M'); ?></span></div>
							<?php else : ?>
								<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
 									<div class="post_date" style="margin: 75px 10px 0px 0px;"><?php the_time('j'); ?><span><?php the_time('M'); ?></span></div>
								<?php else : ?>
								<div class="post_date" style="margin: 10px 10px 0px 0px;"><?php the_time('j'); ?><span><?php the_time('M'); ?></span></div>
								<?php endif; ?>
							<?php endif; ?>
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<h2 class="entry-title"><?php the_title(); ?></h2>
								<?php else : ?>
 									<h2 class="entry-title" style="padding-top: 35px;"><?php the_title(); ?></h2>
								<?php endif; ?>
 							</a>
 							<span><?php the_excerpt(); ?></span>
 							<a class="read_more" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'the-funk' ); ?></a>
 						</div>
 					<?php endwhile; ?>
 						<div class="clear"></div>
 						<div>
							<?php if ($wp_query->max_num_pages > 1) : ?>
								<?php if (current_theme_supports( 'loop-pagination' ) ): ?>
									<?php include (TEMPLATEPATH . '/assets/lib/pagination.php'); ?>
									<nav id="post-nav">
										<?php loop_pagination(); ?>
									</nav>
								 <?php else : ?>
									<div class="alignleft"><?php previous_posts_link( '&laquo; Previous Entries', 'the-funk' ); ?></div>
									<div class="alignright"><?php next_posts_link( 'Next Entries &raquo;', 'the-funk' ); ?></div>
								<?php endif;?>
							<?php endif; ?>
						</div>
					<?php else : ?>
<div class="entry">
							<h1 class="title"><?php _e( 'Not Found', 'the-funk' ); ?></h1>
							<p><?php _e( 'Sorry, but you are looking for something that isn&rsquo;t here.', 'the-funk' ); ?></p>
						</div>
		 			<?php endif; ?>
				</div>
			</div>
		</main>
		<?php thefunk_sidebar(); ?>
	</div>
</div>
 
<?php get_footer(); ?>