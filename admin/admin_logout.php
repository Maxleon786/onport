<!-- admin_Logout.php start -->
<?php 
session_start();
session_unset();

include("include/connection.php");
$query = mysqli_query($connection,"select * from admin_login where admin_email='{$_SESSION['admin_email']}' and admin_type='2'");
if($query){
// http_link or main link
header("location:http://localhost/job_portal/onport/");
}else{
header("location:admin/admin_login.php");
}
?>

<!-- admin_Logout.php end -->
