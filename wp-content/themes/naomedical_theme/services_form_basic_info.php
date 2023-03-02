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

    <!-- <div class="form-group">
      <label for="usr">Title:</label>
      <input type="text" class="form-control" name="post_title" required value="<?php echo get_post_meta( $post->ID, 'post_title', true );?>" required>
    </div>

    <div class="form-group">
      <label for="usr">Views Count:</label>
      <input type="text" class="form-control" name="services_views" required value="<?php echo get_post_meta( $post->ID, 'services_views', true );?>" required>
    </div>

    <div class="form-group">
      <label for="usr">Retail Price:</label>
      <input type="text" class="form-control services_baseprice" name="services_baseprice" required value="<?php echo get_post_meta( $post->ID, 'services_baseprice', true );?>" required>
    </div>

    <div class="form-group">
      <label for="usr">Price Discount % :</label>
      <input type="text" class="form-control services_price_discount" name="services_price_discount" required value="<?php echo get_post_meta( $post->ID, 'services_price_discount', true );?>" required>
    </div>

    <div class="form-group">
      <label for="usr">Selling Price :</label>
      <input type="text" class="form-control services_price" name="services_price" required value="<?php echo get_post_meta( $post->ID, 'services_price', true );?>" required>
    </div>

    <div class="form-group">
      <label for="usr">Description :</label>
      <input type="text" class="form-control" name="services_price_description" required value="<?php echo get_post_meta( $post->ID, 'services_price_description', true );?>" required>
    </div>


    <div class="form-group">
      <label for="usr">Deal Expiry :</label>
      <input type="text" class="form-control" name="services_booking_time" required value="<?php echo get_post_meta( $post->ID, 'services_booking_time', true );?>" required>
    </div> -->

    <!--top-rated-services-->

    <div class="form-group">
      <label for="usr">Title:</label>
      <input type="text" class="form-control" name="post_title" required value="<?php echo get_post_meta( $post->ID, 'post_title', true );?>">
    </div>

    <div class="form-group">
        <label for="pwd">Description:</label>

        <?php 
          $toprated_discription = get_post_meta( $post->ID, 'toprated_discription', true );
          $content   = html_entity_decode($toprated_discription);
          $editor_id = 'toprated_discription';
          $settings  = array( 'media_buttons' => false );
          
          wp_editor( $content, $editor_id, $settings );
      ?>

    </textarea>
	</div>

    <div class="form-group">
      <label for="usr">Price:</label>
      <input type="text" class="form-control" name="toprated_price" required value="<?php echo get_post_meta( $post->ID, 'toprated_price', true );?>">
    </div>



	<style>
  .form-control{
    margin-left: 40px;
    margin-bottom: 10px;
  }
  </style>

<script>

jQuery( document ).on('change','.services_price_discount',function() {
  var getRetailPrice = jQuery(".services_baseprice").val();
  var discountedPercentage = jQuery(".services_price_discount").val();
  var getSellPrice = (discountedPercentage / 100) * getRetailPrice;
  console.log(discountedPercentage);
  
  jQuery(".services_price").val(getSellPrice);
});
</script>