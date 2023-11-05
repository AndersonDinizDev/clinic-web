<?php

function getSiteConfig() {
  require_once(__DIR__ . '/../config/database.php');
  $query = "SELECT * FROM config";
  $stmt = $database->prepare($query);
  $stmt->execute();

  return $stmt->fetchAll(); 
}

$response = getSiteConfig();