<?php 
    /* 
        Template Name: Blog Template 
    */
global $wp_query;
$search_terms = !empty($_REQUEST['blog_term'])?$_REQUEST['blog_term']:'';


?>

<?php get_header(); ?> 


<div class="main-blog-list">
<div class="container">
	<div class="blog-section col-12 col-sm-12 col-md-12">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-4 col-lg-3">
				<div class="cate-div">
					<div class="blog-categories-list">
						<ul>
							<?php 
								$argss = array(
									'show_count' => 1,
									'depth' => 3,
									'title_li' => '<h2 class="sidebar-title">Categories</h2>',
									
									'show_option_none'    => __( 'No categories' ),
									'orderby' => 'name',
									'taxonomy' => 'category' // taxonomy name
								);
								wp_list_categories($argss);
							?>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-sm-12 col-md-8 col-lg-9">
				<?php if(!$wp_query->query_vars['paged'] >=1 &&  empty($search_terms)) { ?>
					<div class="col-12 col-sm-12 col-md-12 main-blog-list">

						<div class="col-12 col-sm-12 col-md-12 top-blog-section">
							<div class="row">
								<div class="col-lg-7 col-md-7 col-sm-12 col-12">
									<h1 style="margin-bottom: 30px;">Most Popular Blogs</h1>
								</div>

								<div class="col-lg-5 col-md-5 col-sm-12 col-12">
									<div class="max-blog-search">
										<form role="search" method="get" action="<?php echo HOME_URL('blog'); ?>" class="wp-block-search__button-inside wp-block-search__text-button aligncenter wp-block-search">
											<div class="wp-block-search__inside-wrapper" style="width: 100%;">
												<input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="blog_term" value="<?php echo ($search_terms)? wp_unslash($search_terms):''; ?>" placeholder="Enter your topic" required="">
												<button type="submit" class="wp-block-search__button ">Search</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

					

						
						<div class="col-12 col-sm-12 col-md-12 most_blog_grid">
							<div class="row">

								<?php 
										$paged = ($wp_query->query_vars['paged'] ) ? $wp_query->query_vars['paged'] : 1;
										$args = array(
											'post_type'=> 'post',
											'orderby'    => 'date',
											'post_status' => 'publish',
											'order'    => 'DESC',					
											'posts_per_page' => 6
										);
									
										$result = new WP_Query( $args );
									
										if ( $result-> have_posts() ) : 
											while ( $result->have_posts() ) : $result->the_post(); ?>

											<div class="col-12 col-sm-12 col-md-6 col-lg-4 most-blog-pad">
												<div id="post-<?php get_the_ID(); ?>" <?php post_class('blog blog-mst-group'); ?>>
													<div class="blog-image">
														<a href="<?php the_permalink(); ?>">
															<?php if ( has_post_thumbnail() ) {
																the_post_thumbnail();
																} else { ?>
																<img src="<?php bloginfo('template_directory'); ?>/assets/images/placeholder.png" alt="<?php the_title(); ?>" />
														<?php } ?>
														</a>	
													</div>

													<div class="blog-title">
														<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
													</div>
													
													<div class="blog-description">
														<p>
															<?php echo wp_trim_words(get_the_content(), 24, '...');?>	
														</p>
													</div>
													<div class="row align-items-center">
														<div class="col-lg-8 col-md-12 col-sm-8 col-8"> 
															<div class="green_blog_btn">
																<!-- <?php the_author_posts_link(); ?> -->
																<?php echo get_the_author(); ?>
															</div>
														</div>
														<div class="col-lg-4  col-md-12  col-sm-4 col-4  text-end  share_block">
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
											</div>

											<?php 
												endwhile; 
											//custom_pagination($result->max_num_pages,"",$paged);
											//wp_reset_postdata();
											endif;  
											?> 

							</div>
						</div>
					</div>
				<?php } ?>

				<!--all-blogs-->

		<div class="col-12 col-sm-12 col-md-12 allblog-div">
			<!-- <div class="col-12 col-sm-12 col-md-12 allblog-head">
				<h3>All Blogs</h3>
			</div> -->

			<div class="col-12 col-sm-12 col-md-12 top-blog-section">
				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-12 col-12">
						<h1>All Blogs</h1>
					</div>

					<div class="col-lg-5 col-md-5 col-sm-12 col-12">
						<div class="max-blog-search">
							<form role="search" method="get" action="<?php echo HOME_URL('blog'); ?>" class="wp-block-search__button-inside wp-block-search__text-button aligncenter wp-block-search">
								<div class="wp-block-search__inside-wrapper" style="width: 100%;">
									<input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="blog_term" value="<?php echo ($search_terms)?wp_unslash($search_terms):''; ?>" placeholder="Enter your topic" required="">
									<button type="submit" class="wp-block-search__button ">Search</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<?php 
					$paged = ($wp_query->query_vars['paged'] ) ? $wp_query->query_vars['paged'] : 1;
					$args = array(
						'post_type'=> 'post',
						'orderby'    => 'date',
						'post_status' => 'publish',
						'order'    => 'ASC',
						'paged' => $paged,
						'page' => $paged,					
						'posts_per_page' => 5,
						's' => $search_terms
					);
				
					$result = new WP_Query( $args );
				
					if ( $result-> have_posts() ) : 
					while ( $result->have_posts() ) : $result->the_post(); ?>

					<div class="col-12 col-sm-12 col-md-12 all-blog-list">
						<div class="alignwide">
							<div id="post-<?php get_the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 col-12 blog'); ?>>
								<div class="row">
									<div class="col-md-3 col-sm-12 col-12 blog-image">
										<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail();
											} else { ?>
											<img src="<?php bloginfo('template_directory'); ?>/assets/images/placeholder.png" alt="<?php the_title(); ?>" />
										<?php } ?>
										</a>									
									</div>

									<div class="col-md-9 col-sm-12 col-12 blog-left-pad">
										<div class="blog-title">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										</div>
									
										<div class="blog-description">
											<p><?php echo wp_trim_words(get_the_content(),30, '...');?>	</p>
											<div class="blogShare">
													<div class="green_blog_btn">
														<!-- <?php the_author_posts_link(); ?> -->
														<?php echo get_the_author(); ?> 
													</div>
												<div class="share_block">
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
											<p class="wp-block-post-excerpt__more-text">
												<a class="wp-block-post-excerpt__more-link" href="<?php the_permalink(); ?>" data-wpel-link="internal">View More</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php 
						endwhile; 
					custom_pagination($result->max_num_pages,"",$paged); 
					wp_reset_postdata();
					else : ?> 
						<h2 class="no-search-result-post-title"> <span class="search_icon"></span>Sorry, No results found!</h2>
					<?php endif;  
					?> 
			</div>
		</div>


			</div>
		</div>
	</div>

		
	</div>
</div>
<?php get_footer(); ?>