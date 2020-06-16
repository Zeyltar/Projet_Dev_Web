<?php
include('../inc/data.inc.php');

if(!empty($_POST)) {
  
  $queryImg = "";

  if (!empty($_FILES)) {
    $name = "profile.";
    foreach ($_FILES["profile_picture"]["error"] as $key => $error) {
      if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["profile_picture"]["tmp_name"][$key];
        $name .= pathinfo($_FILES["profile_picture"]["name"][$key], PATHINFO_EXTENSION);

        if(!file_exists("../users/$user->userID"))
        {
          mkdir("../users/$user->userID", 0700);
        }
        move_uploaded_file($tmp_name, "../users/$user->userID/$name");
        $queryImg = ", picturePath = '$user->userID/$name'";
      }
    }

    $_POST["firstName"] = htmlentities($_POST["firstName"], ENT_QUOTES);    
    $_POST["lastName"] = htmlentities($_POST["lastName"], ENT_QUOTES);   
    $_POST["email"] = htmlentities($_POST["email"], ENT_QUOTES);   

    $sql = "UPDATE users SET firstName = '$_POST[firstName]', lastName = '$_POST[lastName]'$queryImg WHERE userID = '$user->userID';";
    $result = $pdo->exec($sql);
    
  }

  header('Location: ../profile.php');
  exit();
}