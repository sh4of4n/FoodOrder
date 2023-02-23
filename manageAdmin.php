<!--Author: Lim Shao Fan-->
<?php include('menu.php');?>

        
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br/>
                
                <?php
                include "Singleton/DBconnection.php";
                
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];//Displaying session message
                        unset($_SESSION['add']);//Removing session message
                    }
                    
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
            
                    if(isset($_SESSION['user-not-found'])){
                        echo $_SESSION['user-not-found'];
                        unset ($_SESSION['user-not-found']);
                    }
                    
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    
                    if(isset($_SESSION['password-not-match'])){
                        echo $_SESSION['password-not-match'];
                        unset ($_SESSION['password-not-match']);
                    }
                    
                    if(isset($_SESSION['change-password'])){
                        echo $_SESSION['change-password'];
                        unset ($_SESSION['change-password']);
                    }
                    
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>
                <a href="./RESTService/RESTaddAdmin.php" class="btn-primary">Add Admin</a>
                
                <br/><br/><br/>
                <table class="tbl-full">
                    <tr>
                        <th>No.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    
                    <?php 
                        $sql ="SELECT * FROM tbl_admin";
                        //execute the query
                        $res = mysqli_query($conn,$sql);
                        
                        //check whether the query is executed or not
                        if($res==TRUE){
                            //count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res);//function to get all the rows in database 
                            $sn=1;
                            
                            //check the num of rows
                            if($count>0){
                                //we have data in database
                                while($rows= mysqli_fetch_assoc($res)){
                                    //using while loop to get all the data from database
                                    //and while loop will run as long as we have data in database
                                    
                                    //get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    
                                    //display the values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $full_name?></td>
                                        <td><?php echo $username?></td>
                                        <td>
                                            <a href="updatePassword.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="./View/updateAdmin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="deleteAdmin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                //we do not have data in database
                            }
                        }
                        
                    ?>
                    
                    
                    
                    
                </table>
                
            </div>
        </div>

<?php include('footer.php');?>
