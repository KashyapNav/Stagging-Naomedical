<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package naomedical_theme
 */
global $wp_query;

$args = array(  
	'post_type' => 'blog', 
	'posts_per_page' => 2, 
	'status'    => 'published',
	'meta_query' => array(
		array(
			'key' => 'doctorname', 
			'value' => 'true'
		),
	)
);
$new_query = new WP_Query($args); 
//pre($new_query->posts);
?>


<div class="blog-det-section mt-5" id="scroll_cont">
	<div class="container">	
		<div class="row m-0">
			<div class="col-lg-3 order-5 order-lg-1 col-md-12 col-12 leftBlog pe-xl-5" >
				<div class="categories_block">
					<ul>
						<?php 
							$argss = array(
								'show_count' => 0,
								'depth' => 3,
								'title_li' => '<h2 class="sidebar-title"></h2>',
								
								'show_option_none'    => __( 'No categories' ),
								'orderby' => 'name',
								'taxonomy' => 'category' // taxonomy name
							);
							wp_list_categories($argss);
						?>
					</ul>
				</div>
				<div class="social_block">
					<ul class="socialIcons">
						<li class="tw"><a href="https://twitter.com/NaoMedical" target="_blank" title="Twitter">Twitter</a></li>
						<li class="in"><a href="https://www.linkedin.com/company/naomedical" target="_blank" title="Linkedin">Linkedin</a></li>
						<li class="ins"><a href="https://www.instagram.com/naomedical/" target="_blank" title="Instagram">Instagram</a></li>
					</ul>
				</div>
				<div class="tags_block">
					<?php if( has_tag() ) : ?>
						<h3>Tags</h3>
						<?php echo get_the_tag_list(); // Display tags as links ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-lg-9 order-1 order-lg-5 col-md-12 col-12 ps-xl-3 pe-xl-5 blogSection  blogDetailsection" id="allBlog" >
				<div class="blogItem">
					<div id="top_section" class="row align-items-center author-new-div m-0 mb-5">
						<div class="col-xl-7 col-lg-7 col-md-7 col-12 p-0 blogMeta">
							<div>
								<ul class="author-dt">
									<li class="author-img-li">
											<?php
											$img_id = get_post_meta( get_the_ID(),  "second_featured_img", true);
												$img_url=  wp_get_attachment_image_src($img_id);
												if(!empty($img_url)){
											?>
										<div class="author-img-div verified-post">
										
											<img src="<?php echo $img_url[0]; ?>" class="img-fluid author-pt ">
											
										</div>
										<?php } ?>
										<div class="author-review-dc">
										<?php $doctor_name = get_post_meta( get_the_ID(),  "_doctor_name", true); 
											if(!empty($doctor_name)){
											?>
										
											<div>Medically reviewed <br> by <b><?php echo $doctor_name; ?></b></div>
											<?php } ?>
											<div><span>Posted by <a href=""><?php the_author_link(); ?></a></span></div>
										</div>
									</li>

									<li class="update-author-date">
											Updated on <br> <?php echo get_the_date(); ?>
									</li>
								</ul>
							</div>
							
						</div>
						<div class="col-xl-5 col-lg-5 col-md-5 col-12 p-0 blogSocial text-end clearfix">
							<?= gt_get_post_view(); ?>
							<button type="button" class="print_btn" onclick='myApp.printDiv()' >Print</button>
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle share_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									Share
								</button>
								<ul class="dropdown-menu social_icon_inline" aria-labelledby="dropdownMenuButton1">
									<li class="tw"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Twitter">Twitter</a></li>
									<li class="in"><a href="http://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>" target="_blank" title="Linkedin">Linkedin</a></li>
									<li class="fbb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Facebook">Facebook</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-12">
					<div class="row">
						<div class="col-lg-9 order-1 order-lg-5 col-md-12 col-12 ps-xl-3 pe-xl-5">
							<div class="col-xl-12 col-lg-12 col-md-12 col-12 p-0 m-0" id="blogPrintsection">
								<div class="col-sm-12 p-0 innerblogSection clearfix">
									<h1><?php the_title(); ?></h1>
									<div class="col-md-12 text-center p-0 Blogimg">
										<?php the_post_thumbnail( ); ?>
									</div>
									<div class="col-md-12 col-xs-12 para p-0">
										<?php the_content(); ?>
									</div>							
								</div>
							</div>
						</div>

						<div class="col-lg-3 order-5 order-lg-5 col-md-12 col-12 ps-xl-3">
							<div class="relatedposts">
								<h2>Related Articles</h2>
								<ul> 
								<?php
									$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
									if( $related ) foreach( $related as $post ) {
									setup_postdata($post); ?>
				
											<li class="mb-2">
												<div class="row align-items-center">
													<!-- <div class="col-md-4 rel_blog_img">
														<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
															<?php if ( has_post_thumbnail() ) {
																the_post_thumbnail();
																} else { ?>
																<img src="<?php bloginfo('template_directory'); ?>/assets/images/placeholder.png" alt="<?php the_title(); ?>" />
															<?php } ?>
														</a>
													</div> -->
													<div class="col-md-12 rel_blog_title">
														<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
													</div>
												</div>
											</li> 
									<?php }
									wp_reset_postdata(); ?>
								</ul>  
							</div>
						</div>
					</div>
				</div>

				
			</div>
			
		</div>
	</div>
</div>

<script>
    var myApp = new function () {
        this.printDiv = function () {
            // Store DIV contents in the variable.
			var windowWidth = 1000;
			var windowHeight = 1000;
			var left = (screen.width - windowWidth) / 2;
            var div = document.getElementById('blogPrintsection');
			// var topDiv = document.getElementById('top_section');
			// topDiv.style.display = "none";
            // Create a window object.
            var win = window.open('', '', 'width=' + windowWidth + ', height=' + windowHeight + ', top=' + top + ', left=' + left); // Open the window. Its a popup window.
            win.document.write(div.outerHTML);     // Write contents in the new window.
            win.document.close();
            win.print();       // Finally, print the contents.
        }
    }
</script>