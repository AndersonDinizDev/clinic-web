<?php
require_once(__DIR__ . '/../config/database.php');

function getSiteConfig($database) {
  
  $query = "SELECT * FROM config";
  $stmt = $database->prepare($query);
  $stmt->execute();

  return $stmt->fetchAll(); 
}

function getUserInfo($database, $id) {
  $query = "SELECT * FROM users WHERE id = :userId";
  $stmt = $database->prepare($query);
  $stmt->bindParam(':userId', $id, PDO::PARAM_INT);
  $stmt->execute();

  return $stmt->fetchAll();
}