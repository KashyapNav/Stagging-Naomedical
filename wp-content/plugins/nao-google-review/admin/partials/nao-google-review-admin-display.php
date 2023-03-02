<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://https://www.naomedical.com/
 * @since      1.0.0
 *
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/admin/partials
 */

 
global $wpdb;
$table = new Nao_Google_Review_List_Table();
$table->prepare_items();
$message = '';
if ('hide' === $table->current_action()) {
    $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Review updated successfully', 'nao_google_review'), $_REQUEST['id']) . '</p></div>';
}
if ('show' === $table->current_action()) {
    $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Review updated successfully', 'nao_google_review'), $_REQUEST['id']) . '</p></div>';
}
?>
<div class="wrap">

<div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
<h2><?php _e('Review List', 'nao_google_review')?><a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=import-reviews');?>"><?php _e('Import', 'nao_google_review')?></a></a>
</h2>
<p>Use the below shortcode for review list<br>
<code>[recent_reviews limit="4" ratings="4,5"]</code>
</p>
<?php echo $message; ?>

<form id="persons-table" method="GET">
    <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
    <?php 
$table->search_box( 'search', 'search_id' );
$table->display() ?>
</form>

</div>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
