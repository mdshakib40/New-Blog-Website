<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $fname = $fm->validation($_POST['firstname']);
                    $lname = $fm->validation($_POST['lastname']);
                    $email = $fm->validation($_POST['email']);
                    $body  = $fm->validation($_POST['body']);

                    $fname = mysqli_real_escape_string($db->link, $fname);
                    $lname = mysqli_real_escape_string($db->link, $lname);
                    $email = mysqli_real_escape_string($db->link, $email);
                    $body  = mysqli_real_escape_string($db->link, $body);

                    $error = "";
                    if (empty($fname)) {
                        $error = "First name must not be empty !";
                    } elseif(empty($lname)) {
                        $error = "Last name must not be empty !";
                    } elseif(empty($email)) {
                        $error = "Email must not be empty !";
                    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error = "Invalid Email must not be empty !";
                    } elseif(empty($body)) {
                        $error = "Massage field must not be empty !";
                    } else {
                        $query = "INSERT INTO tbl_contact(firstname, lastname, email, body) VALUES('$fname','$lname', '$email', '$body')";


                        $inserted_rows = $db->insert($query);
                         if ($inserted_rows) {
                             $msg = "Massage Sent Successfully";
                         } else {
                             $error = "Massage not Sent !!";
                         }
                    }
                }
            ?>
<div class="contact">
    <h3>Contact Us</h3>
    <?php 
     if(isset($error)) {
        echo "<span style='color:red;'>$error</span>";
     }
     if (isset($msg)) {
        echo "<span style='color:green;'>$msg</span>";
     }
    ?>
    <div class="About">
        <form action="" method="post">
            <table>
                <tbody>
                    <tr>
                        <td> Your First Name :</td>
                        <td>
                            <input type="text" name="firstname" placeholder="Enter Your First Name..." >
                        </td>
                    <tr>
                        <td>Your Last Name :</td>
                        <td>
                            <input type="text" name="lastname" placeholder="Enter Your Last Name...">
                        </td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td>
                            <input type="text" name="email" placeholder="Enter Your Email...">
                        </td>
                    </tr>
                    <tr>
                        <td>Massage :</td>
                        <td>
                            <textarea name="body">
                            
                            </textarea>
                        </td>
                        <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="submit">
                        </td>
                        </tr>
                    </tr>
                </tbody>
            </table>
            </form> 
        </div>
</div> 
<!-- page -->
</div> 

<?php include 'inc/footer.php';?>
</div>

</body>
</html>