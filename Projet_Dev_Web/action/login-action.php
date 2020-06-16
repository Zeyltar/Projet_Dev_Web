<?php 
  include('../inc/data.inc.php');

  if(!empty($_POST)) {
    $email = $_POST["email"];
    $query = "SELECT * FROM users WHERE email = '$email';";
    
    $result = $pdo->query($query);
    
    $row = $result->fetch(PDO::FETCH_OBJ);

    if(!empty($row)) {
      $hash = $row->userPassword;
      $id = $row->userID;
      if (password_verify($_POST['password'], $hash)) {
        $_SESSION["hash"] = $hash;
        $_SESSION["userID"] = $id;

        header("Location: ../index.php");
      }
      else {
        echo 'Invalid password.';
      }
    }
    exit();
  }