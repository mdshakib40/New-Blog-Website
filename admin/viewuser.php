<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<style>
.error {
    color: red;
    font-size: 17px;
}
.success {
    color: green;
    font-size: 17px;
}
 .img {
    margin-left: 18px;
    width: 100px;
    height: 60px;
}
</style>
<?php 
    if(!isset($_GET['userid']) || $_GET['userid'] == NULL) {
        echo "<script>window.location = 'userlist.php';</script>";
    } else {
        $id = $_GET['userid'];
    }
?>
            <div class="dashboard">
            <h1>View User</h1> 
            <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        echo "<script>window.location = 'userlist.php';</script>";
                    }                             
                ?> 
 


                <?php 
                  $query = "SELECT * FROM tbl_user WHERE id = '$id'";
                  $getuser = $db->select($query);
                  if ($getuser) {

                  while($result = $getuser->fetch_assoc()) {
                ?>          
                <div class="from">
                    <form action="" method="post">
                        <table>					
                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input readonly type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>UserName</label>
                                </td>
                                <td>
                                    <input readonly type="text" name="username" value="<?php echo $result['username']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email</label>
                                </td>
                                <td>
                                    <input readonly type="text" name="email" value="<?php echo $result['email']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                              <td>
                                  <label>Details</label>
                              </td>
                              <td>
                                  <textarea name="details" class="tinymce ml-15 mt-5">
                                       <?php echo $result['details']; ?>
                                    </textarea>
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
                        <?php } } ?>
                    </div>
                    
                </div>
            </div>
            <div class="footersection">
                <h2>© Copyright <a href="https://www.facebook.com/profile.php?id=100091065334614">Shamim</a> All Rights Reserved.</h2>
            </div>

           <script src="js/tiny-mce//jquery.tinymce.js" type="text/javascript"></script>
           <script type="text/javascript">
            $(document).ready(function () {
                setupTinyMCE();
                $('input[type="checkbox"]').fancybutton();
                $('input[type="radio"]').fancybutton();
            }) ;
           </script> 
</body>
</html>
