<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
if(!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script>window.location = 'catlist.php';</script>";
} else {
    $id = $_GET['catid'];
}
?>
    <div class="dashboard">
        <h1>Update Category</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $fm->validation($_POST['name']);

            $name = mysqli_real_escape_string($db->link, $name);
            if(empty($name)) {
                echo "<p style='color: red; font-size: 18px;'>Field must not be empty!.</p>";
            } else {
                $query = "UPDATE tbl_category
                          SET
                          NAME = '$name'
                          WHERE id = '$id'";

                $updated_row = $db->update($query);
                if ($updated_row) {
                    echo "<p style='color: green; font-size: 18px;'>Category Updated Successfully.</p>";
                } else {
                    echo "<p style='color: red; font-size: 18px;'>Category Not Updated !.</p>";
                }
            }
        } ?>
<?php 
    $query = "SELECT * FROM tbl_category WHERE id='$id' ORDER BY id DESC";
    $category = $db->select($query);
    while ($result = $category->fetch_assoc()) {
?>
    <div class="from">
        <form action="addcat.php" method="post">
            <table>					
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $result['name']?>" class="medium" />
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
            <?php } ?>
        </div>
    </div>
</div>
<div class="footersection">
    <h2>© Copyright <a href="https://www.facebook.com/profile.php?id=100091065334614">Shamim</a> All Rights Reserved.</h2>
</div>
</body>
</html>