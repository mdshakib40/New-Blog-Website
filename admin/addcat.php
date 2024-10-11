<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
            <div class="dashboard">
                <h1>Add Category</h1>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $fm->validation($_POST['name']);

                    $name = mysqli_real_escape_string($db->link, $name);
                    if(empty($name)) {
                        echo "<p style='color: red; font-size: 18px;'>Field must not be empty!.</p>";
                    } else {
                        $query = "INSERT INTO tbl_category(name) VALUES('$name')";
                        $catinsert = $db->insert($query);
                        if ($catinsert) {
                            echo "<p style='color: green; font-size: 18px;'>Category Inserted Successfully.</p>";
                        } else {
                            echo "<p style='color: red; font-size: 18px;'>Category Not Inserted.</p>";
                        }
                    }
                } ?>

                <div class="from">
                    <form action="addcat.php" method="post">
                        <table>					
                            <tr>
                                <td>
                                  
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter category name " name="name" class="medium" />
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
                </div>
            </div>
            <div class="footersection">
                <h2>© Copyright <a href="https://www.facebook.com/profile.php?id=100091065334614">Shamim</a> All Rights Reserved.</h2>
            </div>
</body>
</html>