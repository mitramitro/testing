<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since gambling_blog 1.0
 */

get_header(); ?>
<style>.blog_cont {
  
    margin: auto;
    width: 980px;
}




</style>
<div class="blog_cont">
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<nav id="nav-single">
						<?php /*?><h3 class="assistive-text"><?php _e( 'Post navigation', 'gambling_blog' ); ?></h3><?php */?>
						<?php /*?><span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'gambling_blog' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'gambling_blog' ) ); ?></span><?php */?>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

</div>

<?php get_footer(); ?>