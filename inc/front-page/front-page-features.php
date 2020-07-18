<?php
/**
 * Front Page Features
 *
 * Displays in Corporate template.
 *
 * @package Theme Freesia
 * @subpackage Magbook
 * @since Magbook 1.0
 */
/* Frontpage Product Featured Brands */
add_action('magbook_display_front_page_feature_news','magbook_frontpage_feature_news');
function magbook_frontpage_feature_news(){
	$magbook_settings = magbook_get_theme_options();
	$entry_format_meta_blog = $magbook_settings['magbook_entry_meta_blog'];
	$magbook_feature_news_title = $magbook_settings['magbook_feature_news_title'];
	$magbook_disable_feature_news = $magbook_settings['magbook_disable_feature_news'];
	$query = new WP_Query(array(
			'posts_per_page' =>  intval($magbook_settings['magbook_total_feature_news']),
			'post_type'					=> 'partner',
			'category_name' => esc_attr($magbook_settings['magbook_featured_news_category']),
	));
	if($magbook_disable_feature_news !=1){ ?>
		<div class="feature-news-box">
						<div class="wrap">
							<?php if($magbook_feature_news_title !=''){ ?> 
							<div class="feature-news-header">
								<span class="h2 feature-news-title">Our Partners</span>
							</div>
							<?php } ?> 
							<div class="feature-news-slider">
								<ul class="slides partner-slider">
									<?php while ($query->have_posts()):$query->the_post(); ?>
									<li>
										<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
											<?php if(has_post_thumbnail() ){ ?>
											<figure class="post-featured-image">
												<?php
													$url = '#';
													if (get_field('url')) {
														$url = get_field('url');
													}
													$newtab = "_self";
													if (get_field('new_tab') && get_field('url')) {
														$newtab = "_blank";
													}
													$rel = get_field('link_rel');
												?>
												<a title="<?php the_title_attribute(); ?>" rel="<?php echo $rel; ?>" target="<?php echo $newtab; ?>" href="<?php echo $url; ?>"><?php the_post_thumbnail('magbook-featured-image'); ?></a>
											</figure>
											<!-- end .post-featured-image -->
											<?php } ?>
											<header class="entry-header">		
												<span class="entry-title h2">
													<a title="<?php the_title_attribute(); ?>" rel="<?php echo $rel; ?>" target="<?php echo $newtab; ?>" href="<?php echo $url; ?>"><?php the_title(); ?></a>
												</span>
												<!-- end.entry-title -->
												<?php if($entry_format_meta_blog != 'hide-meta' ){
													echo  '<div class="entry-meta">';
													echo  '</div> <!-- end .entry-meta -->';
												} ?>
											</header>
											<!-- end .entry-header -->
										</article>
										<!-- end .post -->
									</li>
								<?php endwhile;
								wp_reset_postdata(); ?>
								</ul>
							</div>
							<!-- end .feature-news-slider -->
						</div>
						<!-- end .wrap -->
		</div> <!-- end .feature-news-box -->
<?php }
wp_reset_postdata();
}