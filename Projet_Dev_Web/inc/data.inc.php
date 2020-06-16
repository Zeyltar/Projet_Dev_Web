<?php
  session_start();
  $pdo = new PDO("mysql:host=localhost;dbname=projet_dev_web", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

  if (!empty($_SESSION["userID"]) && !empty($_SESSION["hash"])) {
    $hash = $_SESSION["hash"];
    $id = $_SESSION["userID"];

    $query = "SELECT * FROM users WHERE userID = '$id' AND userPassword = '$hash';";
    
    $result = $pdo->query($query);
    $user = $result->fetch(PDO::FETCH_OBJ);
  }