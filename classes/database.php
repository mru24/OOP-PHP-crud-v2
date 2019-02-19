<?php

require_once 'config.php';

abstract class Database {
  protected $pdo;
  protected $stmt;

  public function __construct() {
    $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ]);
    }
    catch(PDOException $e) {
      exit('Database error');
    }
  }

  public function query($q) {
    $this->stmt = $this->pdo->prepare($q);
  }

  public function bind($param, $value, $type = null) {
    if(is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute() {
    $this->stmt->execute();
  }

  public function showOne() {
    $this->execute();
    return $this->stmt->fetch();
  }

  public function showAll() {
    $this->execute();
    return $this->stmt->fetchAll();
  }

  public function __destruct() {
    exit();
  }
}
