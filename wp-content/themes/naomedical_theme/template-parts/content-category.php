<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package naomedical_theme
 */

?>

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
                            <li class="ins"><a href="https://www.instagram.com/naomedical" target="_blank" title="Instagram">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
						