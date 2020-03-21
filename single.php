<?php
/**
 * The template for displaying all single posts.
 *
 * @package Theme Freesia
 * @subpackage Magbook
 * @since Magbook 1.0
 */
get_header();
$magbook_settings = magbook_get_theme_options();
$magbook_display_page_single_featured_image = $magbook_settings['magbook_display_page_single_featured_image']; ?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php global $magbook_settings;
			while( have_posts() ) {
				the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
					<?php
					$magbook_entry_meta_single = $magbook_settings['magbook_entry_meta_single']; ?>
					<header class="entry-header">
						<?php if($magbook_entry_meta_single!='hide'){ ?>
							<?php
								if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
								}
							?>
							<?php } ?>
							<h1 class="entry-title"><?php the_title();?></h1> <!-- end.entry-title -->
							<?php if($magbook_entry_meta_single!='hide'){
								echo  '<div class="entry-meta">'; ?>
								<span class="entry-author">
									Penulis: <a class="auth-name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
								</span>
								<?php printf( '<span class="posted-on"><a href="%1$s" title="%2$s"><i class="fa fa-calendar-o"></i> %3$s</a></span>',
									esc_url(get_the_permalink()),
									esc_attr( get_the_time(get_option( 'date_format' )) ),
									esc_attr( get_the_time(get_option( 'date_format' )) )
								);
								if ( comments_open()) { ?>
										<span class="comments">
										<?php comments_popup_link( __( '<i class="fa fa-comment-o"></i> No Comments', 'magbook' ), __( '<i class="fa fa-comment-o"></i> 1 Comment', 'magbook' ), __( '<i class="fa fa-comment-o"></i> % Comments', 'magbook' ), '', __( 'Comments Off', 'magbook' ) ); ?> </span>
								<?php }

								$tag_list = get_the_tag_list();
								$format = get_post_format();
								if ( current_theme_supports( 'post-formats', $format ) ) {
									printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
									sprintf( ''),
									esc_url( get_post_format_link( $format ) ),
									get_post_format_string( $format )
									);
								}
								if(!empty($tag_list)){ ?>
									<span class="tag-links">
										<?php echo get_the_tag_list("", ", "); ?>
									</span> <!-- end .tag-links -->
								<?php }
								echo  '</div> <!-- end .entry-meta -->';?>
							<div class="entry-image">
							<?php if(has_post_thumbnail() && $magbook_display_page_single_featured_image == 0 ){ ?>
								<div class="post-image-content"> 
									<figure class="post-featured-image">
										<?php the_post_thumbnail(); ?>
									</figure>
								</div><!-- end.post-image-content -->
							<?php }
							echo '</div>';
							} ?>
					</header> <!-- end .entry-header -->
					<div class="entry-content">
							<?php the_content(); ?>			
					</div><!-- end .entry-content -->
					<?php wp_link_pages( array( 
						'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.esc_html__( 'Pages:', 'magbook' ),
						'after'             => '</div>',
						'link_before'       => '<span>',
						'link_after'        => '</span>',
						'pagelink'          => '%',
						'echo'              => 1
					) ); ?>
				</article><!-- end .post -->
				<div class="author-info-box">
					<a class="author-avatar" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 96, '', get_the_author(), array() ) ?>
					</a>
					<div class="author-desc">
						<a class="auth-name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
							<?php echo get_the_author(); ?>
						</a>
						<div class="auth-bio">
							<?php echo get_the_author_meta( 'description' ) ?>
						</div>
						<div class="social-links clearfix">
							<ul>
								<?php
								$authorID = get_the_author_meta('ID');
								$instagram = get_the_author_meta('instagram', $authorID);
								$linkedin = get_the_author_meta('linkedin', $authorID);
								$facebook = get_the_author_meta('facebook', $authorID);
								$twitter = get_the_author_meta('twitter', $authorID);
								$soundcloud = get_the_author_meta('soundcloud', $authorID);
								$youtube = get_the_author_meta('youtube', $authorID);
								$pinterest = get_the_author_meta('pinterest', $authorID);
								if ($instagram) {
									echo '<li class="menu-item"><a href="'.$instagram.'" target="_blank" rel="nofollow"><span class="screen-reader-text">instagram</span></a></li>';
								}
								if ($facebook) {
									echo '<li class="menu-item"><a href="'.$facebook.'" target="_blank" rel="nofollow"><span class="screen-reader-text">facebook</span></a></li>';
								}
								if ($twitter) {
									echo '<li class="menu-item"><a href="'.$twitter.'" target="_blank" rel="nofollow"><span class="screen-reader-text">twitter</span></a></li>';
								}
								if ($linkedin) {
									echo '<li class="menu-item"><a href="'.$linkedin.'" target="_blank" rel="nofollow"><span class="screen-reader-text">linkedin</span></a></li>';
								}
								if ($youtube) {
									echo '<li class="menu-item"><a href="'.$youtube.'" target="_blank" rel="nofollow"><span class="screen-reader-text">youtube</span></a></li>';
								}
								if ($soundcloud) {
									echo '<li class="menu-item"><a href="'.$soundcloud.'" target="_blank" rel="nofollow"><span class="screen-reader-text">soundcloud</span></a></li>';
								}
								if ($pinterest) {
									echo '<li class="menu-item"><a href="'.$pinterest.'" target="_blank" rel="nofollow"><span class="screen-reader-text">pinterest</span></a></li>';
								}
								?>
							</ul>
						</div>
					</div>
					<div style="clear: both;"></div>
				</div>
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'magbook' ),
							) );
				} elseif ( is_singular( 'post' ) ) {
				the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'magbook' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'magbook' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'magbook' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'magbook' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				}
			} ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
<?php
get_sidebar();
?>
</div><!-- end .wrap -->
<?php
get_footer();