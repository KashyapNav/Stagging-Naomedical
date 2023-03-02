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
      <label for="pwd">Address:</label>

      <?php 
				$contact_info = get_post_meta( $post->ID, 'contact_address', true );
				$content   = html_entity_decode($contact_info);
				$editor_id = 'contact_address';
				$settings  = array( 'media_buttons' => false );
				 
				wp_editor( $content, $editor_id, $settings );
    ?>

	</textarea>
	</div>

  <div class="form-group">
      <label for="usr">Phone:</label>
      <input type="text" class="form-control" name="contact_phone" required value="<?php echo get_post_meta( $post->ID, 'contact_phone', true );?>">
    </div>
	<div class="form-group">
      <label for="usr">Info:</label>
      <?php 
				$contact_info = get_post_meta( $post->ID, 'contact_info', true );
				$content   = html_entity_decode($contact_info);
				$editor_id = 'contact_info';
				$settings  = array( 'media_buttons' => false );
				 
				wp_editor( $content, $editor_id, $settings );
    ?>
    </div>
	<style>
  .form-control{
    margin-left: 40px;
    margin-bottom: 10px;
  }
  </style>