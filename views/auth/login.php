<div class="container">
  <div class="row justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-4">
      <div class="card text-left">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <form action="<?php echo BASE_URL ?>/auth/do_login" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelpId" placeholder="">
            </div>
            <div class="form-group">
              <button name="login" class="btn btn-primary">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>