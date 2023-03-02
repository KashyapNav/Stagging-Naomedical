<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 	*
 * @package naomedical_theme
 */
?>
<script fetchpriority="low" type="module" id="podium-widget" data-api-token="a208de57-1625-47d1-8379-913251062de9" src="https://connect.podium.com/widget.js#API_TOKEN=a208de57-1625-47d1-8379-913251062de9" defer></script>
<script type="application/javascript">
jQuery('.podium-event').on('click',function(){
	jQuery("#podium-bubble").contents().find(".ContactBubble__Bubble").click();
});
</script>
<?php wp_footer(); ?>
<style>
	.ContactBubble__Bubble {
		background-color: #3074DC;
    	display: none !important;
}
	</style>
</body>
</html>
