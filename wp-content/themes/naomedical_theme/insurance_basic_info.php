<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://newmeyerdillion.dev1.bwmmedia.com/
 * @since      1.0.0
 *
 * @package    Newmeyerdillion_person
 * @subpackage Newmeyerdillion_person/admin/partials
 */
 
//require_once plugin_dir_path( __FILE__ ). '/../common/script_headers.php';

?>

    <div class="form-group">
      <label for="usr">Title:</label>
      <input type="text" class="form-control" name="post_title" required value="<?php echo get_post_meta( $post->ID, 'post_title', true );?>">
    </div>
    <div class="form-group">
      <label for="pwd">Description:</label>
      <textarea id="w3review" rows="4" name="inc_dec" cols="50" required><?php echo get_post_meta( $post->ID, 'post_description', true );?>
	</textarea>
	</div>
	<div class="form-group">
      <label for="usr">Price:</label>
      <input type="number" class="form-control" name="inc_price" step="0.01" required value="<?php echo get_post_meta( $post->ID, 'post_price', true );?>">
    </div>
	<style>
  .form-control{
    margin-left: 40px;
    margin-bottom: 10px;
  }
  </style>