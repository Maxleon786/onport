<?php include("header.php")?>
<?php include("include\sidebar.php");?> 
<?php 
    if($_SESSION['admin_email']){
    }
    else{
    header("location:admin_login.php");
    }
?>
<!-- data retriev -->
 <?php 
        if(isset($_GET['uid']))
        {
          $uid=$_GET['uid'];
          $query="select * from admin_login where id=$uid";
          $result=mysqli_query($connection,$query);
          $data=mysqli_fetch_assoc($result);
          
        }
 ?>
<!-- //// -->
        <!-- breadcrumb -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
    <li class="breadcrumb-item"><a href="edit_customers.php">Update Customers</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Customers</h1>
          <!-- message success -->
          </div>
          <!-- form add customers -->
          <div  style="width: 50%;margin-left:25%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#FBFCFC;">
          <form action="" method="POST" style="margin:3%;padding:3%;" name="customer_form">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="ctemail" value="<?php echo $data['admin_email'];?>">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password" value="<?php echo $data['admin_pass'];?>">
  </div>
  <div class="form-group">
    <label for="pwd">First Name:</label>
    <input type="text" class="form-control" id="pwd" name="fname" value="<?php echo $data['first_name'];?>">
  </div>
  <div class="form-group">
    <label for="pwd">Last Name</label>
    <input type="text" class="form-control" id="pwd" name="lname" value="<?php echo $data['last_name'];?>">
  </div>
  <div class="form-group">
    <label for="pwd">Admin_type</label>
    <select name="admin_type" id=""  class="form-control">
        <option value="1">super_admin</option>
        <option value="2">Customer_admin</option>
    </select>
  </div>
  <button type="submit" class="btn btn-block btn-default" name="submit">Update</button>
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
    <!-- UPDATE QUERY -->
    <?php 
    
    if(isset($_POST['submit']))
        {
          $uid=$_GET['uid'];
          $email=$_POST["ctemail"];
          $password=$_POST["password"];
          $fname=$_POST["fname"];
          $lname=$_POST["lname"];
          $admin_type=$_POST["admin_type"];
          $query="update admin_login set admin_email='$email',admin_pass='$password',first_name='$fname',last_name='$lname' where id=$uid";
          $result=mysqli_query($connection,$query);
          if($result){
            echo "update success";
          }
          else{
            echo "not update";
          }
          
        }
    
    ?>
    <?php include("footer.php")?>