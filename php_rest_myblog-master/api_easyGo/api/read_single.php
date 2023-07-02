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

  // Get ID
  $nodeinfo->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $nodeinfo->read_single();

  // Create array
  $nodeinfo_arr = array(

    'id' => $id -> id,
    'node_number' => $node_number ->node_number,
    'node_x' => $node_x ->node_x,
    'node_y' => $node_y -> node_y,
    'node_z' => $node_z -> node_z,
    'parent' => $parent -> parent,
    'distance' => $distance -> distance,
    'floor' => $floor -> floor
  );

  // Make JSON
  print_r(json_encode($nodeinfo_arr));