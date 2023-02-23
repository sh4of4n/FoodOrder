<!--Author: Lim Shao Fan-->
<?php include ('constant.php');?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="./css/admin.css"/>
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
            <div style="text-align: center; font-style: bold;">
                <?php
                    date_default_timezone_set('Asia/Kuala_Lumpur');
                    
                    echo date('d-m-y, l'); 
                    echo "<br>".date('h:i:s.a');
                ?>
            </div>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
               
            ?>
            <br><br>
            
            
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username"><br><br>
                
                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>
                
                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
            </form>
            
            <p class="text-center">Created by - <b>Shao Fan</b></p>
        </div>
    </body>
</html>

<?php
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $_SESSION['date'] = "<div class='success'>Login time will be ".date('h:i:s.a').".</div>";
        
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        
        $res = mysqli_query($conn,$sql);
        
        $count = mysqli_num_rows($res);
        
        if($count==1){
            $_SESSION['login']="<div class='success'>Login Successful as ".$username.".</div>";
            $_SESSION['user']= $username;//to check whether the user is logged in or not and logout will unset it
            
            header('location:'.SITEURL.'home.php?username='.$username);
        }else{
            $_SESSION['login']="<div class='error text-center'>Incorrect Username or Password.</div>";
            header('location:'.SITEURL.'login.php');
        }
    }

?>