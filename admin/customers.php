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

<!-- breadcrumb -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Customers</h1>
           <a href="add_customers.php" class="btn btn-primary">add customers</a>
          </div>
<!-- table print data -->
          <table class="table">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Admin Type</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
         if($raw>0){
            $sr=0;
          while($data=mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        
      <td><?php echo $data['admin_email'];?></td>
      <td><?php echo $data['first_name'];?></td>
      <td><?php echo $data['last_name'];?></td>
      <td><?php echo $data['admin_type'];?></td>
      <td><a href="edit_customers.php?uid=<?php echo $data['id'];?>">edit</a></td>
      <td><a href="customers.php?did=<?php echo $data['id'];?>">delete</a></td>
     <?php }}; ?>
  </tbody>
</table>
          
          </div>
        </main>
      </div>
    </div>
    <!-- end table -->

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
    <!-- delete query -->
    <?php 
        if(isset($_GET['did'])){
           $id=$_GET['did'];
           $query="delete from admin_login where id=$id";
           $result=mysqli_query($connection,$query);
           if($result)
           {
             echo "record deleted success";
           }
           else{
            echo "not delete";
           }
        }
    ?>
    <?php include("footer.php")?>