<?php include("header.php")?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
            <form action="" method="POST">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="sign">Sign
                  in</button>
              </div>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- backend login page code -->
<?php
    if(isset($_POST["sign"])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="select * from admin_login where admin_email='$email' and admin_pass='$password'";
        $result=mysqli_query($connection,$query);
        $raw=mysqli_num_rows($result);
        if($raw>0){
            $_SESSION['admin_email']=$email;
            $_SESSION['admin_password']=$password;
            header("location:admin_dashboard.php");
        }
        else{
            header("location:admin_login.php");
        }
}
    
?>
<?php include("footer.php")?>