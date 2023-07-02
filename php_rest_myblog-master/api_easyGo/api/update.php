<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Nodeinfo.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $nodeinfo = new Nodeinfo($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $nodeinfo->id = $data->id;
  $nodeinfo->node_number = $data->node_number;
  $nodeinfo->node_x = $data->node_x;
  $nodeinfo->node_y = $data->node_y;
  $nodeinfo->node_z = $data->node_z;
  $nodeinfo->parent = $data->parent;
  $nodeinfo->distance = $data->distance;
  $nodeinfo->floor = $data->floor;


  // Update post
  if($nodeinfo->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

