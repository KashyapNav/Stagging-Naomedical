<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package naomedical_theme
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="main-blog-list">
		<div class="container">
			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'naomedical_theme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			
			
			
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-12 col-sm-12 col-md-12">
					<div class="col-12 col-sm-12 col-md-12 top-blog-section">
						<div class="row">
							<div class="col-lg-7 col-md-12 col-sm-12 col-12">
								<h1><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1>
							</div>

							<div class="col-lg-5 col-md-12 col-sm-12 col-12">
								<div class="max-blog-search">
									<form role="search" method="get" action="<?php echo HOME_URL(); ?>" class="wp-block-search__button-inside wp-block-search__text-button aligncenter wp-block-search">
										<div class="wp-block-search__inside-wrapper" style="width: 100%;">
											<input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="Enter your topic" required="">
											<button type="submit" class="wp-block-search__button ">Search</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-12">
						<div class="row">
							<?php
							/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
