<form class="form-inline my-2 my-lg-0" method="POST" action="action/login-action.php">
  <div class="form-group">
    <input class="form-control mr-sm-2" type="email" aria-label="Email" name="email" placeholder="Email" maxlength=50 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>  
    <input class="form-control mr-sm-2" type="password" aria-label="Password" name="password" placeholder="Password" min=4 required>
  </div>
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
</form>