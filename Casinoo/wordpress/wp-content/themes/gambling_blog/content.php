<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since gambling_blog 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
        
        <?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
        <div class="main_blog_cont">
        
        
        <div class="main_blog_image_cont" style="  float: left;
    height: auto;
    width: 189px;">
   
			
            
            <div style="clear:both"></div>
            </div>
            
             
		<!-- .entry-content -->
		<?php endif; ?>
        
			<?php if ( is_sticky() ) : ?>
				<hgroup>
                
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<h3 class="entry-format"><?php _e( 'Featured', 'gambling_blog' ); ?></h3>
				</hgroup>
			<?php else : ?>
             <div class="main_blog_heading_cont" style="float: left;
    height: auto;
    width: 440px;">
    
    <style>.readlink
	{
	   color: #C60000;
    font-weight: bold;
    margin: 5px;
	float:left;
	}
	.readlink a
	{
	 color: #C60000;
    text-decoration: none;
	}
	</style>
	
  
          <h2>   <?php  the_title(); ?></h2>
             <h3>
				<?php gambling_blog_posted_on(); ?>			</h3>
                
             <?php /*?>   <?php   has_attachment(the_ID());?> <?php */?>
             
             <?php echo content(55); ?> 
           <?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'gambling_blog' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'gambling_blog' ) . '</span>', 'after' => '</div>' ) ); ?>
            
            
            
			<?php endif; ?>
            
            <footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'gambling_blog' ) );
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php //printf( __( '<span class="%1$s">Posted in</span> %2$s', 'gambling_blog' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				//$show_sep = true; ?>
			</span>
			<?php endif; // End if categories ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'gambling_blog' ) );
				if ( $tags_list ):
				if ( $show_sep ) : ?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'gambling_blog' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( comments_open() ) : ?>
			<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="k
			">' . __( 'No comments yet', 'gambling_blog' ) . '</span>', __( '<b>1</b> Reply', 'gambling_blog' ), __( '<b>%</b> Replies', 'gambling_blog' ) ); ?></span>
			<?php endif; // End if comments_open() ?>

			<?php /*?><?php edit_post_link( __( 'Edit', 'gambling_blog' ), '<span class="edit-link">', '</span>' ); ?><?php */?>
		</footer>
            
            
<div style="clear:both"></div>
			<?php if ( 'post' == get_post_type() ) : ?>
            
            
           
			<style>
			
			.main_blog_heading_cont img {
    float: left;
    margin: -38px 0 0;
}
.main_blog_heading_cont p {
    clear: both;
    color: #000000;
    font-family: Verdana,Geneva,sans-serif;
    font-size: 11px;
    font-weight: normal;
	  width: 685px;
}

.main_blog_heading_cont h3 {
    color: #191815;
    float: left;
    font-family: Tahoma,Geneva,sans-serif;
    font-size: 13px;
    font-weight: normal;
    margin-left: 157px;
    width: 360px;
}
.main_blog_heading_cont img {
    border: 1px solid #D2D2D2;
    float: left;
    height: 144px;
    margin: -53px 10px 0 0;
    padding: 5px;
    width: 135px;
}
.main_blog_heading_cont h2 {
    border-bottom: 1px dotted #3C3C3C;
    color: #0972B4;
    float: left;
    font-family: Tahoma,Geneva,sans-serif;
    font-size: 15px;
    font-weight: normal;
    margin-left: 156px;
    padding-bottom: 3px;
    width: 328px;
}
			
			.main_blog_heading_cont h3 span
			{
			font-weight:normal;
			}
            .main_blog_image_cont p img
			{
			float:left;
			
			
			}
             .main_blog_image_cont p {
			  float: left;
    width: 640px;
			 }
			 .entry-meta
			 {
			  color: #C60000;
			  font-weight:bold;
			  margin:5px;
			 }
			  .entry-meta a
			 {
			  color: #C60000;
    text-decoration: none;
			 }
			 
            </style>
         <!-- .entry-meta -->
			<?php endif; ?>

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
			<?php /*?>	<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'gambling_blog' ) . '</span>', _x( '1', 'comments number', 'gambling_blog' ), _x( '%', 'comments number', 'gambling_blog' ) ); ?><?php */?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		

		<!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
