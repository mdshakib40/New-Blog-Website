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
                <h1>Add New Post</h1>            
                <div class="from">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $cat    = mysqli_real_escape_string($db->link, $_POST['cat']);
                        $title  = mysqli_real_escape_string($db->link, $_POST['title']);
                        $body   = mysqli_real_escape_string($db->link, $_POST['body']);
                        $tags   = mysqli_real_escape_string($db->link, $_POST['tags']);
                        $author   = mysqli_real_escape_string($db->link, $_POST['author']);
                        $user   = mysqli_real_escape_string($db->link, $_POST['user']);

                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "upload/".$unique_image;

                        if ($cat == "" || $title == "" || $body == ""  || $tags == "" || $author == "" || $file_name == "") {
                            echo "<span style='color: red; font-size: 18px; font-weight: 600;'>Field Must Not Be Empty !!.</span>";
                        } elseif ($file_size >1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB! </span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                        } else {
                           move_uploaded_file($file_temp, $uploaded_image);
                           $query = "INSERT INTO tbl_post(cat, title, body, image, tags, author, user) VALUES('$cat', '$title', '$body', '$uploaded_image', '$tags', '$author', '$user')";
                           $inserted_rows = $db->insert($query);
                            if ($inserted_rows) {
                                echo "<span class='success'>Data Inserted Successfully !!.</span>";
                            } else {
                                echo "<span class='error'>Data Not Inserted !!.</span>";
                            }
                        }
                    }
                ?> 
                        <table>					
                            <tr>
                                <td>
                                    <label>Title</label>
                                </td>
                                <td>
                                    <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                                </td>
                            </tr>
                         
                            <tr>
                                <td>
                                    <label>Category</label>
                                </td>
                                <td>
                                    <select id="select" name="cat">
                                        <option value="">Select Category</option>
                                    <?php 
                                     $query = "SELECT * FROM tbl_category";
                                     $category = $db->select($query);
                                     if ($category) {
                                        while($result = $category->fetch_assoc()) {
                                    ?>    
                                        <option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                    <?php } } ?>    
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <input class="label" name="image" type="file" />
                                </td>
                            </tr>
                            <tr>
                              <td>
                                  <label>Content</label>
                              </td>
                              <td>
                                  <textarea name="body" class="tinymce ml-15 mt-5">

                                    </textarea>
                              </td>
                          </tr>
                          <tr>
                                <td>
                                    <label>Author</label>
                                </td>
                                <td>
                                <input type="text" name="author" value="<?php echo Session::get('username')?>" class="medium" />
                                <input type="hidden" name="user" value="<?php echo Session::get('userId')?>" class="medium" />
                                </td>
                            </tr>
                          <tr>
                                <td>
                                    <label>Tags</label>
                                </td>
                                <td>
                                   <input type="text" name="tags" placeholder="Enter tags..." class="medium" />
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
