<?php
  include '../lib/Session.php';
  Session::checkSession();
?>
<?php include '../lib/database.php';?>
<?php include '../helpers/format.php';?>
<?php include '../config/config.php';?>

<?php
    $db = new Database();
    $fm = new Format();
?>
<?php 
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>
        <div class="branding">
            <div class="container float-left">
            <img style="width: 80px;  height: 60px;" src="../image/rainbow-logo-design-transparent-0.png"alt="">
                <div class="header float-left">
                    <h1>Blog Website</h1>
                    <p>Our Slogan</p>
                </div>

                <div class="logout float-left">
                    <img src="image/img-profile.jpg">
                    <?php 
                        if (isset($_GET['action']) && $_GET['action'] == "logout") {
                            Session:: destroy();
                        }
                    ?>
                  <div class="block">
                      <ul>
                          <li>Hello <?php echo Session::get('username')?> |</li>
                          <li><a href="?action=logout">Logout</a></li>
                      </ul>
                    </div>
                </div>
             </div>   

             <nav class="navbar">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="ic-dashboard"><a href="index.php">Dashboard</a></li>
                        <li class="ic-form-style"><a href="profile.php">User Profile</a></li>
                        <li class=""><a href="changepassword.php">Change Password</a></li>
                        <li class="ic-grid-tables"><a href="inbox.php">Inbox
                            <?php 
                               $query = "SELECT * FROM tbl_contact WHERE status= '0' ORDER BY id desc";
                               $msg = $db->select($query);
                               if($msg) {
                                $count = mysqli_num_rows($msg);
                                echo "(".$count.")";
                               } else {
                                echo "(0)";
                               }
                            ?>
                        </a></li>
                 <?php 
                   if (Session::get('userRole') == '0') { ?>
                        <li class="ic-charts"><a href="adduser.php">Add User</a></li>
                <?php   } ?>       
                        
                        <li class="ic-charts"><a href="userlist.php">User List</a></li>
                    </ul>
                </div>
            </nav>