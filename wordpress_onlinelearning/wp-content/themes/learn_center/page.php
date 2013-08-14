<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="body2">
  <div class="main">
    <!-- content -->
    <section id="content">
      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
              <h2 class="pad_bot1">Academic Programs</h2>
            </div>
            <div class="wrapper pad_bot2">
              <figure class="left marg_right1"><img src="<?php echo bloginfo('template_url')?>/images/page3_img1.jpg" alt=""></figure>
              <p class="pad_bot1 pad_top2"><strong>At vero eos et accusamus et iusto odio</strong> <br>
               
					
                </p>
              <a href="#" class="button marg_left1"><span><span>Read More</span></span></a> </div>
           <?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content'); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
          </article>
         

<?php get_sidebar(); ?>
<?php get_footer(); ?>