<!-- new_post.php start-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>
<!-- cdn link -->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <!-- cdn link -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <!-- Sign in page start -->
    <form class="form-signin" action="new-post.php" method="post">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign in">
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <!-- Sign in page end -->
  </body>
</html>

<?php
include("connection/db.php");

    if(isset($_POST["submit"])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        // if admin_type='2' then login other not
        $query="select * from admin_login where admin_email='$email' and admin_pass='$password' and admin_type='2'";
        $result=mysqli_query($connection,$query);
        $raw=mysqli_num_rows($result);
        if($raw>0){
            $_SESSION['admin_email']=$email;
            $_SESSION['admin_password']=$password;

          //watch part-16 satrt from 3:00  
            // header("location:admin/admin_dashboard.php");
            header("location:admin/admin_login.php");
        }
        else{
            // header("location:admin_login.php");
            echo "<script>alert('password or email is incorrect ,Please try again!')</script>";
            header("location:new-post.php");
        }
}
    
?>

<!-- new_post.php END-->
