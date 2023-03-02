<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package naomedical_theme-
 */
?>
	  <div id="primary" class="content-area">
            <div class="container">
                <div class="comingSoon_content text-center page404_content">
                	<h1 id="headTitle">404</h1> 
                    <h2>It looks like we can't find your page</h2> 
                    <p>Need help? Feel free to <a href="/contact-us" style="text-decoration: underline;color: #e5aa44;">contact us here.</a> If you'd like to book an appointment with us or return to the home page, use the following options below</p>
                    <div class="btn__group">
                         <a href="/" class="return_btn">Return to Homepage</a>
                         <a href="javascript:void(0)" class="bootk_btn appointment_modal">Book an Appointment</a>
                    </div>
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
get_footer();
