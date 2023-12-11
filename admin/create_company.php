<?php include("header.php")?>
<?php include("include\sidebar.php");?> 
<?php 
  $query="select * from company";
  $result=mysqli_query($connection,$query);
  
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="create_company.php">Company</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Company</h1>
           <a href="add_company.php" class="btn btn-primary">add Company</a>
          </div>
<!-- table print data -->
          <table class="table">
  <thead>
    <tr>
      <th scope="col">Company Name</th>
      <th scope="col">Description</th>
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
        
      <td><?php echo $data['cname'];?></td>
      <td><?php echo $data['description'];?></td>
      <td><a href="edit_company.php?uid=<?php echo $data['cid'];?>">edit</a></td>
      <td><a href="create_company.php?did=<?php echo $data['cid'];?>">delete</a></td>
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
           $query="delete from company where cid=$id";
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
