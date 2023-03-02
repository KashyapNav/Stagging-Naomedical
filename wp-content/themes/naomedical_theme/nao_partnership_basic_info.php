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
$partner_logo = get_post_meta($post->ID,'partner_logo',true);
?>

    <div class="form-group">
        <label for="post_title">Name:</label>
        <input type="text" class="form-control" name="post_title" required value="<?php echo get_post_meta( $post->ID, 'post_title', true );?>">
    </div>
    <div class="form-group">
        <label for="brand">Brand:</label>
        <input type="text" class="form-control" name="brand" required value="<?php echo get_post_meta( $post->ID, 'brand', true );?>">
	</div>    
    <div class="form-group">
        <label for="partner_logo">Logo:</label>
        <?php echo multi_media_uploader_field( 'partner_logo', $partner_logo ); ?>
	</div>
	<div class="form-group">
      <label for="youtube_video_link">Youtube Video Link:</label>
      <input type="text" class="form-control" name="youtube_video_link" onchange="validateYouTubeUrl(this.value)" required value="<?php echo get_post_meta( $post->ID, 'youtube_video_link', true );?>">
    </div>
	<style>
  .form-control{
    margin-left: 40px;
    margin-bottom: 10px;
  }
  </style>
  <script type="text/javascript">
		jQuery(function($) {

			$('body').on('click', '.wc_multi_upload_image_button', function(e) {
				e.preventDefault();

				var button = $(this),
				custom_uploader = wp.media({
					title: 'Insert image',
					button: { text: 'Use this image' },
					multiple: true 
				}).on('select', function() {
					var attech_ids = '';
					attachments
					var attachments = custom_uploader.state().get('selection'),
					attachment_ids = new Array(),
					i = 0;
					attachments.each(function(attachment) {
						attachment_ids[i] = attachment['id'];
						attech_ids += ',' + attachment['id'];
						if (attachment.attributes.type == 'image') {
							$(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
						} else {
							$(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
						}

						i++;
					});

					var ids = $(button).siblings('.attechments-ids').attr('value');
					if (ids) {
						var ids = ids + attech_ids;
						$(button).siblings('.attechments-ids').attr('value', ids);
					} else {
						$(button).siblings('.attechments-ids').attr('value', attachment_ids);
					}
					$(button).siblings('.wc_multi_remove_image_button').show();
				})
				.open();
			});

			$('body').on('click', '.wc_multi_remove_image_button', function() {
				$(this).hide().prev().val('').prev().addClass('button').html('Add Media');
				$(this).parent().find('ul').empty();
				return false;
			});

		});

		jQuery(document).ready(function() {
			jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
				var ids = [];
				var this_c = jQuery(this);
				jQuery(this).parent().remove();
				jQuery('.multi-upload-medias ul li').each(function() {
					ids.push(jQuery(this).attr('data-attechment-id'));
				});
				jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
			});


		});
		
		function validateYouTubeUrl(urlToParse){
			console.log(urlToParse);
			if (urlToParse) {
				var regExp = /^(?:http:\/\/(?:www\.)?youtube.com\/embed\/[A-z0-9])?$/;
				if (!urlToParse.match(regExp)) {
					alert('Please enter valid youtube embeded URL.')
				}
			}
		}
	</script>