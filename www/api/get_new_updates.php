<?php

require_once("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  try {
    $stmt = $database->prepare("SELECT newupdate, creation FROM updates");

    if ($stmt->execute()) {

      $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

      header("Content-type: application/json");
      echo json_encode($response);
    }
  } catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erro ao buscar informações no banco de dados: " . $e->getMessage()]);
  }
}
