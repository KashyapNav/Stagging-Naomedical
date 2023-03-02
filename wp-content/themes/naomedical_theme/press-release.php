<?php
/**
 *Template Name: Press Release Template
 *Template Post Type: post, page, product, whatsnew
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();
global $wp_query;

?>
<main id="primary" class="site-main" role="main"> 
    <div id="primary2" class="content-area">
        <div class="blog-det-section mt-5 pt-5" id="scroll_cont">
			<div class="container">	
				<div class="row m-0">
					<div class="col-lg-12 order-1 order-lg-5 col-md-12 col-12 ps-xl-3 pe-xl-5 blogSection  blogDetailsection press-release-detail" id="allBlog" >
						<div class="blogItem">
							<div id="top_section" class="row align-items-center m-0 mb-4">
								<div class="col-xl-6 col-lg-12 col-md-7 col-12 p-0 blogMeta">
									<!-- <span>Posted by <a href=""><?php the_author_link(); ?></a></span> -->
									<span>Published on (<?php echo get_the_date(); ?>)</span>
								</div>
								<div class="col-xl-6 col-lg-12 col-md-5 col-12 p-0 blogSocial text-end clearfix">
									<?= gt_get_post_view(); ?>
									<div class="dropdown">
										<button class="btn btn-secondary dropdown-toggle share_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Share
										</button>
										<ul class="dropdown-menu social_icon_inline" aria-labelledby="dropdownMenuButton1">
											<li class="tw"><a href="https://twitter.com/NaoMedical" target="_blank" title="Twitter">Twitter</a></li>
											<li class="in"><a href="https://www.linkedin.com/company/naomedical" target="_blank" title="Linkedin">Linkedin</a></li>
											<li class="ins"><a href="https://www.instagram.com/naomedical/" target="_blank" title="Instagram">Instagram</a></li>
										</ul>
									</div>
									<!-- <button type="button" class="share_btn">Share</button> -->
								</div>
							</div>
							<div class="row m-0" id="blogPrintsection">
								<div class="col-sm-12 p-0 innerblogSection clearfix">
									<h1><?php the_title(); ?></h1>
									<div class="col-md-12 text-center p-0 Blogimg">
										<?php the_post_thumbnail( ); ?>
									</div>
									<div class="col-md-12 col-xs-12 para p-0">
										<!-- <?php the_content(); ?> -->
                                        <div class="top_service_top_section">
                                            <?php 
                                                while ( have_posts() ) : the_post();
                                                    the_content();
                                                endwhile; // End of the loop.
                                            ?>
                                        </div>
									</div>							
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>        
    </div><!-- content-area -->
</main>

<?php
get_footer();
?>