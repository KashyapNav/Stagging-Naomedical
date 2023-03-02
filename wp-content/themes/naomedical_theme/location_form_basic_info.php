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

<style>
.form-control{
margin-left: 40px;
margin-bottom: 10px;
}
.form-control{
width: 30%;
margin-left: 0px;
margin-bottom: 20px;
height: 40px;
}
.time_control{
	width: 100%;
}
label{
width: 150px;
display: inline-block;
vertical-align:top;
}
.form-group{
margin-bottom:15px;
}
textarea {
overflow: auto;
padding: 2px 6px;
line-height: 1.42857143;
resize: vertical;
width: 408px;
}
.weekdays_form{

}
.weekdays_form .switch {
position: relative;
display: inline-block;
width: 60px;
height: 34px;
}

.weekdays_form .switch input { 
opacity: 0;
width: 0;
height: 0;
}

.weekdays_form .slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.weekdays_form .slider:before {
position: absolute;
content: "";
height: 26px;
width: 26px;
left: 4px;
bottom: 4px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

.weekdays_form input:checked + .slider {
background-color: #2196F3;
}

.weekdays_form input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

.weekdays_form input:checked + .slider:before {
-webkit-transform: translateX(26px);
-ms-transform: translateX(26px);
transform: translateX(26px);
}

/* Rounded sliders */
.weekdays_form .slider.round {
border-radius: 34px;
}

.weekdays_form .slider.round:before {
border-radius: 50%;
}

.hide{
  display:none;
}
	</style>
    <div class="form-group">
      <label for="usr">Title:</label>
      <input type="text" class="form-control" name="post_title" required value="<?php echo get_post_meta( $post->ID, 'post_title', true );?>" required>
    </div>

    <div class="form-group">
      <label for="usr">Location:</label>
      <input type="text" class="form-control" name="location_search_name" id="location_search_name" required value="<?php echo get_post_meta( $post->ID, 'location_search_name', true );?>">
      <input type="hidden" class="form-control" name="location_latitude" id="location_latitude"  value="<?php echo get_post_meta( $post->ID, 'location_latitude', true );?>">
      <input type="hidden" class="form-control" name="location_longitude" id="location_longitude"  value="<?php echo get_post_meta( $post->ID, 'location_longitude', true );?>" required>
    </div>

    <div class="form-group">
      <label for="pwd">Address:</label>

      <?php 
				$location_info = get_post_meta( $post->ID, 'location_address', true );
				$content   = html_entity_decode($location_info);
				$editor_id = 'location_address';
				// $settings  = array( 'media_buttons' => false );				
				// wp_editor( $content, $editor_id, $settings );   ?>
        <textarea id="location_address" name="location_address" rows="3" ><?php echo $content;?></textarea>
	  </div>
    <div class="form-group">
      <label for="usr">Phone:</label>
      <input type="text" class="form-control" name="location_phone" required value="<?php echo get_post_meta( $post->ID, 'location_phone', true );?>">
    </div>    
    <div class="form-group">
      <label for="usr">Link for appointment:</label>
      <input type="url" name="appointment_link" class="form-control" value="<?php echo get_post_meta( $post->ID, 'appointment_link', true );?>" placeholderr="Enter the appointment link">
    </div>
    <div class="form-group">
      <label for="usr">Insurance Information:</label>
      <input type="text" name="insurance_info" class="form-control" value="<?php echo get_post_meta( $post->ID, 'insurance_info', true );?>" placeholderr="Enter the insurance information">
    </div>	
    <?php
  $banner_img = get_post_meta($post->ID,'location_images',true);
?>
	<style type="text/css">
		.multi-upload-medias ul li .delete-img { position: absolute; right: 3px; top: 2px; background: aliceblue; border-radius: 50%; cursor: pointer; font-size: 14px; line-height: 20px; color: red; }
		.multi-upload-medias ul li { width: 120px; display: inline-block; vertical-align: middle; margin: 5px; position: relative; }
		.multi-upload-medias ul li img { width: 100%; }
	</style>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<td style="padding-left:0px;">Location Images: </td>
			<td>
				<?php echo multi_media_uploader_banner_field( 'location_images', $banner_img ); ?>
			</td>
		</tr>
	</table>

    <div class="form-group">
        <label for="pwd">Location Notes:</label>
        <?php 
          $location_info = get_post_meta( $post->ID, 'location_help', true );
          $content   = html_entity_decode($location_info);
          $editor_id = 'location_help';
          $settings  = array( 'media_buttons' => false );
          
          wp_editor( $content, $editor_id, $settings );
      ?>

    </textarea>
    </div>

<!--Weekdays-->
<div class="weekdays_form">
	<label style="margin-bottom:20px;font-size:18px;font-weight:700;">Set Hours</label>
	<table class="table">
		<tbody>

			<tr>
        <?php
          $mon_fri_visibility = (get_post_meta( $post->ID, 'mon-fri', true ))?'':'hide';
        ?>
				<td>Monday - Friday</td>
				<td class="toggle_td">
					<label class="switch">
          <input type="checkbox" name="mon-fri" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'mon-fri', true ))?'checked':'') ?> />
						<span class="slider round"></span>
						
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'mon-fri', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $mon_fri_visibility; ?>">
					<input type="time" name="mon-fri-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'mon-fri-start', true ) ?>" >
				</td>
				<td class="toggle_td_next <?php echo $mon_fri_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $mon_fri_visibility; ?>">
					<input type="time" name="mon-fri-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'mon-fri-close', true ) ?>" >
				</td>
			</tr>
			<tr>
				<td colspan="5">-OR-</td>
			</tr>
			<tr>
        <?php
         $monday_visibility = (get_post_meta( $post->ID, 'monday', true ))?'':'hide';
        ?>
				<td>Monday</td>
				<td class="toggle_td">
					<label class="switch">
						<input type="checkbox" name="monday" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'monday', true ))?'checked':'') ?>/>
						<span class="slider round"></span>
						
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'monday', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $monday_visibility; ?>">
					<input type="time" name="monday-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'monday-start', true ) ?>" >
				</td>
				<td class="toggle_td_next <?php echo $monday_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $monday_visibility; ?>">
					<input type="time" name="monday-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'monday-close', true ) ?>" >
				</td>
			</tr>

			<tr>
        <?php
         $tuesday_visibility = (get_post_meta( $post->ID, 'tuesday', true ))?'':'hide';
        ?>
				<td>Tuesday</td>
				<td class="toggle_td">
					<label class="switch">
						<input type="checkbox" name="tuesday" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'tuesday', true ))?'checked':'') ?>/>
						<span class="slider round"></span>
						
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'tuesday', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $tuesday_visibility; ?>">
					<input type="time" name="tuesday-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'tuesday-start', true ) ?>" >
				</td>
				<td class="toggle_td_next <?php echo $tuesday_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $tuesday_visibility; ?>">
					<input type="time" name="tuesday-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'tuesday-close', true ) ?>" >
				</td>
			</tr>

			<tr>
				<?php
				$wednesday_visibility = (get_post_meta( $post->ID, 'wednesday', true ))?'':'hide';
				?>
				<td>Wednesday</td>
				<td class="toggle_td">
					<label class="switch">
						<input type="checkbox" name="wednesday" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'wednesday', true ))?'checked':'') ?>/>
						<span class="slider round"></span>
						
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'wednesday', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $wednesday_visibility; ?>">
					<input type="time" name="wednesday-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'wednesday-start', true ) ?>" >
				</td>
				<td class="toggle_td_next <?php echo $wednesday_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $wednesday_visibility; ?>">
					<input type="time" name="wednesday-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'wednesday-close', true ) ?>" >
				</td>
			</tr>

			<tr>
				<?php
				$thursday_visibility = (get_post_meta( $post->ID, 'thursday', true ))?'':'hide';
				?>
				<td>Thursday</td>
				<td class="toggle_td">
					<label class="switch">
						<input type="checkbox" name="thursday" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'thursday', true ))?'checked':'') ?>/>
						<span class="slider round"></span>
						
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'thursday', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $thursday_visibility; ?>">
					<input type="time" name="thursday-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'thursday-start', true ) ?>" >
				</td>
				<td class="toggle_td_next <?php echo $thursday_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $thursday_visibility; ?>">
					<input type="time" name="thursday-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'thursday-close', true ) ?>" >
				</td>
			</tr>

			<tr>
				<?php
				$friday_visibility = (get_post_meta( $post->ID, 'friday', true ))?'':'hide';
				?>
				<td>Friday</td>
				<td class="toggle_td">
					<label class="switch">
						<input type="checkbox" name="friday" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'friday', true ))?'checked':'') ?>/>
						<span class="slider round"></span>
						
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'friday', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $friday_visibility; ?>">
					<input type="time" name="friday-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'friday-start', true ) ?>" >
				</td>
				<td class="toggle_td_next <?php echo $friday_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $friday_visibility; ?>">
					<input type="time" name="friday-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'friday-close', true ) ?>" >
				</td>
			</tr>


			<tr>
				<td colspan="5">----</td>
			</tr>

			
			<tr>
        <?php
         $saturday_visibility = (get_post_meta( $post->ID, 'saturday', true ))?'':'hide';
        ?>
				<td>Saturday</td>
				<td class="toggle_td">
					<label class="switch">
						<input type="checkbox" name="saturday" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'saturday', true ))?'checked':'') ?>/>
						<span class="slider round"></span>
						
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'saturday', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $saturday_visibility; ?>">
					<input type="time" name="saturday-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'saturday-start', true ) ?>" >
				</td>
				<td class="toggle_td_next <?php echo $saturday_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $saturday_visibility; ?>">
					<input type="time" name="saturday-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'saturday-close', true ) ?>" >
				</td>
			</tr>

			<tr>
        <?php        
        $sunday_visibility = (get_post_meta( $post->ID, 'sunday', true ))?'':'hide';
        ?>
				<td>Sunday</td>
				<td class="toggle_td">
					<label class="switch">
						<input type="checkbox" name="sunday" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'sunday', true ))?'checked':'') ?>/>
						<span class="slider round"></span>
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'sunday', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $sunday_visibility; ?>">
					<input type="time" name="sunday-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'sunday-start', true ) ?>">
				</td>
				<td class="toggle_td_next <?php echo $sunday_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $sunday_visibility; ?>">
					<input type="time" name="sunday-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'sunday-close', true ) ?>">
				</td>
			</tr>
      
      <tr>
      		<?php $holiday_visibility = (get_post_meta( $post->ID, 'holiday', true ))?'':'hide';        ?>
				<td>Holiday</td>
				<td class="toggle_td">
					<label class="switch">
						<input type="checkbox" name="holiday" class="sliderCheckbox" value="1" <?php echo (!empty(get_post_meta( $post->ID, 'holiday', true ))?'checked':'') ?>/>
						<span class="slider round"></span>
					</label>
					<span class="stote_status"><?php echo (!empty(get_post_meta( $post->ID, 'holiday', true ))?'Open':'Close') ?></span>
				</td>
				<td class="toggle_td_next start_time <?php echo $holiday_visibility; ?>">
					<input type="time" name="holiday-start" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'holiday-start', true ) ?>">
				</td>
				<td class="toggle_td_next <?php echo $holiday_visibility; ?>">-</td>
				<td class="toggle_td_next close_time <?php echo $holiday_visibility; ?>">
					<input type="time" name="holiday-close" class="form-control time_control" value="<?php echo get_post_meta( $post->ID, 'holiday-close', true ) ?>">
				</td>
			</tr>
		</tbody>
	</table>
</div>
<!--weekdays-closed-->
<script type="text/javascript">
  jQuery(function($) {

    //Working hours toggle function
    jQuery(".sliderCheckbox").click(function(){
        if (jQuery(this).is(':checked')) {
            jQuery(this).parents('td.toggle_td').nextAll('.toggle_td_next').show();
            jQuery(this).parents('label').next('.stote_status').text('Open');
        }else {
            jQuery(this).parents('td.toggle_td').nextAll('.toggle_td_next').hide();
            jQuery(this).parents('label').next('.stote_status').text('Closed');
        }
    });

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
  })
</script>
<script>
function initAutocomplete() {
			address1Field = document.querySelector("#location_search_name");
			// Create the autocomplete object, restricting the search predictions to
			// addresses in the US and Canada.
			autocomplete = new google.maps.places.Autocomplete(address1Field, {
				componentRestrictions: { country: ["us", "ca"] },
				fields: ["address_components", "geometry"],
				types: ["geocode"],
			});
			address1Field.focus();
			// When the user selects an address from the drop-down, populate the
			// address fields in the form.
			autocomplete.addListener("place_changed", fillInAddress);
		}
    function fillInAddress() {
      const place = autocomplete.getPlace();
      document.getElementById('location_latitude').value = place.geometry['location'].lat();
      document.getElementById('location_longitude').value = place.geometry['location'].lng();
			// $('#location_latitude').val(place.geometry['location'].lat());
			// $('#location_longitude').val(place.geometry['location'].lng());
		}
  function initialize() {
  //geolocate();
    initAutocomplete();
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5DPIhnci0oZA_35-ZwL-FnIxmV4cPcm8&signed_in=true&libraries=places&callback=initialize" async></script>
<?php
function multi_media_uploader_banner_field($name, $value = '') {
	$image = '">Add Media';
	$image_str = '';
	$image_size = 'full';
	$display = 'none';
	$value = explode(',', $value);

	if (!empty($value)) {
		foreach ($value as $values) {
			if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
				$image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
			}
		}

	}

	if($image_str){
		$display = 'inline-block';
	}

	return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove media</a></div>';
}
?>