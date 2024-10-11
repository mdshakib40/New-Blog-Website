<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
            <div style="min-height: 0px;" class="dashboard">
                <h1>User List</h1>
          <?php 
            if(isset($_GET['deluser'])) {
                $deluser = $_GET['deluser'];
                $delquery = "DELETE FROM tbl_user WHERE id='$deluser'";
                $deldata = $db->delete($delquery);
                if ($deldata) {
                    echo "<p style='color: green; font-size: 18px;'>User Deleted Successfully.</p>";
                } else {
                    echo "<p style='color: red; font-size: 18px;'>User Not Deleted.</p>";
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
                    <table style="min-width: 228%;">
                        <thead class="thead">
                            <tr>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Details</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="height: 40px; font-size:16px">
                            <?php 
                                $query = "SELECT * FROM tbl_user ORDER BY id desc";
                                $alluser = $db->select($query);
                                if ($alluser) {
                                    $i=0;
                                    while ($result = $alluser->fetch_assoc()) {
                                        $i++
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['name'];?></td>
                                <td><?php echo $result['username'];?></td>
                                <td><?php echo $result['email'];?></td>
                                <td><?php echo $fm->textShorten($result['details'], 30);?></td>
                                <td>
                                    <?php 
                                       if ($result['role'] == '0') {
                                        echo "Admin";
                                       } elseif($result['role'] == '1') {
                                        echo "author"; 
                                       } elseif($result['role'] == '2') {
                                        echo "Editor";
                                       } 
                                    
                                    ?>
                                </td>
                                <td><a href="viewuser.php?userid=<?php echo $result['id'];?>">View</a>
                                <?php 
                   if (Session::get('userRole') == '0') { ?>
                                   ||  <a onclick="return confirm('Are you shure to Dalete!')" href="?deluser=<?php echo $result['id'];?>">Delete</a>
                                    <?php } ?>
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