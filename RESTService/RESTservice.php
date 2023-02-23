<!--Author: Lim Shao Fan-->
<?php
require_once '../Model/Admin.php';

if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $name = $_GET['full_name'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    $admin = new Admin($id, $name, $username, $password);
        //Button Clicked
        //Get the data from Form
        $name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);//password encryption with MDS
        
        //sql query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
                full_name='$name',
                username='$username',
                password='$password'
                 ";

        //Executing Query and save data into database
        $res = mysqli_query($conn,$sql)or die(mysqli_error());
        
        //check whether the (query is executed)data is inserted or not and
        //display appropriate message
        if($res==TRUE){
            //Data Inserted
            //create a session variable to display message
            $_SESSION['add']="<div class='success'>Admin Added Succesfully<br/></div>";
            
            //redirect page to manage admin
            header("location:http://localhost/FoodOrder/manageAdmin.php");
            
        }else{
            //Fail to insert data
            //create a session variable to display message
            $_SESSION['add']="<div class='error'>Failled to Add Admin<br/></div>";
            
            //redirect page to manage admin
            header("location:http://localhost/FoodOrder/RESTService/RESTaddAdmin.php");
            
        }
        
    }else{
        //Button not Clicked
    }
    
?>