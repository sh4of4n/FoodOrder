<!--Author: Lim Shao Fan-->
<?php

    include('constant.php');
    $name = $_GET['name'];

    $member = simplexml_load_file('./XML/member.xml');

    //we're are going to create iterator to assign to each user
    $index = 0;
    $i = 0;

    foreach($member->person as $person){
            if($person->name == $name){
                    $index = $i;
                    break;
            }
            $i++;
    }

    unset($member->person[$index]);
    file_put_contents('./XML/member.xml', $member->asXML());
    
    
    $_SESSION['delete']="<div class='success'>Member Delete Successfully.</div>";
    header('location:'.SITEURL.'manageMember.php');
 
?>
