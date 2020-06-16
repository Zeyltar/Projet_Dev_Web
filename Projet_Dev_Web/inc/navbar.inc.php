<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">lIeN qUi MaRcHe PaS</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Annonces
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="postAd.php">Poster une annonce</a>
          <a class="dropdown-item" href="editAd.php">Modifier ses annonces</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item disabled" href="#">cHeh</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Messagerie</a>
      </li>
    </ul>
    
    <?php 
      if (empty($_SESSION["userID"])) {
        include('inc/login-navbar.inc.php'); 
      }
      else { 
        ?>
        <div class="navbar-nav">
          <div class="nav-item active">
            <a class="nav-link" href="profile.php">
              <span class=""><?php echo $user->firstName . " " . $user->lastName; ?></span>
              <span class="">
                <img class="img-profile rounded-circle" src="<?php echo "users/$user->picturePath"; ?>">
              </span>
            </a>
            
          </div>
          <form class="nav-link m-auto p-0" action="action/disconnect.php" method="post">
              <button type="submit" class="btn btn-danger rounded-circle d-flex justify-content-center" name="disconnect" style="width: 30px; height:30px"><i class="fas fa-times-circle" style="width: 30px; height:30px"></i></button>
          </form>
        </div>
        
      <?php } ?>
  </div>
</nav>