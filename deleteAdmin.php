<!--Author: Lim Shao Fan-->
<?php 
    include('constant.php');
    
    $id = $_GET['id'];
    
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    
    $res = mysqli_query($conn,$sql);
    
    if($res == true){
        //echo "Admin Deleted";
        $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
        header('location:'.SITEURL.'manageAdmin.php');
    }else{
        //echo "Failed to Delete Admin";
        $_SESSION['delete']="<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'manageAdmin.php');
    }
?>
