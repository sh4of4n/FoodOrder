<!--Author: Lim Shao Fan-->
<?php include('../menu.php');?>

<head>
    <link rel="stylesheet" href="../css/admin.css"/>
</head>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/><br/>
        
        <?php 
            if(isset($_SESSION['add'])){ //checking whether the session is set or not
                echo $_SESSION['add'];//Displaying the session message
                unset ($_SESSION['add']); //Removing the session message
            }
        ?>
        
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"/></td>
                </tr>
                
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Your Username"/></td>
                </tr>
                
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Your Password"/></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php include('../RESTService/RESTservice.php')?>
    </div>
</div>
<?php include('../footer.php');?>



