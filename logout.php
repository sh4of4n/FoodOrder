<!--Author: Lim Shao Fan-->
<?php
    include('constant.php');
    //destroy the session
    session_destroy();//unset $_SESSION['user']
    
    header('location:'.SITEURL.'login.php');
    
?>
