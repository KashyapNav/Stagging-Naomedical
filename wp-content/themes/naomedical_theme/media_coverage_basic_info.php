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
    <label for="post_title">Title:</label>
    <input type="text" class="form-control" name="post_title" required value="<?php echo get_post_meta( $post->ID, 'post_title', true );?>">
  </div>
  <div class="form-group">
    <label for="media_name">Medial Name:</label>
    <input type="text" class="form-control" name="media_name" required value="<?php echo get_post_meta( $post->ID, 'media_name', true );?>">
	</div>
	<div class="form-group">
      <label for="link">Link:</label>
      <input type="text" class="form-control" name="link" required value="<?php echo get_post_meta( $post->ID, 'link', true );?>">
    </div>
	<style>
  .form-control{
    margin-left: 40px;
    margin-bottom: 10px;
  }
  </style>