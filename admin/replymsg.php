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
</style>

<?php 
if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
    echo "<script>window.location = 'inbox.php';</script>";
} else {
    $id = $_GET['msgid'];
}
?>
            <div class="dashboard">
                <h1>View Massege</h1>            
                <div class="from">
                    <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $to = mysqli_real_escape_string($db->link, $toEmail);
                        $from = mysqli_real_escape_string($db->link, $fromEmail);
                        $subject = mysqli_real_escape_string($db->link, $subject);
                        $massege = mysqli_real_escape_string($db->link, $massage);

                        $sendmail = mail($to, $subject, $from, $massage) ;
                            if($sendmail) {
                                echo "<span class='success'>Massege Sent Successfully !!.</span>";
                            } else {
                                echo "<span class='error'>Something went Wrong!!.</span>";
                            }
                        }
                ?> 
                   <?php 
                        $query = "SELECT * FROM tbl_contact WHERE id= '$id'";
                        $msg = $db->select($query);
                        if ($msg) {
                        while ($result = $msg->fetch_assoc()) {
                    ?>
                        <table>					
                            <tr>
                                <td>
                                <label style="padding: 40px;">TO</label>
                                </td>
                                <td>
                                    <input readonly name="toEmail" style="margin-left: 1px;" type="text" value="<?php echo $result['email'];?>" placeholder="Enter Post Title..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label style="padding: 40px;">From</label>
                                </td>
                                <td>
                                    <input name="fromEmail" style="margin-left: 1px;" type="text"  placeholder="Enter your email address..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label style="padding: 40px;">Subject</label>
                                </td>
                                <td>
                                    <input name="subject" style="margin-left: 1px;" placeholder="Enter your sunject..." type="text" class="medium" />
                                </td>
                            </tr>
                            <tr>
                              <td>
                                  <label style="padding: 40px;">Massege</label>
                              </td>
                              <td>
                                  <textarea name="massage" class="tinymce ml-15 mt-5">
                                      
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
                          <?php } } ?>
                        </form>
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
