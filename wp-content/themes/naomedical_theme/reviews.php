<?php
/**
 *Template Name: Reviews
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();

global $wpdb;
$limit = 12;
$table_name = $wpdb->prefix . 'google_reviews'; 
$total = $wpdb->get_var("SELECT count(*) FROM $table_name WHERE review<>'' AND rating IN(4,5)");
$pageCount = ceil($total/$limit);
$records = $wpdb->get_results("SELECT * FROM $table_name WHERE review<>'' AND rating IN(4,5) ORDER BY date DESC LIMIT $limit");

// pre($records);

?>

<main id="primary" class="site-main" role="main"> 
   
    <div id="primary1" class="content-area main-service-overall ourservices-overall">
        <!--customer-review-section-->

        <div class="reviews-grid__wrapper">
            <div class="container">
            <?php if ( is_plugin_active( 'nao-google-review/nao-google-review.php' ) ) { ?>
                <div class="reviews-grid__wrapper_title">
                    <h3>Customer Reviews</h3>
                </div>
                <div class="google-reviews-grid row" id="review_list">
                    <?php if($records){ foreach($records as $review){ ?>
                        <div class="review-grid-item col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="review-grid-item-inner">
                                <div class="grs-user-avatar"></div>
                                <h3 class="grs-name"><?php echo $review->owner; ?><span><?php echo $review->location; ?></span></h3>
                                <div class="ssb-review-list">
                                    <ul>
                                        <li class="ss-ratings">
                                            <div id="fixture">
                                            <span class="stars-container stars-<?php echo $review->rating;?>"></span>
                                            </div>
                                        </li>
                                        <li class="grs-reviewr-nm"><?php echo date("F d, Y h:i A",strtotime($review->date)); ?></li>
                                    </ul>
                                </div>
                                <div class="grs-review-txt-height">
                                    <div class="grs-review-toggle os-review-toggle"> 
                                        <p><?php echo $review->review; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
                <?php if($records){ ?>
                    <div class="reviews-grid__button text-center">
                        <input type="hidden" name="limit" id="limit" value="<?php echo $limit; ?>"/>
                        <button class="btn btn-os-loadmr" id="loadMore">Load More</button> 
                    </div>
                <?php } else{ ?>
                    <div class="reviews-grid__notfoundtext text-center"">
                        <div class="service-slider-title max-os-rt text-center">
                            <i>Records not found!</i>
                        </div>
                    <div>
                <?php } ?>
                <?php } else { ?>
                   <div class="col-md-12 col-sm-12 col-12">
                        <div class="service-slider-title max-os-rt">
                            <h1><i>Nao google review plugin not installed</i></h1>
                        </div>
                    <div>
                <?php } ?>
            </div>    
        </div>

        <!-- <div class="os-review-section">
           <div class="container">
           <?php if ( is_plugin_active( 'nao-google-review/nao-google-review.php' ) ) { ?>
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="service-slider-title max-os-rt text-center">
                        <h1>Customer Reviews</h1>
                    </div>
                <div>                
                <div class="max-os-review">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="row"  id="review_list">
                            <?php 
                            if($records){
                            foreach($records as $review){  
                                ?>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="col-md-12 col-sm-12 col-12 os-review-box">
                                    <div class="ssb-review-list">
                                        <ul>
                                            <li class="ss-ratings">
                                                <div id="fixture">
                                                    <span class="stars-container stars-<?php echo $review->rating;?>"></span>
                                                </div>
                                            </li>
                                            
                                            <li class="os-reviewr-nm"><?php echo date("F d, Y h:i A",strtotime($review->date)); ?></li>
                                        </ul>
                                    </div>

                                    <div class="os-review-txt-height">
                                        <div class="os-review-toggle">
                                            <p><?php echo $review->review; ?></p>
                                        </div>
                                        <p class="os-customer-nm"><span><?php echo $review->owner; ?></span>, <span><?php echo $review->location; ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                            
                        </div>
                        <?php if($records){ ?>
                        <div class="" style="text-align:center;">
                            <input type="hidden" name="limit" id="limit" value="<?php echo $limit; ?>"/>
                            <button class="btn btn-os-loadmr" id="loadMore">Load More</button>
                        </div>
                        <?php }else{ ?>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="service-slider-title max-os-rt text-center">
                                    <i>Records not found!</i>
                                </div>
                            <div>
                        <?php } ?>
                    </div>
                </div>
                <?php } else { ?>
                   <div class="col-md-12 col-sm-12 col-12">
                        <div class="service-slider-title max-os-rt">
                            <h1><i>Nao google review plugin not installed</i></h1>
                        </div>
                    <div>
                <?php } ?>
            </div>
        </div> -->
        <!--customer-review-section-closed-->
        
    </div><!-- content-area -->
</main>
<style>
    .google-reviews-grid.row {
        align-items: stretch;
    }
    .reviews-grid__wrapper .review-grid-item .review-grid-item-inner {
        height: 100%;
    }
</style>
<script>
  // requires jquery
jQuery(document).ready(function($) {

    var showChar = 150;
    var ellipsestext = "...";

    function content_limit(){
        jQuery(".os-review-toggle").each(function() {
        var content = jQuery(this).text();
        var content_limit = jQuery(this).text();
        content_limit = content_limit.replace(/\s/g, '');
        // console.log(content,'content');
        // console.log(content.length,'content.length');
        // console.log(showChar,'showChar');
        if (content_limit.length >= showChar) {
            var c = content.substr(0, showChar);
            var h = content;
            var html =
            '<div class="os-review-toggle-text ff1" style="display:block">' +
            c +
            '<span class="moreellipses">' +
            ellipsestext +
            '&nbsp;&nbsp;<a href="" class="moreless more">View More</a></span></span></div><div class="os-review-toggle-text ff2" style="display:none">' +
            h +
            '<a href="" class="moreless less">View Less</a></span></div>';

            jQuery(this).html(html);
        }
        });

        jQuery(".moreless").click(function() {
        var thisEl = jQuery(this);
        var cT = thisEl.closest(".os-review-toggle-text");
        var tX = ".os-review-toggle-text";
        if (thisEl.hasClass("less")) {
            cT.prev(tX).show();
            cT.toggle();
        } else {
            cT.toggle();
            cT.next(tX).show();
        }
        return false;
        });
        /* end iffe */
    }
    content_limit();
  /*************** */
    

	// function load_posts(){
	// 	pageNumber++;
	// 	var str = '&limit=' + 20 + '&ppp=' + ppp + '&action=more_post_ajax';
	// 	$.ajax({
	// 		type: "POST",
	// 		dataType: "html",
	// 		url: ajaxUrl, 
	// 		data: str,
	// 		success: function(data){
	// 			var $data = $(data);
	// 			if($data.length){
	// 				$("#review_list").append($data);
	// 				// console.log(last_page)
	// 				// console.log(pageNumber)
	// 				if(last_page==pageNumber){
	// 					$("#more_posts").hide();
	// 					// $("#more_posts").attr("disabled",true);
	// 				}else{
	// 					$("#more_posts").attr("disabled",false);
	// 				}
	// 			} else{
	// 				$("#more_posts").hide();
	// 				// $("#more_posts").attr("disabled",true);
	// 			}
	// 		},
	// 		error : function(jqXHR, textStatus, errorThrown) {
	// 			alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	// 			// $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	// 		}

	// 	});
	// 	return false;
	// }

  var pageNumber = 1;
  $("#loadMore").on("click", function(e){
    var limit = $('#limit').val(); // Post per page
	var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
	var last_page = "<?php echo $pageCount; ?>";
    $("#loadMore").attr("disabled",true);
    // $("#more_posts").attr("disabled",true);

    // var str = '&limit=' + limit + '&pageNumber=' + pageNumber + '&action=ajax_load_more_review';
    var str = {
        action : 'ajax_load_more_review',
        limit : limit,
        pageNumber: pageNumber
    };
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajaxUrl, 
        data: str,
        success: function(data){
            var $data = $(data);
            if($data.length){
                $("#review_list").append($data).fadeIn("slow");
                pageNumber++; 
                console.log(last_page)
                console.log(pageNumber)
                if(last_page==pageNumber){
                    $("#loadMore").hide();
                    // $("#more_posts").attr("disabled",true);
                }else{
                    $("#loadMore").attr("disabled",false);
                }
                content_limit();
            } else{
                $("#loadMore").hide();
                // $("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            // $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
  });

  /* end ready */
});

</script>
<?php
get_footer();
?>