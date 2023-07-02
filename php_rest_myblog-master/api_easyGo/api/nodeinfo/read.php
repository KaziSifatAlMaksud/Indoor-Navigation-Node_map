<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Nodeinfo.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $nodeinfo = new Nodeinfo($db);

  // Blog post query
  $result = $nodeinfo->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $nodeinfo_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $nodeinfo_item = array(
        'id' => $id,
        'node_number' => $node_number,
        'node_x' => $node_x,
        'node_y' => $node_y,
        'node_z' => $node_z,
        'parent' => $parent,
        'distance' => $distance,
        'floor' => $floor
        
      );

      // Push to "data"
      array_push($nodeinfo_arr, $nodeinfo_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($nodeinfo_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
