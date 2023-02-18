<?php 
  require_once("config/db.php");

  $sql = "CREATE TABLE IF NOT EXISTS entrys (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) NOT NULL,
    document VARCHAR(20) NOT NULL,
    observation TEXT,
    createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  $stmt = $connection->prepare($sql);
  $stmt->execute();
?>