<?php

class UserModel extends Database

{
  private $pdo;

  public function __construct()
  {
    $this->pdo = $this->getConnection();
  }

  public function fetch()
  {
  }
}
