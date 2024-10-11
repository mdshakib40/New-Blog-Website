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
                <h1>Update Copyright Text</h1>
                <div class="from">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $note = $fm->validation($_POST['note']);
                        $note = mysqli_real_escape_string($db->link, $note);
                        if($note == "") {
                            echo "<span style='color: red; font-size: 18px; font-weight: 600;'>Field Must Not Be Empty !!.</span>";
                        } else {
                            $query = "UPDATE tbl_footer
                            SET 
                            note = '$note'
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
                    <form action="copyright.php" method="post">
                    <?php 
                        $query = "SELECT * FROM tbl_footer WHERE id='1'";
                        $copyright = $db->select($query);
                        if($copyright) {
                            while($result = $copyright->fetch_assoc()) {
                    ?>
                        <table>					
                            <tr>
                                <td></td>
                                <td>
                                    <input type="text" value="<?php echo $result['note']; ?>" name="note" class="medium" />
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