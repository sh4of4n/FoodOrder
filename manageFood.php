<!--Author: Lim Shao Fan-->
<?php include('menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        
        <br/><br/>
        
        
        <?php
        
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            
            if(isset($_SESSION['unauthorize'])){
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }
            
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        
        ?>
        <br/><br/>
        <a href="addFood.php" class="btn-primary">Add Food</a>

        <br/><br/><br/>
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM tbl_food";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                $sn=1;
                if($count>0){
                    //have food in database
                    while($row= mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $title; ?></td>
                            <td>RM<?php echo $price; ?></td>
                            <td>
                                <?php 
                                    if($image_name==""){
                                        echo "<div class='error'>Image is not Added.</div>";
                                    }else{
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px">
                                        <?php
                                    }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="updateFood.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                <a href="deleteFood.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
                            </td>
                        </tr>
            
                        <?php
                    }
                }else{
                    //no food in database
                    echo "<tr><td colspan='7' class='error'>Food Not Added Yet.</td></tr>";
                }
            ?>
            
        </table>
    </div>
</div>

<?php include('footer.php');?>