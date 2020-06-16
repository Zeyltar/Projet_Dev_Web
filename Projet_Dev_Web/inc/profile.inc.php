<hr class="m-0">
<section class="resume-section p-3 p-lg-5 d-flex align-items-center">
  <div class="w-50">  
  <h2 class="mb-5">Éditer le profil</h2>
    <form  method="POST" action="action/editProfile.php" enctype="multipart/form-data">
      <div class="form-row align-items-center">
        <div class="form-group col">
          <label for="firstName">Prénom</label>
          <input type="texte" class="form-control" name="firstName" maxlength=20 value="<?php echo $user->firstName; ?>" required>
        </div>
        <div class="form-group col">
          <label for="lastName">Nom</label>
          <input type="texte" class="form-control"name="lastName" maxlength=20 value="<?php echo $user->lastName; ?>" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" maxlength=50 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $user->email; ?>"required>
        </div>
      </div>
      <div class="form-group">
        <label for="profile_picture">Image de profil</label>
        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture[]" accept=".jpg,.jpeg,.png">
      </div>
      <button type="submit" class="btn btn-primary">Enregister</button>
    </form>
  </div>
</section>
<hr class="m-0">
