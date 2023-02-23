<!--Author: Lim Shao Fan-->
<?php include '../menu.php';?>

<head>
    <link rel="stylesheet" href="../css/admin.css"/>
</head>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php 
            $id = $_GET['id'];  
            
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";
            
            $res = mysqli_query($conn,$sql);
            
            if($res == true){
                $count = mysqli_num_rows($res);
                if($count==1){
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($res);
                    
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }else{
                    header('location:'.SITEURL.'manageAdmin.php');
                }
            } 
        ?>
        
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $row['username']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php include '../Controller/processUpdateAdmin.php' ?>
    </div>
</div>


<?php include '../footer.php';?>