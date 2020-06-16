<?php
include('../inc/data.inc.php');

if(!empty($_POST)) {
  $userID = $user->userID;
  $date = date("Y-m-d");

  $_POST["title"] = htmlentities($_POST["title"], ENT_QUOTES);
  $_POST["description"] = htmlentities($_POST["description"], ENT_QUOTES);
 
  $query = "INSERT INTO ads (userID, title, price, description, datePublication, adStatus) VALUES ('$userID', '$_POST[title]', '$_POST[price]', '$_POST[description]', '$date', 1);";

  $result = $pdo->exec($query);
  $adID = $pdo->lastInsertId();
  
  if(!empty($_FILES))
  {
    $dir = "../ads/$adID";
    foreach ($_FILES["images"]["error"] as $key => $error) {
      if ($error == UPLOAD_ERR_OK) {
        if(!file_exists($dir)) {
          mkdir($dir, 0700);
          $count = 0;
        }
        else {
          $count = count(scandir($dir))-2;
        }
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $fileName = "image" . $count . "." . pathinfo($_FILES["images"]["name"][$key], PATHINFO_EXTENSION);
        move_uploaded_file($tmp_name, "$dir/$fileName");

        $query = "INSERT INTO images (adID, imagePath) VALUES ('$adID', '$adID/$fileName');";
        $result = $pdo->exec($query);
      }
    }
  }
  
  header("Location: ../postAd.php");
  exit();
}