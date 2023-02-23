<!--Author: Lim Shao Fan-->
<?php
    include('constant.php');
    
    //so that users cannot change the link above, 
    //it will automatically redirect users back to manage category page
    if(isset($_GET['id'])AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        
        if($image_name!=""){
            //if image is available, delete it
            $path = "./images/category/".$image_name;
            
            $remove = unlink($path);
            
            //if fail to remove then add an error message and stop the process
            if($remove==false){
                $_SESSION['remove']="<div class='error'>Failed to Remove Category Image.</div>";
                header('location:'.SITEURL.'manageCategory.php');
                die();
            }
        }
        //delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['delete']= "<div class='success'> Category Deleted Successfully.</div>";
            header('location:'.SITEURL.'manageCategory.php');
        }else{
            $_SESSION['delete']= "<div class='error'> Failed to Delete Category.</div>";
            header('location:'.SITEURL.'manageCategory.php');
        }
    }else{
        header('location:'.SITEURL.'manageCategory.php');
    }

?>
