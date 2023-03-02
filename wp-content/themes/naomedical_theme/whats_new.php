<?php
/**
 *Template Name: Whats new Template
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
        <div class="whats-new-banner">
            <div class="container">
                <div class="wnb-max">
                   <h1> What’s New, <i class="icon-nao"></i> </h1>
                   <p>We’re always on the go here at Nao Medical, to keep up with us, check out all of our media resources and more here</p>

                   <div class="whatsnew_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="press-tab" data-bs-toggle="tab" data-bs-target="#press" type="button" role="tab" aria-controls="press" aria-selected="true">Press Releases</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab" aria-controls="media" aria-selected="false">Media Coverage</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="partnership-tab" data-bs-toggle="tab" data-bs-target="#partnership" type="button" role="tab" aria-controls="partnership" aria-selected="false">Nao Partnership</button>
                            </li>
                        </ul>
                   </div>
                </div>
            </div><!--container-->
        </div>

        <div class="whatsnew_tab_content">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="press" role="tabpanel" aria-labelledby="press-tab">

                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="whatsnew_tab_title">
                                <h2>Press Releases</h2>
                            </div>

                            <div class="press_max_div ajax-parent">
                                <div class="ajax-posts" class="row">
                                <?php 
                                    $postsPerPage = 4;
                                    $args = array(
                                        'post_type' => 'press_release',
                                        'post_status' => 'publish',
                                        'posts_per_page' => -1
                                    );
                                    $the_query = new WP_Query( $args );

                                    $args = array(
                                        'post_type' => 'press_release',
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
                                                    
                                                    <div class="press_release_content">
                                                        <label><?php echo $date; ?></label>
                                                        <p><?php echo $title;?></p>
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
                                        <button class="btn btn-load-more more_posts" data-post_type="press_release" data-post_length="4">Load More</button>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!--press-tab-closed-->
                    
                    <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="whatsnew_tab_title">
                                <h2>Media Coverage</h2>
                            </div>
                        </div>

                        <div class="max-media-coverage ajax-parent">

                            <div class="ajax-posts" class="row">
                                <?php 
                                    $postsPerPage = 12;
                                    $args = array(
                                        'post_type' => 'media_coverage',
                                        'post_status' => 'publish',
                                        'posts_per_page' => -1
                                    );
                                    $the_query = new WP_Query( $args );

                                    $args = array(
                                        'post_type' => 'media_coverage',
                                        'post_status' => 'publish',
                                        'posts_per_page' => $postsPerPage
                                    );
                                    $arr_posts = new WP_Query( $args );                                    
							        $mc_last_page = $arr_posts->max_num_pages;
                                    // pre($arr_posts->posts);
                                    $i = 0;
                                    if ( $arr_posts->have_posts() ) :	?>					  
                                        <div class="col-md-12 col-sm-12 col-12 media_coverage_list">
                                            <div class="row">
                                        <?php
                                        while ( $arr_posts->have_posts() ) :
                                            $arr_posts->the_post();
                                            $post = $arr_posts->post;
                                            $media_name 		= !empty(get_post_meta( $post->ID, 'media_name', true )) ? get_post_meta( $post->ID, 'media_name', true ) : '';
                                            $link 		= !empty(get_post_meta( $post->ID, 'link', true )) ? get_post_meta( $post->ID, 'link', true ) : '';
                                            // pre($arr_posts->post);
                                            $permalink = get_permalink();
                                            $post_thumbnail = get_the_post_thumbnail();
                                            $title = get_the_title();
                                            $date = get_the_date(); ?>
                                            <?php if($i % 3 == 0 && $i != 0) { ?>
                                                </div></div><div class="col-md-12 col-sm-12 col-12 media_coverage_list">
                                                <div class="row">
                                                <?php } ?>
                                            <div class="col-md-4 col-sm-12 col-12">
                                                <a href="<?php echo $link; ?>" target="_blank">
                                                    <div class="media_coverage_content">
                                                        <label><?php echo $media_name;?></label>
                                                        <p><?php echo $title; ?></p>
                                                        <div>
                                                            <a href="<?php echo $link; ?>" class="press_readmore" target="_blank">Read More</a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php if($i % 3 == 0) { ?>
                                                                                     
                                            <?php }
                                            $i++;
								        endwhile; ?>
                                        </div></div>
							        <?php endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>                                
                                
                            <?php if($the_query->found_posts > $postsPerPage) { ?>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button class="btn btn-load-more more_posts" data-post_type="media_coverage" data-post_length="12">Load More</button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                    <!--media-tab-closed-->

                    <div class="tab-pane fade" id="partnership" role="tabpanel" aria-labelledby="partnership-tab">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="whatsnew_tab_title">
                                <h2>Nao Partnership</h2>
                            </div>
                        </div>
                        <div class="max-partner-nao">
                        <?php 
                                    
                        $args = array(
                            'post_type' => 'nao_partnership',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                        );
                        $the_query = new WP_Query( $args );

                        $args = array(
                            'post_type' => 'nao_partnership',
                            'post_status' => 'publish',
                            'posts_per_page' => $postsPerPage
                        );
                        $arr_posts = new WP_Query( $args );                                    
                        $pn_last_page = $arr_posts->max_num_pages;
                        // pre($arr_posts->posts);
                        $i = 0;
                        if ( $arr_posts->have_posts() ) :	
                            while ( $arr_posts->have_posts() ) :
                                $arr_posts->the_post();
                                $post = $arr_posts->post;
                                // pre($post);
                                $brand 		= !empty(get_post_meta( $post->ID, 'brand', true )) ? get_post_meta( $post->ID, 'brand', true ) : '';
                                $partner_logo 		= !empty(get_post_meta( $post->ID, 'partner_logo', true )) ? get_post_meta( $post->ID, 'partner_logo', true ) : '';
                                $youtube_video_link 		= !empty(get_post_meta( $post->ID, 'youtube_video_link', true )) ? get_post_meta( $post->ID, 'youtube_video_link', true ) : '';
                                $permalink = get_permalink();
                                $post_thumbnail = get_the_post_thumbnail();
                                $title = get_the_title();
                                $date = get_the_date(); ?>
                                <div class="col-md-12 col-sm-12 col-12 nao-patnership-div">
                                    <div class="col-md-12 col-sm-12 col-12 nao-patnership-top">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-8">
                                                <h3><?php echo $title; ?></h3>
                                                <p><?php echo $brand; ?></p>
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-4">
                                                <div class="text-right">
                                                    <?php
                                                    if ($partner_logo) { ?>
                                                        <img class="img-fluid" src="<?php echo wp_get_attachment_url($partner_logo); ?>" alt="<?php the_title(); ?>">
                                                    <?php 
                                                    } 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="partneship-video">
                                        <div class="ratio ratio-16x9">
                                            <iframe width="420" height="315" src="<?php echo $youtube_video_link; ?>" title="" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                $i++;
                            endwhile; ?>
                        <?php endif;
                        wp_reset_postdata();
                        ?>
                            <!-- <div class="col-md-12 col-sm-12 col-12">
                                <div class="text-center">
                                    <button class="btn btn-load-more">Load More</button>
                                </div>
                            </div> -->

                        </div>


                    </div>
                    <!--partnership-tab-closed-->

                </div>
                
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