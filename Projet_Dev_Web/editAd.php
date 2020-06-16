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
    else {
      $userID = $user->userID;
      $query = "SELECT ads.* FROM ads JOIN users WHERE ads.userID = users.userID AND users.userID = '$userID';";
      $result = $pdo->query($query);
      $ads = $result->fetchAll(PDO::FETCH_OBJ);
    ?>  
      <div class="container-fluid p-0">
        <hr class="m-0">
          <section class="resume-section p-3 p-lg-5 d-flex justify-content-center">
            <div class="w-100"> 
              <h2 class="mb-5">Modifier ses annonces</h2>
              <div class="d-flex">
                <?php for ($i=0; $i < count($ads) ; $i++) { ?>
                  <div class="card mb-3 w-25 ml-2 mr-2 ">
                    <?php 
                      $adID = $ads[$i]->adID;
                      $query = "SELECT images.* FROM images JOIN ads WHERE images.adID = ads.adID AND ads.adID = '$adID';";
                      $result = $pdo->query($query);
                      $images = $result->fetchAll(PDO::FETCH_OBJ);
                      if (count($images) > 0) { 
                        $carouselId = "carouselControls" . $i; ?>                      
                        <div id="<?php echo $carouselId; ?>" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="<?php echo "ads/" . $images[0]->imagePath; ?>" class="d-block w-100" alt="...">
                            </div>
                            <?php for ($j=1; $j < count($images); $j++) { ?>
                              <div class="carousel-item">
                                <img src="<?php echo "ads/" . $images[$j]->imagePath; ?>" class="d-block w-100" alt="...">
                              </div>
                            <?php } ?>                          
                          </div>
                          <?php if (count($images) > 1) { ?>
                            <a class="carousel-control-prev" href="<?php echo "#" . $carouselId; ?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="<?php echo "#" . $carouselId; ?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          <?php } ?> 
                        </div>
                      <?php } ?>                    
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h5 class="card-title card-text"><?php echo $ads[$i]->title; ?></h5>
                        <p class="card-text"><small class="text-muted"><?php echo $ads[$i]->price . " €"; ?></small></p>
                      </div>
                      <p class="card-text overflow-auto"><?php echo $ads[$i]->description; ?></p>
                      <p class="card-text"><small class="text-muted"><?php echo $ads[$i]->datePublication; ?></small></p>
                    </div>
                    <form class="position-absolute w-100 zi" action="action/editAd-action.php" method="post">
                        <div class="float-right my-1 mx-1">
                          <?php if ($ads[$i]->adStatus) { ?>
                            <button type="submit" class="btn btn-secondary" name="hide" value=<?php echo $adID; ?>><i class="fas fa-eye-slash"></i></button>
                          <?php } else { ?>
                            <button type="submit" class="btn btn-primary" name="show" value=<?php echo $adID; ?>><i class="fas fa-eye"></i></button>
                          <?php } ?>                          
                          <button type="submit" class="btn btn-danger" name="delete" value=<?php echo $adID; ?>><i class="fas fa-trash"></i></button>
                        </div>                        
                    </form>
                  </div>
                <?php } ?>
              </div>
              

              
            </div>
            
          </section>
        <hr class="m-0">
        
      </div>
  <?php }
    include('inc/footer.inc.php'); ?>