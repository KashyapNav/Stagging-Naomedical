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

      <?php 
				$medicalservices_info = get_post_meta( $post->ID, 'medicalservices_discription', true );
				$content   = html_entity_decode($medicalservices_info);
				$editor_id = 'medicalservices_discription';
				$settings  = array( 'media_buttons' => false );
				 
				wp_editor( $content, $editor_id, $settings );
    ?>

	</textarea>
	</div>

    <div class="form-group">
      <label for="usr">Price:</label>
      <input type="text" class="form-control" name="medicalservices_price" required value="<?php echo get_post_meta( $post->ID, 'medicalservices_price', true );?>">
    </div>
    
	<style>
  .form-control{
    margin-left: 40px;
    margin-bottom: 10px;
  }
  </style>