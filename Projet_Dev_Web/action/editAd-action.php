<?php
include('../inc/data.inc.php');

if(!empty($_POST))
{
  $userID = $user->userID;

  if (key($_POST) == "show") {
    $result = $pdo->exec("UPDATE ads INNER JOIN users SET adStatus = 1 WHERE adID = '$_POST[show]' AND ads.userID = users.userID AND users.userID = '$userID';");
  } elseif (key($_POST) == "hide") {
    $result = $pdo->exec("UPDATE ads INNER JOIN users SET adStatus = 0 WHERE adID = '$_POST[hide]' AND ads.userID = users.userID AND users.userID = '$userID';");
  } elseif (key($_POST) == "delete") {
    $result = $pdo->exec("DELETE images.* FROM images, ads WHERE images.adID = ads.adID AND ads.adID = '$_POST[delete]';");
    $result = $pdo->exec("DELETE ads.* FROM ads, users WHERE adID = '$_POST[delete]' AND ads.userID = users.userID AND users.userID = '$userID'");

  }
  header("Location: ../editAd.php");
  exit();
}