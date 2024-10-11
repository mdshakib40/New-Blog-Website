<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<style>
.error {
    color: red;
    font-size: 17px;
}
.success {
    color: green;
}    
</style>
            <div class="dashboard">
                <h1>Update Social Media</h1>
                <div class="from">
                    <form action="social.php" method="post">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $fb = $fm->validation($_POST['fb']);
                        $tw = $fm->validation($_POST['tw']);
                        $gp = $fm->validation($_POST['gp']);
                        $ing = $fm->validation($_POST['ing']);

                        $fb     = mysqli_real_escape_string($db->link, $_POST['fb']);
                        $tw    = mysqli_real_escape_string($db->link, $_POST['tw']);
                        $gp    = mysqli_real_escape_string($db->link, $_POST['gp']);
                        $ing    = mysqli_real_escape_string($db->link, $_POST['ing']);
                        if ($fb == "" || $tw == "" || $gp == "" || $ing == "") {
                            echo "<span style='color: red; font-size: 18px; font-weight: 600;'>Field Must Not Be Empty !!.</span>";
                        } else {
                            $query = "UPDATE tbl_social
                            SET 
                            fb   = '$fb',
                            tw = '$tw',
                            gp = '$gp',
                            ing = '$ing'
                            WHERE id = '1'";
                            $updated_rows = $db->update($query);
                                if ($updated_rows) {
                                    echo "<span class='success'>Data Inserted Successfully !!.</span>";
                                } else {
                                    echo "<span class='error'>Data Not Inserted !!.</span>";
                                }
                        }
                    }
                ?> 
                    <?php 
                        $query = "SELECT * FROM tbl_social WHERE id='1'";
                        $social_media = $db->select($query);
                        if($social_media) {
                            while($result = $social_media->fetch_assoc()) {
                    ?>
                        <table>					
                            <tr>
                                <td>
                                    <label>Facebook</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result['fb']; ?>"  name="fb" class="medium" />
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <label>Twitter</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result['tw']; ?>" name="tw" class="medium" />
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <label>Google Plus</label>
                                </td>
                                <td>
                                    <input type="text"value="<?php echo $result['gp']; ?>" name="gp" class="medium" />
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <label>Instagram</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result['ing']; ?>" name="ing" class="medium" />
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
                          <?php } } ?>
                        </form>
                    </div>
                   
                </div>
            </div>
            <div class="footersection">
                <h2>© Copyright <a href="https://www.facebook.com/profile.php?id=100091065334614">Shamim</a> All Rights Reserved.</h2>
            </div>
</body>
</html>
