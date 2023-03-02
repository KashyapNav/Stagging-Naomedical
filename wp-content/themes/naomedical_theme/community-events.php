<?php
/**
 *Template Name: Community Events Template
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
        <div class="whats-new-banner community-banner">
            <div class="container">
                <div class="wnb-max">
                   <h1> Putting community first in all we do</h1>
                   <p>Nao Medical is a healthcare provider that puts people first—providing the best possible care to diverse communities in need. Even our team reflects the fantastic diversity of our New York neighborhoods. Easily find upcoming events and community projects we have planned here. </p>
                </div>
            </div><!--container-->
        </div>

        <div class="whatsnew_tab_content">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="press_max_div ajax-parent">
                        <div class="ajax-posts" class="row">
                        <?php 
                            $postsPerPage = 4;
                            $args = array(
                                'post_type' => 'community_events',
                                'post_status' => 'publish',
                                'posts_per_page' => -1
                            );
                            $the_query = new WP_Query( $args );

                            $args = array(
                                'post_type' => 'community_events',
                                'post_status' => 'publish',
                                'posts_per_page' => $postsPerPage
                            );
                            $arr_posts = new WP_Query( $args );                                    
                            $pr_last_page = $arr_posts->max_num_pages;
                            // pre($arr_posts->posts);
                            if ( $arr_posts->have_posts() ) :
                        
                                while ( $arr_posts->have_posts() ) :
                                    $arr_posts->the_post();
                                    $permalink = get_permalink();
                                    $post_thumbnail = get_the_post_thumbnail();
                                    $title = get_the_title();
                                    $date = get_the_date();
                        ?>
                                    <a href="<?php echo $permalink; ?>" class="press-max-link">
                                        <div class="col-md-12 col-sm-12 col-12 press-release-div">
                                            <div class="press_release_img">
                                                <?php
                                                if ( has_post_thumbnail() ) {
                                                    echo $post_thumbnail;
                                                } else {  ?>
                                                    <img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/assets/images/placeholder.png" alt="<?php the_title(); ?>">
                                                <?php
                                                } ?>
                                            </div>
                                            
                                            <div class="press_release_content community-release-div">
                                                <label><?php echo $date; ?></label>
                                                <h6><?php echo $title;?></h6>
                                                <!-- <div><?php the_content();?></div> -->
                                                <div class="community-release-max">
                                                    <?php $article_data = substr(get_the_content(), 0, 185); echo $article_data; ?>
                                                </div>
                                                <div class="">
                                                    <a href="<?php echo $permalink; ?>" class="press_readmore">Read More </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>                                
                        <?php if($the_query->found_posts > $postsPerPage) { ?>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="text-center">
                                <button class="btn btn-load-more more_posts" data-post_type="community_events" data-post_length="4">Load More</button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!--press-tab-closed-->
            </div>
        </div>



    </div><!-- content-area -->
</main>
<script>
jQuery(document).ready(function($){
	// var post_length = <?php echo $postsPerPage; ?>; // Post per page
	// var cat = $('#more_posts').data('category');
	var prPageNumber = 1;
	var mcPageNumber = 1;
	var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    
	var pr_last_page = "<?php echo $pr_last_page; ?>";
	var mc_last_page = "<?php echo $mc_last_page; ?>";

	function load_posts(post_type, post_length,el){

        if(post_type == 'press_release'){
            prPageNumber++;
            var str = '&post_type=' + post_type +'&pageNumber=' + prPageNumber + '&post_length=' + post_length + '&action=load_more_post_ajax';
        }
		if(post_type == 'media_coverage'){
            mcPageNumber++;
            var str = '&post_type=' + post_type +'&pageNumber=' + mcPageNumber + '&post_length=' + post_length + '&action=load_more_post_ajax';
        }
		
		$.ajax({
			type: "POST",
			dataType: "html",
			url: ajaxUrl, 
			data: str,
			success: function(data){
                console.log(data);
				var $data = $(data);
				if($data.length){
					$(el).closest(".ajax-parent").find('.ajax-posts').append($data);
					// console.log('last_page',last_page)
					// console.log('prPageNumber',prPageNumber)
					// console.log('mcPageNumber',mcPageNumber)
                    if(post_type == 'press_release'){
                        if(pr_last_page==prPageNumber){
                            $(el).hide();
                            // $("#more_posts").attr("disabled",true);
                        }else{
                            $(el).attr("disabled",false);
                        }
                    }
                    if(post_type == 'media_coverage'){
                        if(mc_last_page==mcPageNumber){
                            $(el).hide();
                            // $("#more_posts").attr("disabled",true);
                        }else{
                            $(el).attr("disabled",false);
                        }
                    }
				} else{
					$(el).hide();
					// $("#more_posts").attr("disabled",true);
				}
			},
			// error : function(jqXHR, textStatus, errorThrown) {
			// 	$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			// }

		});
		return false;
	}

	$(".more_posts").on("click",function(){ // When btn is pressed.
        var post_type = $(this).data('post_type');
        var post_length = $(this).data('post_length');
        console.log(post_type,'post_type');
        console.log(post_length,'post_length');
		$(this).attr("disabled",true); // Disable the button, temp.
		load_posts(post_type,post_length,this);
	});
});
</script>

<?php
get_footer();
?>