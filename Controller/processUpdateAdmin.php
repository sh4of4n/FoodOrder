<!--Author: Lim Shao Fan-->
<?php

require_once "../Singleton/DBconnection.php";
require_once "../Model/Admin.php"; 


if(isset($_POST['submit'])){
    //echo "Button Clicked";
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $updateAdmin = new Admin($id, $full_name, $username);

    $_SESSION['updateID']= $id;
    $updateAdmin->updateAdmin();
    if($updateAdmin==true){
        $_SESSION['update']="<div class='success'>Admin Updated Successfully!!</div>";
        header('location:'.SITEURL.'manageAdmin.php');
    }else{
        $_SESSION['update']="<div class='error'>Fail to update admin</div>";
        header('location:'.SITEURL.'manageAdmin.php');
    }
}
