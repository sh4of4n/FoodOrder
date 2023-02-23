<!--Author: Lim Shao Fan-->
<?php include('menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Member</h1>
        
        <br><br>
        
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type="text" name="name" placeholder="Your Name">
                    </td>
                </tr>
                
                <tr>
                    <td>Date of Birth:</td>
                    <td>
                        <input type="date" name="dob">
                    </td>
                </tr>
                
                <tr>
                    <td>Contact:</td>
                    <td>
                        <input type="number" name="contact">
                    </td>
                </tr>
                
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email">
                    </td>
                </tr>
                
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="address" cols="30" rows="5" placeholder="Your Address"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Member" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $member = simplexml_load_file('./XML/member.xml');
                $person = $member->addChild('person');
                $person->addChild('name', $_POST['name']);
                $person->addChild('date', $_POST['dob']);
                $person->addChild('contact', $_POST['contact']);
                $person->addChild('email', $_POST['email']);
                $person->addChild('address', $_POST['address']);
                
                $dom = new DomDocument();
                $dom->preserveWhiteSpace = false;
                $dom->formatOutput = true;
                $dom->loadXML($member->asXML());
                $dom->save('./XML/member.xml');
                
                if($dom==true){
                    $_SESSION['add']= "<div class='success'> Member Added Successfully.</div>";
                    header('location:'.SITEURL.'manageMember.php');
                }else{
                    $_SESSION['add']= "<div class='error'> Failed to Add Member.</div>";
                    header('location:'.SITEURL.'manageMember.php');
                }
            }
            
        ?>
        
    </div>
</div>

<?php include('footer.php');?>