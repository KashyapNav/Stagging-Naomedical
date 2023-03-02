<?php /* Template Name: coming soon 
 *Template Post Type: post, page, product, location */
get_header();
?>

    <div id="primary" class="content-area">
            <div class="container">
                <div class="comingSoon_content text-center">
                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();?>
                        <h3> <?php the_title();?>
                        <h1 id="headTitle">Coming Soon...</h1>
                    <?php endwhile;
                    ?>
                </div>
            </div>
    </div><!-- .content-area -->


<script>
let element = document.getElementById("headTitle");

// show after 2 seconds
// RECOMMENDATION: use window.setTimeout instead of setTimeout
// NOTE: use a callback function, not an embedded named function
window.setTimeout(function() {
     element.classList.add("blue");
}, 2000);

// hide after 3 seconds
window.setTimeout(function() {
     element.classList.remove("blue");
     element.classList.add("green");
}, 4000);

window.setTimeout(function() {
     element.classList.remove("green");
     element.classList.add("yellow");
}, 6000);

window.setTimeout(function() {
     element.classList.remove("yellow");
     element.classList.add("cms-animate");
}, 8000);

// window.setTimeout(function() {
//      element.classList.remove("cms-animate");
//      element.classList.add("black");
// }, 6000);

</script>

<?php
//get_sidebar();
get_footer(); 