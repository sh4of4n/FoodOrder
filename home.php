<!--Author: Lim Shao Fan-->
<?php include('menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php
            
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            if(isset($_SESSION['date'])){
            echo $_SESSION['date'];
            unset ($_SESSION['date']);
        }
        ?>
        <br><br>
        
        <div class="col-4 text-center">
            <?php
                $sql3 = "SELECT * FROM tbl_admin";
                $res3 = mysqli_query($conn,$sql3);
                $count3 = mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3;?></h1>
            Admins
        </div>

        <div class="col-4 text-center">
            <?php
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
            ?>
            <h1><?php echo $count;?></h1>
            Categories
        </div>

        <div class="col-4 text-center">
            <?php
                $sql2 = "SELECT * FROM tbl_food";
                $res2 = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2;?></h1>
            Foods
        </div>

        <div class="col-4 text-center">
            <?php
            $file = simplexml_load_file('./XML/member.xml');
            ?>
            <h1><?php echo $file->person->count(); ?></h1>
            Members
        </div>

        

        <div class="clearfix"></div>
    </div>
</div>
        
<?php include('footer.php');?>
