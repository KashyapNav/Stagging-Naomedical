<?php

      require_once __DIR__ . '/vendor/autoload.php';
    //   $dotenv->load();

      $client = new MongoDB\Client(
         'mongodb+srv://baskarv:ppap%40431()@cluster0.tnhxubm.mongodb.net/?retryWrites=true&w=majority'
      );
      $db = $client->naoMedical;
      $collection = $db->reviewsNew;
      $cursor = $collection->find(['rating'=>['$gte'=>4]],
      [
        'limit' => 100,
        'projection' => [
            '_id' => 1,
            'dateRange' => 1,
            'date' => 1,
            'source' => 1,
            'site' => 1,
            'rating' => 1,
            'review' => 1,
            'owner' => 1,
            'coordinates' => 1,
        ],
    ]);
    echo '<pre>';
    // echo $cursor;
    // exit;
    foreach ($cursor as $data) {
      
      print_r($data);
      echo $data['_id'].'<br>';
    };
    //print_r($cursor);

      exit;

    //   $insertOneResult = $collection->insertOne([
    //      'username' => 'admin',
    //      'email' => 'admin@example.com',
    //      'name' => 'Admin User',
    //   ]);

      printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

      var_dump($insertOneResult->getInsertedId());