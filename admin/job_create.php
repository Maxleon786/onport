<?php include("header.php")?>
<?php include("include\sidebar.php");?> 
<?php 
  $email=$_SESSION['admin_email'];
  $query="select * from all_job where customer_email='$email'";
  $result=mysqli_query($connection,$query);
  $raw=mysqli_num_rows($result);
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="job_create.php">Jobs</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">All jobs</h1>
           <a href="add_create_job.php" class="btn btn-primary">Create Job</a>
          </div>
<!-- table print data -->
          <table class="table">
  <thead>
    <tr>
      <th scope="col">Admin Email</th>
      <th scope="col">Job Title</th>
      <th scope="col">Description</th>
      <th scope="col">Country</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Keyword</th>
      <th scope="col">Category</th>
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
      <td><?php echo $data['customer_email'];?></td>
      <td><?php echo $data['job_title'];?></td>
      <td><?php echo $data['description'];?></td>
      <td><?php echo $data['contri'];?></td>
      <td><?php echo $data['state'];?></td>
      <td><?php echo $data['city'];?></td>
      <td><?php echo $data['keyword'];?></td>
      <td><?php echo $data['category'];?></td>
      <td><a href="job_edit.php?uid=<?php echo $data['job_id'];?>">edit</a></td>
      <td><a href="job_create.php?did=<?php echo $data['job_id'];?>">delete</a></td>
     <?php }}; ?>
  </tbody>
</table>
          </div>
        </main>
      </div>
    </div>
    <!-- delete company record -->
    <?php 
        if(isset($_GET['did'])){
           $id=$_GET['did'];
           $query="delete from all_job where job_id=$id";
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
