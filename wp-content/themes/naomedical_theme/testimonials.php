<?php 
global $wp_query;
/* Template Name: testimonials */ ?>

<div class="testimonials_grid">
    <?php
        // the query
        // $result = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'posts WHERE post_type =  "testimonials"  AND post_status =  "publish" ORDER BY ID DESC');	
        
         
        // $i = 0;
        // $r = 0;
        // $testimonials = array();
        // if(isset($result[0]) && !empty($result[0])){ 
        //     foreach($result as $postsdata){
        //         $testimonials[$r][$i]['content'] = $postsdata->post_content;
        //         if($i == 5){
        //             $i = 1;
        //             ++$r;
        //         }else{
        //             ++$i;
                    
        //         }
            
        //     }
        // }

        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        /*Testimonial Start */

            $category = 2612;
            $category_query = ''.$wpdb->prefix.'term_taxonomy.term_id IN ('.$category.') AND ';
            $query = 'SELECT * FROM '.$wpdb->prefix.'posts
                LEFT JOIN '.$wpdb->prefix.'term_relationships ON ('.$wpdb->prefix.'posts.ID = '.$wpdb->prefix.'term_relationships.object_id)
                LEFT JOIN '.$wpdb->prefix.'term_taxonomy ON ('.$wpdb->prefix.'term_relationships.term_taxonomy_id = '.$wpdb->prefix.'term_taxonomy.term_taxonomy_id)
                WHERE  '.$category_query.''.$wpdb->prefix.'posts.post_status = "publish" AND post_type = "testimonials"
                GROUP BY '.$wpdb->prefix.'posts.ID;';

            $testimonial_results = $wpdb->get_results($query);

            /*Testimonial End */
        ?>
        <div class="col-lg-12 col-md-12 col-12 ">
            <div class="testimonialSlider">
                <?php if(isset($testimonial_results) && !empty($testimonial_results)){
                    foreach($testimonial_results as $results_content){ 
                        ?>
                        <div class="items">
                            <div class="row">
                                <div class="testiContent col-lg-12 col-md-12 col-12 mb-4"> 
                                    <div class="testiTitle"> 
                                        <div class="testiInner">
                                            <p><?php echo $results_content->post_content ; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }?> 
            </div>
        </div>
</div>