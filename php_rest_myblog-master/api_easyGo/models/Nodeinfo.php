<?php 
  class Nodeinfo {
    // DB stuff
    private $conn;
    private $table = 'Nodeinfo';

    // Post Properties
    public $id;
    public $node_number;
    public $node_x;
    public $node_y;
    public $node_z;
    public $parent;
    public $distance;
    public $floor

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT *
              FROM 
            ' . $this->table . '
              ORDER BY
              node_number DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT *
                                    FROM ' . $this->table . '
                                    WHERE
                                      p.id = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

       

          // Set properties
          $this->id = $row['id'];
          $this->node_number = $row['node_number'];
          $this->node_x = $row['node_x'];
          $this->node_y = $row['node_y'];
          $this->node_z = $row['node_z'];
          $this->parent = $row['parent'];
          $this->distance = $row['distance'];
          $this->floor = $row['floor'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET 
          node_number = :node_number, 
          node_x = :node_x, node_y = :node_y, node_z = :node_z, parent = :parent, distance = :distance, floor = :floor';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data


          $this->node_number = htmlspecialchars(strip_tags($this->node_number));
          $this->node_x = htmlspecialchars(strip_tags($this->node_x));
          $this->node_y = htmlspecialchars(strip_tags($this->node_y));
          $this->node_z = htmlspecialchars(strip_tags($this->node_z));
          $this->parent = htmlspecialchars(strip_tags($this->parent));
          $this->distance = htmlspecialchars(strip_tags($this->distance));
          $this->floor = htmlspecialchars(strip_tags($this->floor));


          // Bind data
          $stmt->bindParam(':node_number', $this->node_number);
          $stmt->bindParam(':node_x', $this->node_x);
          $stmt->bindParam(':node_y', $this->node_y);
          $stmt->bindParam(':node_z', $this->node_z);
          $stmt->bindParam(':parent', $this->parent);
          $stmt->bindParam(':distance', $this->distance);
          $stmt->bindParam(':floor', $this->floor);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
          SET 
          node_number = :node_number, 
          node_x = :node_x, node_y = :node_y, node_z = :node_z, parent = :parent, distance = :distance, floor = :floor
          WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->node_number = htmlspecialchars(strip_tags($this->node_number));
          $this->node_x = htmlspecialchars(strip_tags($this->node_x));
          $this->node_y = htmlspecialchars(strip_tags($this->node_y));
          $this->node_z = htmlspecialchars(strip_tags($this->node_z));
          $this->parent = htmlspecialchars(strip_tags($this->parent));
          $this->distance = htmlspecialchars(strip_tags($this->distance));
          $this->floor = htmlspecialchars(strip_tags($this->floor));

          // Bind data
          $stmt->bindParam(':node_number', $this->node_number);
          $stmt->bindParam(':node_x', $this->node_x);
          $stmt->bindParam(':node_y', $this->node_y);
          $stmt->bindParam(':node_z', $this->node_z);
          $stmt->bindParam(':parent', $this->parent);
          $stmt->bindParam(':distance', $this->distance);
          $stmt->bindParam(':floor', $this->floor);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }