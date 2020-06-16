<?php 
  include('inc/header.inc.php');
  include('inc/data.inc.php');
?>
<body>
  <?php
    include('inc/navbar.inc.php');

    if (empty($_SESSION["userID"]) || empty($_SESSION["hash"]))
    {
      echo "Vous devez être connecté(e) pour consulter cette page.";
    }
    else { ?>
      <div class="container-fluid p-0">
      <?php 
        include("inc/profile.inc.php");
      ?>
      </div>
  <?php }
    include('inc/footer.inc.php'); ?>
  