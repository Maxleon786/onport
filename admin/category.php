
<?php include("header.php")?>
<?php include("include\sidebar.php");?> 
<!-- category.php start -->
<?php 

  $query="select * from job_category";
  $result=mysqli_query($connection,$query);
  
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="">Category</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Category</h1>
           <a href="add_category.php" class="btn btn-primary">Add Category</a>
          </div>
<!-- table print data -->
          <table class="table">
  <thead>
    <tr>
      <th scope="col">Category id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        //  if($raw>0){
            $sr=0;
          while($data=mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        
      <td><?php echo $data['id'];?></td>
      <td><?php echo $data['category'];?></td>
      <td><?php echo $data['des'];?></td>
      <td><a href="edit_category.php?uid=<?php echo $data['id'];?>">edit</a>
      <a href="category.php?did=<?php echo $data['id'];?>">delete</a></td>
     <?php }
    // }
    ; ?>
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
           $query="delete from job_category where id='$id'";
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
<!-- category.php end -->
<?php include("footer.php")?>

