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
        <hr class="m-0">
          <section class="resume-section p-3 p-lg-5 d-flex justify-content-center">
            <div class="w-100"> 
              <h2 class="mb-5">Poster une annonce</h2>
              <form method="POST" action="action/postAd-action.php" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-3">
                    <label for="title">Titre</label>
                    <input type="texte" class="form-control" id=title name="title" maxlength=50 required>
                  </div>          
                </div>
                <div class="form-row">
                  <div class="form-group col-3">
                    <label for="price">Prix</label>
                    <input type="number" class="form-control" id=price name="price" min=0 max=999999.99 step="0.01">
                  </div>          
                </div>
                <div class="form-row">
                  <div class="form-group col-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" id=description name="description" maxlength=500 required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="images">Image(s)</label>
                  <input type="file" class="form-control-file" id=images name="images[]" accept=".jpg,.jpeg,.png" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Poster</button>
              </form>
            </div>
          </section>
        <hr class="m-0">  
      </div>
  <?php }
    include('inc/footer.inc.php'); ?>