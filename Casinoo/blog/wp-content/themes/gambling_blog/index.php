<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blog</title>
<link href="<?php bloginfo('template_directory'); ?>/css/style2.css" rel="stylesheet" type="text/css" />
</head>

<body>


<?php get_header(); ?>





			<div id="wraper">
            
      
            <!--blog cont start-->
            <div class="blog_cont">
            <div class="blog_left_cont">
            <div class="blog_left_cont_top_bg">
            <h2>Business Travel Blog</h2>
            </div>

            <div class="blog_left_cont_middel_bg">
            
           
			<?php if ( have_posts() ) : ?>

				<?php gambling_blog_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts()) : the_post(); 
               
               ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php gambling_blog_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'gambling_blog' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'gambling_blog' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

		

            
         
            
          
           
    
            
            </div>
            
            
            </div>





            <div class="blog_right_cont">
            <div class="blog_right_cont_top_bg">
            <h2>Follow Us On</h2>
            </div>
            <div class="blog_right_cont_middle_bg">
            <div class="facebook_cont">
            <div class="main_social_cont">
          	<div class="facebook_heading_cont">Facebook &raquo;</div>
            <div class="facebook_heading_image"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/facebook_icon.png" alt="" width="85" height="29" border="0" /></a></div>
            <div class="clear"></div>
            <h3>7 Subscribers</h3>
          
            </div>
            <div class="main_social_cont pad-2">
          	<div class="facebook_heading_cont">Twitter &raquo;</div>
            <div class="facebook_heading_image"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/twitter_icon.png" alt="" width="85" height="29" border="0" /></a></div>
            <div class="clear"></div>
            <h3>7 Subscribers</h3>
          
            </div>
            <div class="main_social_cont pad-2" style="border-bottom:none;">
          	<div class="facebook_heading_cont">Get Rss &raquo;</div>
            <div class="facebook_heading_image"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/rss_icon.png" alt="" width="85" height="29" border="0" /></a></div>
            <div class="clear"></div>
            <h3>7 Subscribers</h3>
          
            </div>
            
            </div>
            
            
            <div class="popular_post_cont">
            <div class="popular_post_heading_cont">
            <h2>Popular Posts</h2>
            </div>
            <div class="clear"></div>
            <ul>
    	    <li><a href="#">5 Things You Should Know About Airbnb </a></li>
	        <li><a href="#">Best Business Class Airlines in 2011</a></li>
			<li><a href="#">How to Find the Cheapest Flights Possible</a></li>
			<li><a href="#">World's Most Beautiful Government Buildings</a></li>
			<li><a href="#">World's Largest Cruise Ship Launches</a></li>
			<li><a href="#">2010 Holiday Gift Ideas for Travel Addicts</a></li>
			<li><a href="#">6 Scenic Wonders of New Zealand</a></li>
			<li><a href="#">Top 10 In-flight Meals: World's Best Airline Food</a></li>
			<li><a href="#">Hong Kong Christmas in Photos</a></li>
			<li><a href="#">How to Travel with Only a Carry-On</a></li>

            
            
            </ul>
            
            </div>
            
            <div class="popular_post_cont">
            <div class="popular_post_heading_cont">
            <h2>Categories</h2>
            </div>
            <div class="clear"></div>
            <ul>
    	    <li><a href="#">Accessories & Gadgets </a></li>
	        <li><a href="#">Accommodation</a></li>
			<li><a href="#">Adventure/Outdoors</a></li>
			<li><a href="#">Airlines</a></li>
			<li><a href="#">Airports</a></li>
			<li><a href="#">Attractions</a></li>
			         
            
            </ul>
            
            </div>
            
            <div class="popular_post_cont">
            <div class="popular_post_heading_cont">
            <h2>View by Author</h2>
            </div>
            <div class="clear"></div>
            <ul>
    	    <li><a href="#">admin </a></li>
	        <li><a href="#">Attraction</a></li>
             <li><a href="#">CMD</a></li>
			

            
            
            </ul>
            
            </div>
            
            
            
            </div>
            <div class="blog_right_cont_bottom_bg"></div>
            
            
            </div>
            
            
            
            
            
            
            <!--close blog cont start-->            </div>
            
            
            
     
            
            
            
            <div class="clear"></div>
            <!--wraper div close--></div>
            
            <?php get_footer(); ?>
            

</body>
</html>
