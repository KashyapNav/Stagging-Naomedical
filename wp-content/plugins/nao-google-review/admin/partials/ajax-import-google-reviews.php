<?php
    require_once __DIR__ . '/vendor/autoload.php';
    header( "Content-Type: application/json" );
//   $dotenv->load();
    $client = new MongoDB\Client(
        'mongodb+srv://baskarv:ppap%40431()@cluster0.tnhxubm.mongodb.net/?retryWrites=true&w=majority'
    );
    $db = $client->naoMedical;
    $collection = $db->reviews;
    global $wpdb;
    $table_name = $wpdb->prefix . 'google_reviews'; 
    if($_POST['type'] == 'getDataCount'){
        $wpdb->query('TRUNCATE TABLE '.$table_name);
        $cursor = $collection->count([],
                    [
                    // 'limit' => 100,
                    'projection' => [
                        '_id' => 1,
                        'dateRange' => 1,
                        'date' => 1,
                        'source' => 1,
                        'location_name' => 1,
                        'rating' => 1,
                        'review' => 1,
                        'owner' => 1,
                        'coordinates' => 1,
                    ],
                ]);
        if($cursor){
            $output = array(
                'status'  => true,
                'total_reviews' => $cursor
               );
            header('Content-Type: application/json');
            // http://php.net/manual/en/function.exit.php#101204
            exit(json_encode($output));
        }else{
            $output = array(
                'status'  => false,
                'message' => 'Not able to fetch the data. Please try again later.'
               );
            header('Content-Type: application/json');
            // http://php.net/manual/en/function.exit.php#101204
            exit(json_encode($output));
        }
        
    }elseif($_POST['type'] == 'startProcess'){
        
        $limit = (int)$_POST['limit'];
        $skip = (int)$_POST['skip'];
        
        $cursor = $collection->find([],
                    [
                    'limit' => $limit,
                    'skip' => $skip,
                    'projection' => [
                        '_id' => 1,
                        'dateRange' => 1,
                        'date' => 1,
                        'dateString' => 1,
                        'source' => 1,
                        'location_name' => 1,
                        'rating' => 1,
                        'review' => 1,
                        'owner' => 1,
                        'coordinates' => 1,
                    ],
                ]);
        
        $count = 0;
        if(!empty($cursor)){
            // $wpdb->query('TRUNCATE TABLE '.$table_name);
        
            foreach ($cursor as $data) {

                // pre($data);
                $item = [];
                // $item['mongodb_id'] = $data['_id'];
                $mongodb_id = $data['_id'];
                // $item['owner'] = $data['owner'];
                $full_name = $data['owner'];
                $part = explode(' ',$full_name);

                if(count($part)>=2){
                    $first_name = (strlen($part[0])>2)?$part[0]:$part[0].' '.$part[1];
                }else{
                    $first_name = $part[0];
                }
                
                $item['owner'] = $first_name;

                $item['review'] = ($data['review']== 'No Verbatim' || $data['review']== 'No verbatim')?'':$data['review'];
                $item['location'] = !empty($data['location_name'])?str_replace('Nao Medical -','',$data['location_name']): '';
                $item['rating'] = ($data['rating'])?$data['rating']:0;
                // $item['date'] = date("Y-m-d H:m:s", $data['date']);
                // $dateObj = $data['date']['$date']['$numberLong'];
                $dateObj = $data['dateString'];
                $item['date'] = date("Y-m-d H:m:s", ($dateObj));
                foreach ($mongodb_id as $itemId) {
                    $item['mongodb_id'] =  $itemId;
                    $mongodb_id =  $itemId;
                }
                $checkIfExists = $wpdb->get_var("SELECT ID FROM $table_name WHERE mongodb_id ='".$mongodb_id."'");
                if(!$checkIfExists) {
                    // echo 'inserting';
                    $result = $wpdb->insert($table_name, $item);
                    // echo $wpdb->last_error;
                    if(!$result){
                        $output = array(
                            'status'  => false,
                            'message'  => 'An error occured in import process. Please try again later.'
                           );
                        header('Content-Type: application/json');
                        exit(json_encode($output));
                    }
                }                
                $count++;
                
                
            };
            
        }
        $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$table_name."");
        $importedCount = (int)$_POST['skip']+$count;

        $output = array(
                    'status'  => true,
                    'message'  => 'Import successfully',
                    'limit' => $_POST['limit'],
                    'skip' => $_POST['skip'],
                    'imported_reviews' => $importedCount,
                    'row_count' => $rowcount,
                   );
        header('Content-Type: application/json');
        // http://php.net/manual/en/function.exit.php#101204
        exit(json_encode($output));
    }

    