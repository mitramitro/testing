<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since gambling_blog 1.0
 */
?>
<style>
.comment-author vcard
{
font-size:12px;
}
.entry-title {
    /*background: none repeat scroll 0 0 #383838;*/
    color: #0972B4;
    margin: 0;
    padding-bottom: 5px;
   /* padding-left: 37px;*/
    padding-top: 12px;
  	font-family:"Century Gothic";
	font-size:15px;
}
.entry-meta {
   /* background: none repeat scroll 0 0 gray;*/
    color: #A30909;
    font-size: 12px;
    /*padding: 8px 8px 8px 44px;*/
    font-family:Arial, Helvetica, sans-serif;
}
.entry-meta a 
{
text-decoration:none;
color:#A30909;
}

.entry-content {
/*    background:#383838;*/
  
    padding: 8px 0 0 0;
   }
.entry-content p {
    color:#000000;
    font-size: 12px;
    margin: auto;
   	font-family:Arial, Helvetica, sans-serif;
	font-weight:normal;

}
.entry-content img {
    height: 381px;
    padding: 10px;
    width: 686px;
	border:solid 1px #d2d2d2;
	margin-bottom:10px;


}
#comments
{
color:#0972B4;
width:710px;
padding:1px;
/*background:#383838;*/
}
.comments-title
{
padding-left:11px;
}


.blog_cont {
    float: none;
    height: auto;
    width: 980px;
	 margin: auto;
}
.comment_post p
{
margin:15px;

}

</style>
<link href="<?php bloginfo('template_directory'); ?>/css/style2.css" rel="stylesheet" type="text/css" />
<div id="wraper">
<div class="blog_cont" style="float:none;">
<div class="blog_right_cont" style="float:right;" >
            <div class="blog_right_cont_top_bg">
            <h2>Follow Us On</h2>
            </div>
            <div class="blog_right_cont_middle_bg">
            <div class="facebook_cont">
            <div class="main_social_cont">
          	<div class="facebook_heading_cont">Facebook &raquo;</div>
            <div class="facebook_heading_image"><a href="#"><img width="85" height="29" border="0" alt="" src="http://localhost/casino/wordpress/wp-content/themes/gambling_blog/images/facebook_icon.png"></a></div>
            <div class="clear"></div>
            <h3>7 Subscribers</h3>
          
            </div>
            <div class="main_social_cont pad-2">
          	<div class="facebook_heading_cont">Twitter »</div>
            <div class="facebook_heading_image"><a href="#"><img width="85" height="29" border="0" alt="" src="http://localhost/casino/wordpress/wp-content/themes/gambling_blog/images/twitter_icon.png"></a></div>
            <div class="clear"></div>
            <h3>7 Subscribers</h3>
          
            </div>
            <div style="border-bottom:none;" class="main_social_cont pad-2">
          	<div class="facebook_heading_cont">Get Rss »</div>
            <div class="facebook_heading_image"><a href="#"><img width="85" height="29" border="0" alt="" src="http://localhost/casino/wordpress/wp-content/themes/gambling_blog/images/rss_icon.png"></a></div>
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
    	    <li><a href="#">Accessories &amp; Gadgets </a></li>
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
</div>


<div class="blog_left_cont" style="width:710px;">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    
   
    
		<h1 class="entry-title"><?php the_title(); ?></h1>
 <?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php gambling_blog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'gambling_blog' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->





<!--<div class="right_panel">
<img class="right_banner" src="images/right_banner.png">
<div class="best_poker_pennel">
<h1>Best Poker sites</h1>
<h2>Poker site ratings  <span>Reviews</span></h2>
<div class="down_cont">
<div class="inner_left"> <h3>1.</h3> <a href="#"><img width="38" height="24" border="none" alt="img" src="http://webgamblingtalk.com/images/site_icon.jpg"></a></div>
<div class="text_c">Lorem ipsum </div>
<div class="rev">
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/grey-star.png"></a>
</div>

</div>
<div class="down_cont">
<div class="inner_left"> <h3>2.</h3> <a href="#"><img width="38" height="24" border="none" alt="img" src="http://webgamblingtalk.com/images/site_icon2.jpg"></a></div>
<div class="text_c">Lorem ipsum </div>
<div class="rev">
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/grey-star.png"></a>
</div>

</div>
<div class="down_cont">
<div class="inner_left"> <h3>3.</h3> <a href="#"><img width="38" height="24" border="none" alt="img" src="http://webgamblingtalk.com/images/site_icon3.jpg"></a></div>
<div class="text_c">Lorem ipsum </div>
<div class="rev">
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/grey-star.png"></a>
</div>

</div>
<div class="down_cont">
<div class="inner_left"> <h3>4.</h3> <a href="#"><img width="38" height="24" border="none" alt="img" src="http://webgamblingtalk.com/images/site_icon4.jpg"></a></div>
<div class="text_c">Lorem ipsum </div>
<div class="rev">
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/grey-star.png"></a>
</div>

</div>
<div class="down_cont">
<div class="inner_left"> <h3>5.</h3> <a href="#"><img width="38" height="24" border="none" alt="img" src="http://webgamblingtalk.com/images/site_icon5.jpg"></a></div>
<div class="text_c">Lorem ipsum </div>
<div class="rev">
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/grey-star.png"></a>
</div>

</div>
<div class="down_cont">
<div class="inner_left"> <h3>6.</h3> <a href="#"><img width="38" height="24" border="none" alt="img" src="http://webgamblingtalk.com/images/site_icon6.jpg"></a></div>
<div class="text_c">Lorem ipsum </div>
<div class="rev">
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/grey-star.png"></a>
</div>

</div>
<div class="down_cont">
<div class="inner_left"> <h3>7.</h3> <a href="#"><img width="38" height="24" border="none" alt="img" src="http://webgamblingtalk.com/images/site_icon7.jpg"></a></div>
<div class="text_c">Lorem ipsum </div>
<div class="rev">
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/grey-star.png"></a>
</div>

</div>
<div class="down_cont" style="border:none;">
<div class="inner_left"> <h3>8.</h3> <a href="#"><img width="38" height="24" border="none" alt="img" src="http://webgamblingtalk.com/images/site_icon8.jpg"></a></div>
<div class="text_c">Lorem ipsum </div>
<div class="rev">
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/star.jpg"></a>
<a href="#"><img width="16" height="16" border="none" alt="img" src="http://webgamblingtalk.com/images/grey-star.png"></a>
</div>

</div>

</div>

<img class="right_banner" src="http://webgamblingtalk.com/images/right_bottom_ads.png">

<div class="best_poker_pennel">
<h1>Top Games</h1>

<div class="down_con2">
<img width="67" height="62" border="none" alt="img" src="http://webgamblingtalk.com/images/slot_img.jpg">

<div class="top_games_text">
<h3>Slots</h3>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mollis tempus </p>

</div>


</div>
<div class="down_con2">
<img width="67" height="62" border="none" alt="img" src="http://webgamblingtalk.com/images/slot_img.jpg">

<div class="top_games_text">
<h3>Scraps</h3>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mollis tempus </p>

</div>


</div>
<div class="down_con2">
<img width="67" height="62" border="none" alt="img" src="http://webgamblingtalk.com/images/slot_img.jpg">

<div class="top_games_text">
<h3>Black jack</h3>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mollis tempus </p>

</div>


</div>
<div class="down_con2" style="border:none;">
<img width="67" height="62" border="none" alt="img" src="http://webgamblingtalk.com/images/slot_img.jpg">

<div class="top_games_text">
<h3>Roulette</h3>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mollis tempus </p>
<a href="#" class="red_txt">VIEW ALL »</a>
</div>


</div>



</div> 



</div>-->




	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'gambling_blog' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'gambling_blog' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'gambling_blog' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'gambling_blog' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'gambling_blog' );
			}

			/*printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);*/
		?>
		<?php /*?><?php edit_post_link( __( 'Edit', 'gambling_blog' ), '<span class="edit-link">', '</span>' ); ?><?php */?>
        
        
        
        

		<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		<div id="author-info">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'gambling_blog_author_bio_avatar_size', 68 ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description">
				<h2><?php printf( esc_attr__( 'About %s', 'gambling_blog' ), get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'gambling_blog' ), get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
		</div><!-- #entry-author-info -->
		<?php endif; ?>
        
        
	</footer><!-- .entry-meta -->
</article>


<!-- #post-<?php the_ID(); ?> -->






