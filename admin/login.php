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
                    $username = $fm->validation($_POST['username']);
                    $password = $fm->validation(md5($_POST['password']));

                    $username = mysqli_real_escape_string($db->link, $username);
                    $password = mysqli_real_escape_string($db->link, $password);

                    $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
                    $result = $db->select($query);

                    if ($result != false) {
                        // $value = mysqli_fetch_array($result);
                         $value = $result->fetch_assoc();

                            Session::set("login", true);
                            Session::set("username", $value['username']);
                            Session::set("userId", $value['id']);
                            Session::set("userRole", $value['role']);
                            header("Location: index.php");

                    } else {
                        echo "<p style='color:red; margin-left:50px; font-size:17px;'>Username & Password Not match!!</p>";
                    }
                }
            ?>
             <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-box">
                    <input type="text" name="username" placeholder="username">
                    <label>UserName</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="password">
                    <label>Password</label>
                </div>
                <div class="forgot-pass">
                    <a href="forget.php">Forgot your password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
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