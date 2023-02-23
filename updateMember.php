<!--Author: Lim Shao Fan-->
<?php include('menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Member</h1>
        
        <br><br>
        
        <form action="" method="POST">
            <table class="tbl-30">
                <?php
                        $name = $_GET['name'];
                        
                        $file = simplexml_load_file('./XML/member.xml');
                        foreach($file->person as $person){
                            if($person->name == $name){
                        ?>
                <tr>
                    <td>Member Name:</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $person->name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td>
                        <input type="date" name="dob" value="<?php echo $person->date; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Contact:</td>
                    <td>
                        <input type="number" name="contact" value="<?php echo $person->contact; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $person->email; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="address" cols="30" rows="5"><?php echo $person->address;?></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="edit" value="Done Edit" class="btn-secondary">
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </form>
        
        <?php
	if(isset($_POST['edit'])){
            $member = simplexml_load_file('./XML/member.xml');
            foreach($member->person as $person){
                    if($person->name == $name){
                            $person->name = $_POST['name'];
                            $person->date = $_POST['dob'];
                            $person->contact = $_POST['contact'];
                            $person->email = $_POST['email'];
                            $person->address = $_POST['address'];
                            break;
                    }
            }

            $save = file_put_contents('./XML/member.xml', $member->asXML());

            if($save==true){
                $_SESSION['update'] = "<div class='success'>Member Updated successfully.</div>";
                header('location:'.SITEURL.'manageMember.php');
            }else{
                $_SESSION['update'] = "<div class='error'>Failed to Edit Member</div>";
                header('location:'.SITEURL.'manageMember.php');
            }
	}
	
 
        ?>
        
    </div>
</div>

<?php include('footer.php');?>


