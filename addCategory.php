<!--Author: Lim Shao Fan-->
<?php include('menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        
        <br><br>
        
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        
        <br><br>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
                
            </table>
            
        </form>
        
        <?php
        
            if(isset($_POST['submit'])){
                //echo "Clicked";
                $title = $_POST['title'];
                
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
                
                //Check whether the image is selected or not and set the value for image name accordingly
                //print_r($_FILES['image']);
                
                if(isset($_FILES['image']['name'])){
                    //source path
                    $image_name = $_FILES['image']['name'];
                    
                    //upload the image only if image is selected
                    if($image_name!=""){
                        
                        //rename image
                        $ext = end(explode('.',$image_name));
                        $image_name = "Food_Category_".rand(000,999).'.'.$ext;


                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "./images/category/".$image_name;

                        //upload image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check whether image is uploaded or not
                        if($upload == false){
                            $_SESSION['upload']= "<div class='error'> Failed to upload image.</div>";
                            header('location:'.SITEURL.'addCategory.php');
                            //stop the process
                            die();
                        }
                    }
                }else{
                    //Dont upload image and set the image_name value as blank
                    $image_name = "";
                }
                
                $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";
                
                $res = mysqli_query($conn,$sql);
                
                if($res==true){
                    $_SESSION['add']= "<div class='success'> Category Added Successfully.</div>";
                    header('location:'.SITEURL.'manageCategory.php');
                }else{
                    $_SESSION['add']= "<div class='error'> Failled to Add Category.</div>";
                    header('location:'.SITEURL.'addCategory.php');
                }
            }
        ?>
        
    </div>
</div>

<?php include('footer.php'); ?>