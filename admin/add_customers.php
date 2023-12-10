<?php include("header.php")?>
<?php include("include\sidebar.php");?> 
<?php 
    if($_SESSION['admin_email']){

        $query="select * from admin_login";
        $result=mysqli_query($connection,$query);
        $raw=mysqli_num_rows($result);
       

    }
    else{
    header("location:admin_login.php");
    }
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
    <li class="breadcrumb-item"><a href="add_customers.php">Add Customers</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Customers</h1>
          <!-- messages display -->
          
          </div>
          <!-- form add customers -->
          <div  style="width: 50%;margin-left:25%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#FBFCFC;">
          <form action="" method="POST" style="margin:3%;padding:3%;" name="customer_form">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="ctemail">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
  <div class="form-group">
    <label for="pwd">First Name:</label>
    <input type="text" class="form-control" id="pwd" name="fname">
  </div>
  <div class="form-group">
    <label for="pwd">Last Name</label>
    <input type="text" class="form-control" id="pwd" name="lname">
  </div>
  <div class="form-group">
    <label for="pwd">Admin_type</label>
    <select name="admin_type" id=""  class="form-control">
        <option value="1">super_admin</option>
        <option value="2">Customer_admin</option>
    </select>
  </div>
  <button type="submit" class="btn btn-block btn-default" name="submit">Submit</button>
</form>
          </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <!-- datatable jquery -->
    <!-- add admin details-->
    <?php 
        if(isset($_POST["submit"])){
            $email=$_POST["ctemail"];
            $password=$_POST["password"];
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $admin_type=$_POST["admin_type"];
            $query="insert into admin_login values(id,'$email','$password','$fname','$lname','$admin_type')";
            $result=mysqli_query($connection,$query);
            if($result){
               
            }
            else 
            {
             echo "data not submited";
            }

        }
    ?>
    <?php include("footer.php")?>