<?php

 
global $wpdb;
$request = $_REQUEST['action'];
$message = 'Click the import button to fetch the google reviews.';

?>
<div class="wrap">

<div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
<h2><?php _e('Import Google Reviews', 'nao_google_review')?></h2>
<div id="import_status"><?php echo $message; ?></div><br>
<div class="form-group" id="process" style="display:none;">
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
            <span id="process_data"></span> - <span id="total_data"></span>
        </div>
    </div>
</div>



<!-- <form id="persons-table" method="POST">
    <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
    <input type="hidden" name="action" value="import">
    <input type="submit" value="Import"/>
</form> -->
<button class="import">Import</button>
<script>
jQuery(document).ready(function(){
    var total_data = 0;
    var limit = 10;
    var skip = 0;
    var process_data = 0;
    var nProcess = 0;
    var completedProcess = 0;
    jQuery(".import").bind("click", function() {
        // jQuery(this).toggleClass('clicked');
        jQuery('.import').prop('disabled', true);
        jQuery.ajax({
          type:'POST',
          dataType:"json",
          data:{action:'import_nao_google_reviews',type:'getDataCount'},
          url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
          success: function(data) {
            // console.log(data);
            if(data.status){
                completedProcess=0;
                total_data = parseInt(data.total_reviews);
                nProcess = Math.ceil(total_data/limit);
                jQuery('#process').show();
                jQuery('#total_data').text(total_data);
                
                jQuery('#import_status').text('Importing...');
                console.log(total_data,'total_data');
                console.log(nProcess,'nProcess');
                importProcess(limit,skip);
                
                var width = Math.round((0/total_data)*10);
                jQuery('#process_data').text(0);
                jQuery('.progress-bar').css('width', width + '%');
            }else{
                jQuery(this).prop('disabled', false);
                jQuery('#import_status').text('An error occured in import process. Please try again later.');
            }
            
          }
        });
    });

    function importProcess(limit,skip){
        jQuery.ajax({
          type:'POST',
          dataType:"json",
          data:{action:'import_nao_google_reviews',type:'startProcess',limit:limit,skip:skip},
          url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
          success: function(data) {
              console.log(data);
            if(data.status){
                // console.log(data);
                process_data = parseInt(data.imported_reviews);
                console.log(process_data,'process_data')
                jQuery('#process_data').text(process_data);
                var width = Math.round((process_data/total_data)*100);
                console.log(width,'width');
                jQuery('#process_data').text(process_data);
                jQuery('.progress-bar').css('width', width + '%');
                completedProcess+=1;
                skip=parseInt(limit*completedProcess);
                limit=parseInt(limit);
                console.log(completedProcess,'completedProcess');
                console.log(nProcess,'nProcess');
                if(nProcess>completedProcess){
                    console.log(skip,'skip');
                    console.log(limit,'limit');
                    // var callbacks = jQuery.Callbacks();
                    // callbacks.add(importProcess);
                    importProcess(limit,skip);
                }else{
                    jQuery('#import_status').text('Imported Successfully!');
                    jQuery('.import').prop('disabled', false);
                }

            }else{
                jQuery('.import').prop('disabled', false);
                jQuery('#import_status').text(data.message);
            }
          }
        });
    }
});
</script>
</div>