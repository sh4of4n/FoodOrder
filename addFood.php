<!--Author: Lim Shao Fan-->
<?php include('menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        
        <br><br>
        
        <?php
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Title Of The Food">
                    </td>
                </tr>
                
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description Of The Food"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            
                            <?php
                                //display categories from Database
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                $res = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($res);
                                if($count>0){
                                    //have categories
                                    while($row=mysqli_fetch_assoc($res)){
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                        
                                        <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                        <?php
                                        
                                    }
                                }else{
                                    //do not have categories
                                    ?>
                                    <option value="0"> No Category Found</option>
                                    <?php
                                }
                            ?>
                            
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        
        <?php
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                
                //check whether the button are checked or not
                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }else{
                    $featured = "No";
                }
                
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }else{
                    $active = "No";
                }
                
                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    
                    if($image_name!=""){
                        //image is selected
                        $ext = end(explode('.',$image_name));
                        
                        $image_name = "Food_Name_".rand(000,999).".".$ext;
                        
                        //source path
                        $source_path = $_FILES['image']['tmp_name'];
                        
                        //destination path
                        $destination_path = "./images/food/".$image_name;
                        
                        $upload = move_uploaded_file($source_path, $destination_path);
                        
                        if($upload==false){
                            $_SESSION['upload']= "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'addFood.php');
                            die();
                        }
                    }
                }else{
                    //default value blank
                    $image_name = "";
                }
                
                $sql2 = "INSERT INTO tbl_food SET
                        title = '$title',
                        description = '$description',
                        price = '$price',
                        image_name = '$image_name',
                        category_id = '$category',
                        featured = '$featured',
                        active = '$active'
                ";
                
                $res2 = mysqli_query($conn,$sql2);
                
                if($res2==true){
                    $_SESSION['add']= "<div class='success'>Food Added Successfully.</div>";
                    header('location:'.SITEURL.'manageFood.php');
                }else{
                    $_SESSION['add']= "<div class='error'>Failed to Add Food.</div>";
                    header('location:'.SITEURL.'manageFood.php');
                }
            }
            
        ?>
    </div>
</div>

<?php include('footer.php');?>