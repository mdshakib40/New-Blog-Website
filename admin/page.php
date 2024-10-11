<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<?php 
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
        echo "<script>window.location = 'index.php';</script>";
    } else {
        $id = $_GET['pageid'];
    }
?>

<style>
.error {
    color: red;
    font-size: 17px;
}
.success {
    color: green;
    font-size: 17px;
}
.actiondel {
    margin-left: 10px;
}
.actiondel a {
    padding: 9px 16px;
    border: 1px solid gray;
    background: #f2efef;
    font-size: 16px;
    text-decoration: none;
    border-radius: 3px;
    color: black;
}
.actiondel a:hover {
    background: #c6c3c3;
   color: white;
}
</style>
            <div class="dashboard">
                <h1>Page</h1>            
                <div class="from">
                <?php 
                    $pagequery = "SELECT * FROM tbl_page WHERE id ='$id'";
                    $pagedetails = $db->select($pagequery);
                    if($pagedetails) {
                    while($result = $pagedetails->fetch_assoc()) {
                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name  = mysqli_real_escape_string($db->link, $_POST['name']);
                        $body   = mysqli_real_escape_string($db->link, $_POST['body']);


                        if ($name == "" || $body == "" ) {
                            echo "<span style='color: red; font-size: 18px; font-weight: 600;'>Field Must Not Be Empty !!.</span>";
                        } else {
                            $query = "UPDATE tbl_page
                            SET
                            name = '$name',
                            body = '$body'
                            WHERE id = '$id'";
  
                           $updated_row = $db->update($query);
                            if ($updated_row) {
                                echo "<span class='success'>Page Updated Successfully !!.</span>";
                            } else {
                                echo "<span class='error'>Page Not Updated !!.</span>";
                            }
                        }
                    }
                ?> 
                        <table>					
                            <tr>
                                <td>
                                    <label style="padding: 40px;">Name</label>
                                </td>
                                <td>
                                    <input style="margin-left: 1px;" type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                              <td>
                                  <label style="padding: 40px;">Content</label><br>
                              </td>
                              <td>
                                  <textarea  name="body" class="tinymce ml-15 mt-5">
                                  <?php echo $result['body'];?>
                                    </textarea>
                              </td>
                          </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
                                    <span class="actiondel"><a onclick="return confirm('Are you shure to dalete the page !')" href="deletepage.php?delpage=<?php echo $result['id']; ?>">Delete</a></span>
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
