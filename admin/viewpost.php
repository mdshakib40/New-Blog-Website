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
if(!isset($_GET['viewpostid']) || $_GET['viewpostid'] == NULL) {
    echo "<script>window.location = 'postlist.php';</script>";
} else {
    $postid = $_GET['viewpostid'];
}
?>
            <div class="dashboard">
            <h1>Update Post</h1> 
            <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        echo "<script>window.location = 'postlist.php';</script>";
                    }
                ?> 
 
                <div class="from">
                <?php 
                  $query = "SELECT * FROM tbl_post WHERE id = '$postid' ORDER BY id DESC";
                  $getpost = $db->select($query);
                  while($postedit = $getpost->fetch_assoc()) {
                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table>					
                            <tr>
                                <td>
                                    <label>Title</label>
                                </td>
                                <td>
                                    <input readonly type="text" name="title" value="<?php echo $postedit['title']; ?>" class="medium" />
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
                                        <option
                                        <?php 
                                          if($postedit['cat'] == $result['id']) { ?>
                                                selected="selected";
                                       <?php  } ?> value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                    <?php } } ?>    
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img class="img" src="<?php echo $postedit['image'];?>" height="50px" width="70px" alt=""><br>
                                    <input class="label" name="image" type="file" />
                                </td>
                            </tr>
                            <tr>
                              <td>
                                  <label>Content</label>
                              </td>
                              <td>
                                  <textarea name="body" class="tinymce ml-15 mt-5">
                                  <?php echo $postedit['body']; ?>
                                    </textarea>
                              </td>
                          </tr>
                          <tr>
                                <td>
                                    <label>Tags</label>
                                </td>
                                <td>
                                    <input readonly type="text" name="tags" value="<?php echo $postedit['tags']; ?>" class="medium" />
                                </td>
                            </tr>
                          <tr>
                                <td>
                                    <label>Author</label>
                                </td>
                                <td>
                                    <input readonly type="text" name="author" value="<?php echo $postedit['author']; ?>" class="medium" />
                                    <input type="hidden" name="user" value="<?php echo Session::get('userId')?>" class="medium" />
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
                        <?php } ?>
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
