<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
            <div style="min-height: 0px;" class="dashboard">
                <h1>Category List</h1>
          <?php 
            if(isset($_GET['delcat'])) {
                $delid = $_GET['delcat'];
                $delquery = "DELETE FROM tbl_category WHERE id='$delid'";
                $deldata = $db->delete($delquery);
                if ($deldata) {
                    echo "<p style='color: green; font-size: 18px;'>Category Deleted Successfully.</p>";
                } else {
                    echo "<p style='color: red; font-size: 18px;'>Category Not Deleted.</p>";
                }
            }
          ?>      
                <div class="search-bar">
                    Search :    
                    <input type="text" placeholder="Search....">
                </div>
                <div class="length">
                    <label for="">
                        Show
                        <select class="outline-none" name="" id="">
                            <option selected="10" value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                        </select>
                        entries
                    </label>
                </div>
                <div class="bloc">
                    <table>
                        <thead class="thead">
                            <tr>
                                <th>Serial No.</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="height: 90px;">
                            <?php 
                                $query = "SELECT * FROM tbl_category ORDER BY id desc";
                                $category = $db->select($query);
                                if ($category) {
                                    $i=0;
                                    while ($result = $category->fetch_assoc()) {
                                        $i++
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['name'];?></td>
                                <td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a> ||
                                    <a onclick="return confirm('Are you shure to Dalete!')" href="?delcat=<?php echo $result['id'];?>">Delete</a>
                                </td>
                            </tr>
                    <?php } } ?>
                        </tbody>
                    </table>
                    <div class="info">Showing 1 to 8 of 8 entries</div>
                </div>
            </div>
            <div class="footersection">
            <div class="footersection">
                <h2>© Copyright <a href="https://www.facebook.com/profile.php?id=100091065334614">Shamim</a> All Rights Reserved.</h2>
            </div>
</body>
</html>