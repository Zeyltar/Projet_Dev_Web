<?php 
  session_start();
  $_SESSION["userID"] = "";
  $_SESSION["hash"] = "";
  session_destroy();
  header("Location: ../index.php");
  exit();