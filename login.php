<!-- Job-post.php start -->
<?php include('connection.php');?>
<?php include('session.php');?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>login</title>
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
    <form class="form-signin" action="" method="POST">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="sign">sign in</button>
      <a href="sign_up.php">Create a Account</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <!-- Sign in page end -->
  </body>
</html>
<?php 
    if(isset($_POST["sign"])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="select * from jobseeker where email='$email' and password='$password'";
        $result=mysqli_query($connection,$query);
        $raw=mysqli_num_rows($result);
        echo $raw;
        if($raw>0){
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            header("location:index.php");
        }
        else{
           header("location:login.php");
        }
      }
?>

<!-- Job-post.php END -->
