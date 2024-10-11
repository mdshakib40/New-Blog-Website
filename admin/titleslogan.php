<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<style>
.rightside {
    float: left;
    width: 20%;
    color: wheat;
    float: right;
    margin-top: -15%;
}
.rightside img {
    height: 130px;
    width: 135px;
}
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
              $query = "SELECT * FROM title_slogan WHERE id='1'";
              $blog_title = $db->select($query);
              if($blog_title) {
                while($result = $blog_title->fetch_assoc()) {
            ?>
        <div class="dashboard">
            <h1>Update Site Title and Description</h1>
            <div class="from">
            <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $title = $fm->validation($_POST['title']);
                        $slogan = $fm->validation($_POST['slogan']);


                        $title     = mysqli_real_escape_string($db->link, $_POST['title']);
                        $slogan    = mysqli_real_escape_string($db->link, $_POST['slogan']);

                        $permited  = array( 'png');
                        $file_name = $_FILES['logo']['name'];
                        $file_size = $_FILES['logo']['size'];
                        $file_temp = $_FILES['logo']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $same_image = 'logo'.'.'.$file_ext;
                        $uploaded_image = "upload/".$same_image;

                        if ($title == "" || $slogan == "") {
                            echo "<span style='color: red; font-size: 18px; font-weight: 600;'>Field Must Not Be Empty !!.</span>";
                        } else {
                        if(!empty($file_name)) {
                            if ($file_size >1048567) {
                                echo "<span class='error'>Image Size should be less then 1MB! </span>";
                            } elseif (in_array($file_ext, $permited) === false) {
                                echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                            } else {
                           
                            $query = "INSERT INTO title_slogan(title, slogan, logo) VALUES('$title', '$slogan', '$uploaded_image')";
                            

                            move_uploaded_file($file_temp, $uploaded_image);    
                            $query = "UPDATE title_slogan 
                            SET 
                            title   = '$title',
                            slogan = '$slogan',
                            logo = '$uploaded_image'
                            WHERE id = '1'";
                            $updated_rows = $db->update($query);
                                if ($updated_rows) {
                                    echo "<span class='success'>Data Inserted Successfully !!.</span>";
                                } else {
                                    echo "<span class='error'>Data Not Inserted !!.</span>";
                                }
                            }
                     } else {
                        $query = "UPDATE title_slogan 
                        SET 
                        title   = '$title',
                        slogan = '$slogan'
                        WHERE id = '1'";
                        $updated_rows = $db->update($query);
                            if ($updated_rows) {
                                echo "<span class='success'>Data Inserted Successfully !!.</span>";
                            } else {
                                echo "<span class='error'>Data Not Inserted !!.</span>";
                            }
                        }                              
                      }
                    }
                ?> 
                <form action="" method="post" enctype="multipart/form-data">
                    <table>					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
                            <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Update logo</label>
                            </td>
                            <td>
                                <input class="label" name="logo" type="file" />
                            </td>
                        </tr>
                            <tr>
                            <td>

                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                        </table>
                    </form>
                </div>
               
                <div class="rightside">
                    <img src="<?php echo $result['logo'];?>" alt="">
                </div>
            </div>
        </div>
    <?php } } ?>
        <div class="footersection">
            <h2>© Copyright <a href="https://www.facebook.com/profile.php?id=100091065334614">Shamim</a> All Rights Reserved.</h2>
        </div>
</body>
</html>
