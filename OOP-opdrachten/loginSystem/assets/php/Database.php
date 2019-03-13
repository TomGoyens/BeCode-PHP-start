<?php

class Database{
  private $host = "localhost";
  private $username = "veryCoolUser";
  private $password = "unGuessable1010";
  private $userTable = "users2";
  private $dbname = "OOP_opdr";

  public function getTable(){
    return $this->userTable;
  }

  public function connect(){
    //make mysql connection
    $conn = new mysqli($this->host, $this->username, $this->password);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //create user database if necessary
    $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error creating database: " . $conn->error;
    }
    //connect to database
    $conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
    if ($conn->connect_error) {
       die("Connection to database failed: " . $conn->connect_error);
    }
    return $conn;
  }
  public function initTable($conn){
    //create userTable if necessary
    $sql = "CREATE TABLE IF NOT EXISTS $this->userTable (
      id INTEGER(6) AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      email VARCHAR(50) NOT NULL UNIQUE,
      password VARCHAR(30) NOT NULL
      )";
    if ($conn->query($sql) === TRUE) {
        // echo "Table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
  }
}

class User{
  private $id;
  private $username;
  private $email;
  private $password;
  private $connected;
  private $dbname = "OOP_opdr";


  public function __construct(){

  }

  public function JSONize(){
    return json_encode($this);
  }

  public function setId($id){
    $this->id = $id;
  }
  public function setUsername($user){
    $this->username = $user;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function setPassword($password){
    $this->password = $password;
  }
  public function setConnected($connected){
    $this->connected = $connected;
  }
  public function getId($id){
    return $this->id;
  }
  public function getUsername(){
    return $this->username;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getPassword(){
    return $this->password;
  }
  public function getConnected(){
    return $this->connected;
  }

  public function login($login, $password){

  }

  // public function register(){
  //   $sql = $this->connect($dbname)->prepare("INSERT INTO $this->userTable (username, email, password)
  //   VALUES (?, ?, ?)");
  //   $sql->bind_param("sss", $this->username, $this->email, $this->password);
  //   $sql->execute();
  // }
  // public function updateUsername($update){
  //   $sql = $this->connect($dbname)->prepare("UPDATE $this->userTable SET username= ? WHERE id = '$this->id'");
  //   $sql->bind_param("sss", $this->username, $this->email, $this->password);
  //   $sql->execute();
  // }
}
