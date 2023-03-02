<?php
/**
 *Template Name: Resources
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();

global $wpdb;

$args = array(
            'taxonomy' => 'page-category',
            'orderby' => 'name',
            'order'   => 'ASC'
        );

$cats = get_categories($args);
$category_ids = [];

?>
<main id="primary" class="site-main" role="main"> 
    <div id="primary1" class="content-area">
        <div class="resources-page-body">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-12">
                            <div class="top-categories-div">
                                <h3>Categories</h3>
                                <ul class="category_list">
                                    <li class="active">
                                        <a href="#" class="filter" data-filter="all">All</a>
                                    </li>
                                    <?php 
                                    $i = 0;
                                    foreach($cats as $cat) { 
                                        $category_ids[$i] = $cat->term_id;
                                        ?>
                                        <li class="" >
                                            <a href="javascript:void(0)" class="filter" data-filter="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a>
                                        </li>
                                    <?php $i++; } ?>                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-12">
                            <div class="col-md-12 col-sm-12 col-12 resources-title-div">
                                <div class="row">
                                    <div class="col-md-7 col-sm-12 col-12">
                                        <h1>Resources</h1>
                                    </div>

                                    <div class="col-md-5 col-sm-12 col-12">
                                        <div class="search-resource-div">
                                            <label for="resources-search">
                                                <input type="text" class="form-control" placeholder="Search" id="resources-search">
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12 resources-list-div">
                            <ul id="resources-list">
                        <?php
                        $args = array(
                            'post_type' => 'page',
                            'orderby' => 'name',
                            'order'   => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'page-category',
                                    'field'    => 'ID',
                                    'terms'    => $category_ids,
                                ),
                            ),
                        );
                        $query = new WP_Query( $args );
                        while($query -> have_posts()) : $query -> the_post();
                        // pre($post);
                        $terms = get_the_terms( $post->ID, 'page-category');
                        $terms = array_column($terms, 'slug');
                        $resources_categories = implode(" ",$terms);
                        // pre(get_the_terms('page-category'));
                        ?>
                                <li class="resources_list_item <?php echo $resources_categories; ?>"  data-myorder="1">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <div class="card">
                                            <?php if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail('full'); ?>
                                                <?php }else{ ?>
                                            <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/naomedical_theme/assets/images/placeholder.png" class="img-fluid" alt="related articles">
                                            <?php } ?>
                                            <div class="card-body">
                                                <p class="card-text"><?php echo get_the_title(); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php
                                    endwhile; wp_reset_query();
                                ?>
                             </ul>    
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- content-area -->
</main>
<script>
    jQuery(function($){
        jQuery('.filter').on('click',function(){
            var filter_val = jQuery(this).data('filter');
            if(filter_val == 'all'){
                jQuery('#resources-list .resources_list_item').show();
            }else{
                jQuery('#resources-list .resources_list_item').hide();
                jQuery('#resources-list .'+filter_val).show();
            }
            
        });
    });
</script>

<script>
   let searchInput = document.getElementById('resources-search');

searchInput.addEventListener('keyup',function(event){
    let searchQuery = event.target.value.toLowerCase();
    jQuery('.category_list li').removeClass('active')
    jQuery('.category_list li').first().addClass('active');
    // console.log(event.target.value)
    // console.log(username.value) 
    // console.log(searchQuery)

    let allNamesDOMCollection  = document.getElementsByClassName('resources_list_item') // can also use getElementByTagName('li')
    // console.log(allNamesDOMCollection
    
    for(let i=0;i<allNamesDOMCollection.length;i++){
        const currentName = allNamesDOMCollection[i].textContent.toLowerCase();
        // console.log(searchQuery.length)
        
        //searchQuery == currentName.substring(0,searchQuery.length)
        // 'k' == karl.substring(0,1) (k)
        // this method only search from start
        if(currentName.includes(searchQuery))  
        {
            // console.log(currentName)
            allNamesDOMCollection[i].style.display = 'inline-block';
        }   
        else{
            // document.getElementById('result name').style.display = 'none'
            allNamesDOMCollection[i].style.display = 'none';
        }

    }
})

</script>

<?php
get_footer();
?>

