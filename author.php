<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Freesia
 * @subpackage Magbook
 * @since Magbook 1.0
 */

get_header(); ?>
<div class="wrap wrap-main">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php 
			if( have_posts() ) { ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
                    ?>
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
				</header><!-- .page-header -->
			<?php	while(have_posts() ) {
					the_post();
					get_template_part( 'content', get_post_format() );
				}
			}
			else { ?>
			<h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'magbook' ); ?> </h2>
			<?php }
			get_template_part( 'pagination', 'none' ); ?>
		</main><!-- end #main -->
		
	</div> <!-- #primary -->
<?php
get_sidebar();
?>
</div><!-- end .wrap -->
<?php
get_footer();