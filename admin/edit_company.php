<?php include("header.php")?>
<?php include("include\sidebar.php");?> 
<?php 
    if($_SESSION['admin_email']){

        $query="select * from company";
        $result=mysqli_query($connection,$query);
        $raw=mysqli_num_rows($result);
        $data=mysqli_fetch_assoc($result);
    }
    else{
    header("location:admin_login.php");
    }
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="create_company.php">Company</a></li>
    <li class="breadcrumb-item"><a href="add_company.php">Update Company</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Update Company</h1>
          <!-- messages display -->
          </div>
          <!-- form add customers -->
          <div  style="width: 50%;margin-left:25%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#FBFCFC;">
          <form action="" method="POST" style="margin:3%;padding:3%;" name="customer_form">
  <div class="form-group">
    <label for="email">Company Name:</label>
    <input type="text" class="form-control" id="email" name="companyname"  value="<?php echo $data['cname'];?>">
  </div>
  <div class="form-group">
      <label for="my-textarea">Text</label>
      <textarea id="my-textarea" class="form-control" name="description" rows="10">
      <?php echo $data['description'];?>
      </textarea>
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
    <!-- update admin details-->
    <?php 
         if(isset($_POST['submit']))
         {
           $uid=$_GET['uid'];
           $company=$_POST["companyname"];
           $description=$_POST["description"];
           $query="update company set cname='$company',description='$description' where cid=$uid";
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