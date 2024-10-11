<?php
  include '../lib/Session.php';
  Session::init();
?>
<?php include '../lib/database.php';?>
<?php include '../helpers/format.php';?>
<?php include '../config/config.php';?>

<?php
    $db = new Database();
    $fm = new Format();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <div class="login-box">
           
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $email = $fm->validation($_POST['email']);
                
                    $email = mysqli_real_escape_string($db->link, $email);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "<p style='color:red; margin-left:50px; font-size:17px;'>Invalid Email Address!!</p>";
                    } else {
                        $mailquery = "SELECT * FROM tbl_user WHERE email = '$email' limit 1";
                        $mailchek = $db->select($mailquery);
                     if ($mailchek != false) {
                        while($value = $mailchek->fetch_assoc()) {
                            $userid = $value['id'];
                            $username = $value['username'];
                        }
                        $text = substr($email, 0, 3);
                        $rand = rand(10000, 99999);
                        $newpass = "$text$rand";
                        $password = md5($newpass);
                        $updatequery = "UPDATE tbl_user
                          SET
                          password = '$password'
                          WHERE id = '$userid'";
                       $updated_row = $db->update($updatequery);


                    $to = "$email";
                    $from = "shamim@gmail.com";
                    $headers = "From: $from\n";
                    $headers .= 'MIME-Version: 1.0';
                    $headers .= 'Content-type: text/html; charset=iso-8859-1';
                    $subject = "Your Password";
                    $message = "Your Username Is ".$username." And Password ".$newpass. "Please Visit Website To Login";

                     $sendmail = mail($to, $subject, $massege, $headers);
                     if($sendmail) {
                        echo "<p style='color:green; margin-left:50px; font-size:17px;'>Please Check your email for new password</p>";
                     } else {
                        echo "<p style='color:red; margin-left:50px; font-size:17px;'>Email Not sent !!</p>";
                     }

                    } else {
                        echo "<p style='color:red; margin-left:50px; font-size:17px;'>Mail Not exist !!</p>";
                    }
                  } 
                }
            ?>
             <h2>Forget</h2>
            <form action="" method="post">
                <div class="input-box">
                    <input type="text" name="email" placeholder="Enter Valid email...">
                    <label>Email</label>
                </div>

                <div class="forgot-pass">
                    <a href="login.php">Login</a>
                </div>
                <button type="submit" class="btn">Sent Mail</button>
            </form>
        </div>
        <span style="--i:0;"></span>
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
        <span style="--i:4;"></span>
        <span style="--i:5;"></span>
        <span style="--i:6;"></span>
        <span style="--i:7;"></span>
        <span style="--i:8;"></span>
        <span style="--i:9;"></span>
        <span style="--i:10;"></span>
        <span style="--i:11;"></span>
        <span style="--i:12;"></span>
        <span style="--i:13;"></span>
        <span style="--i:14;"></span>
        <span style="--i:15;"></span>
        <span style="--i:16;"></span>
        <span style="--i:17;"></span>
        <span style="--i:18;"></span>
        <span style="--i:19;"></span>
        <span style="--i:20;"></span>
        <span style="--i:21;"></span>
        <span style="--i:22;"></span>
        <span style="--i:23;"></span>
        <span style="--i:24;"></span>
        <span style="--i:25;"></span>
        <span style="--i:26;"></span>
        <span style="--i:27;"></span>
        <span style="--i:28;"></span>
        <span style="--i:29;"></span>
        <span style="--i:30;"></span>
        <span style="--i:31;"></span>
        <span style="--i:32;"></span>
        <span style="--i:33;"></span>
        <span style="--i:34;"></span>
        <span style="--i:35;"></span>
        <span style="--i:36;"></span>
        <span style="--i:37;"></span>
        <span style="--i:38;"></span>
        <span style="--i:39;"></span>
        <span style="--i:40;"></span>
        <span style="--i:41;"></span>
        <span style="--i:42;"></span>
        <span style="--i:43;"></span>
        <span style="--i:44;"></span>
        <span style="--i:45;"></span>
        <span style="--i:46;"></span>
        <span style="--i:47;"></span>
        <span style="--i:48;"></span>
        <span style="--i:49;"></span>
    </div>
</body>
</html>