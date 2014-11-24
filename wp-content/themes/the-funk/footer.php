<?php
$thememod = get_theme_mod('thefunk_theme_options');
$footer_widgets = $thememod['footer_widgets_section'];
if ($footer_widgets != 2) {
?>

<div class="footer-widgets">
	<div class="wrap">
		<div class="footer-widgets-1 widget-area">
			<?php if ( is_active_sidebar( 'footer-one' ) ) :?>

				<?php dynamic_sidebar( 'footer-one' ); ?>
			
			<?php else : // if the sidebar has no widgets. ?>

				<?php the_widget( 'WP_Widget_Search' ); ?>

			<?php endif; ?>
		</div>
		<div class="footer-widgets-2 widget-area">
			<?php if ( is_active_sidebar( 'footer-two' ) ) :?>

				<?php dynamic_sidebar( 'footer-two' ); ?>

			<?php else : // if the sidebar has no widgets. ?>

				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

			<?php endif; ?>
		</div>
		<div class="footer-widgets-3 widget-area">
			<?php if ( is_active_sidebar( 'footer-three' ) ) :?>

				<?php dynamic_sidebar( 'footer-three' ); ?>

			<?php else : // if the sidebar has no widgets. ?>

				<?php the_widget( 'WP_Widget_Recent_Comments' ); ?>

			<?php endif; ?>
		</div>
	</div>
</div>
<?php } ?>

<footer class="site-footer">
	<div class="wrap">
    <?php
    // Oh shoot, this theme comes with encrypted footer credit!
    // You can easily edit the footer credits from The Customizer.
    // Your welcome :)
    thefunk_footer_credits();
    ?>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>