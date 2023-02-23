<!--Author: Lim Shao Fan-->
<?php include('menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Member</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
        
        <br/><br/>
        <a href="addMember.php" class="btn-primary">Add Member</a>

        <br/><br/><br/>
        
        <?php include('./XML/XSLTTransformation.php');?>
    </div>
       
</div>

<?php include('footer.php');?>