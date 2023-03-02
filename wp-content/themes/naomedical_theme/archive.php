<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package naomedical_theme
 */
global $wp_query;
$search_terms = !empty($_REQUEST['blog_term'])?$_REQUEST['blog_term']:'';
$current_category = get_queried_object(); ////getting current category
$cat_id = $current_category->cat_ID;
get_header();
?>

	<main id="primary" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<!-- <header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header> -->
			<!-- .page-header -->

<div class="main-blog-list">
<div class="container">
	<div class="blog-section col-12 col-sm-12 col-md-12">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-4 col-lg-3">
				<div class="cate-div">
					<div class="blog-categories-list">
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
					</div>
				</div>
			</div>
			
			<div class="col-12 col-sm-12 col-md-8 col-lg-9">
				<div class="col-12 col-sm-12 col-md-12">
					<div class="col-12 col-sm-12 col-md-12 top-blog-section">
						<div class="row">
							<div class="col-lg-7 col-md-12 col-sm-12 col-12">
								<h1><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1>
							</div>

							<div class="col-lg-5 col-md-12 col-sm-12 col-12">
								<div class="max-blog-search">
										<form role="search" method="get" action="<?php echo HOME_URL('blog'); ?>" class="wp-block-search__button-inside wp-block-search__text-button aligncenter wp-block-search">
											<div class="wp-block-search__inside-wrapper" style="width: 100%;">
												<input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="blog_term" value="<?php echo ($search_terms)?wp_unslash($search_terms):''; ?>" placeholder="Enter your topic" required="">
												<button type="submit" class="wp-block-search__button ">Search</button>
											</div>
										</form>
									<!-- <form role="search" method="get" action="<?php echo HOME_URL(); ?>" class="wp-block-search__button-inside wp-block-search__text-button aligncenter wp-block-search">
										<div class="wp-block-search__inside-wrapper" style="width: 100%;">
											<input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="Enter your topic" required="">
											<button type="submit" class="wp-block-search__button ">Search</button>
										</div>
									</form> -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-12">
						<div id="ajax-posts" class="row">			
						<?php
							$postsPerPage = 9;
							$args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => -1,
								'cat' =>  $cat_id// current category ID
							);
							$the_query = new WP_Query( $args );
							
							$args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => $postsPerPage,
								'cat' =>  $cat_id// current category ID
							);
							$arr_posts = new WP_Query( $args );
							$last_page = $arr_posts->max_num_pages;
							if ( $arr_posts->have_posts() ) :
							  
								while ( $arr_posts->have_posts() ) :
									$arr_posts->the_post();
									
									get_template_part( 'template-parts/content', 'category');
									?>
									<?php
								endwhile;
							endif;
							wp_reset_postdata();
							?>
						</div>
						<div class="text-center">
						<?php if($the_query->found_posts > 9) { ?>
							<button id="more_posts" data-category="<?php echo $cat_id; ?>" class="btn btn-os-loadmr">Load More</button>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>    
</div>


		<?php	//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

	<script>
jQuery(document).ready(function($){
	var ppp = 9; // Post per page
	var cat = $('#more_posts').data('category');
	var pageNumber = 1;
	var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
	var last_page = "<?php echo $last_page; ?>";

	function load_posts(){
		pageNumber++;
		var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
		$.ajax({
			type: "POST",
			dataType: "html",
			url: ajaxUrl, 
			data: str,
			success: function(data){
				var $data = $(data);
				if($data.length){
					$("#ajax-posts").append($data);
					// console.log(last_page)
					// console.log(pageNumber)
					if(last_page==pageNumber){
						$("#more_posts").hide();
						// $("#more_posts").attr("disabled",true);
					}else{
						$("#more_posts").attr("disabled",false);
					}
				} else{
					$("#more_posts").hide();
					// $("#more_posts").attr("disabled",true);
				}
			},
			error : function(jqXHR, textStatus, errorThrown) {
				$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}

		});
		return false;
	}

	$("#more_posts").on("click",function(){ // When btn is pressed.
		$("#more_posts").attr("disabled",true); // Disable the button, temp.
		load_posts();
	});
});
</script>
<?php
get_sidebar();
get_footer();
?>