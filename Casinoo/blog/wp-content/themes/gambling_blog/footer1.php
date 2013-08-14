<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since gambling_blog 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				<?php do_action( 'gambling_blog_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'gambling_blog' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'gambling_blog' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'gambling_blog' ), 'WordPress' ); ?></a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>