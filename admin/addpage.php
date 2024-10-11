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
            <div class="dashboard">
                <h1>Add New Page</h1>            
                <div class="from">
                    <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name  = mysqli_real_escape_string($db->link, $_POST['name']);
                        $body   = mysqli_real_escape_string($db->link, $_POST['body']);


                        if ($name == "" || $body == "" ) {
                            echo "<span style='color: red; font-size: 18px; font-weight: 600;'>Field Must Not Be Empty !!.</span>";
                        } else {
                           $query = "INSERT INTO tbl_page(name, body) VALUES('$name', '$body')";
                           $inserted_rows = $db->insert($query);
                            if ($inserted_rows) {
                                echo "<span class='success'>Page Created Successfully !!.</span>";
                            } else {
                                echo "<span class='error'>Page Not Created !!.</span>";
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
                                    <input style="margin-left: 1px;" type="text" name="name" placeholder="Enter Post Title..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                              <td>
                                  <label style="padding: 40px;">Content</label>
                              </td>
                              <td>
                                  <textarea name="body" class="tinymce ml-15 mt-5">

                                    </textarea>
                              </td>
                          </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
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
