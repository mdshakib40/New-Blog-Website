<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
                   if (!Session::get('userRole') == '0') {
                    echo "<script>window.location = 'index.php';</script>";
                   }
                    ?>
            <div class="dashboard">
                <h1>Add New User</h1>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username    = $fm->validation($_POST['username']);
                    $password    = $fm->validation(md5($_POST['password']));
                    $email        = $fm->validation($_POST['email']);
                    $role        = $fm->validation($_POST['role']);

                    $username    = mysqli_real_escape_string($db->link, $username);
                    $password    = mysqli_real_escape_string($db->link, $password);
                    $email        = mysqli_real_escape_string($db->link, $email);
                    $role        = mysqli_real_escape_string($db->link, $role);
                    if(empty($username) || empty($password) || empty($role) || empty($email )) {
                        echo "<p style='color: red; font-size: 18px;'>Field must not be empty!.</p>";
                    } else {
                    $mailquery = "SELECT * FROM tbl_user WHERE email = '$email' limit 1";
                    $mailchek = $db->select($mailquery);
                    if($mailchek !=false) {
                        echo "<p style='color:red; margin-left:50px; font-size:17px;'>Email all ready Exist!!</p>";
                    }
                    
                    
                    
                    else {
                        $query = "INSERT INTO tbl_user(username, password, role ) VALUES('$username', '$password', '$role')";
                        $catinsert = $db->insert($query);
                        if ($catinsert) {
                            echo "<p style='color: green; font-size: 18px;'>User Created Successfully.</p>";
                        } else {
                            echo "<p style='color: red; font-size: 18px;'>User Not Created.</p>";
                        }
                    }
                  }
                } 
                ?>

                <div class="from">
                    <form action="" method="post">
                    <table>					
                            <tr>
                                <td>
                                <label style="padding: 40px;">UserName</label>
                                </td>
                                <td>
                                    <input  name="username" style="margin-left: 1px;" type="text" placeholder="Enter username..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label style="padding: 40px;">Password</label>
                                </td>
                                <td>
                                    <input name="password" style="margin-left: 1px;" type="text"  placeholder="Please enter password..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label style="padding: 40px;">Email</label>
                                </td>
                                <td>
                                    <input name="email" style="margin-left: 1px;" type="text"  placeholder="Enter your email address..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label style="padding: 40px;">Role</label>
                                </td>
                                <td>
                                    <select name="role" id="select">
                                        <option value="0">Admin</option>
                                        <option value="1">Author</option>
                                        <option value="2">Editor</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="OK" />
                                </td>
                            </tr>
                          </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footersection">
                <h2>© Copyright <a href="https://www.facebook.com/profile.php?id=100091065334614">Shamim</a> All Rights Reserved.</h2>
            </div>
</body>
</html>