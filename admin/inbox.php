<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 

    <div style="min-height: 0px;" class="dashboard">
                <h1>Inbox</h1>
                <?php 
                    if (isset($_GET['seenid'])) {
                        $seenid = $_GET['seenid'];
                        $query = "UPDATE tbl_contact
                          SET
                          status = '1'
                          WHERE id = '$seenid'";

                $updated_row = $db->update($query);
                if ($updated_row) {
                    echo "<p style='color: green; font-size: 18px;'>Massege Sent in the seen box.</p>";
                } else {
                    echo "<p style='color: red; font-size: 18px;'>Something is Wrong !.</p>";
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
                    <table style="min-width: 186%;">
                        <thead style="font-size: 20px; height: 30px;">
                            <tr>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="height: 0px;">
                             <?php 
                                $query = "SELECT * FROM tbl_contact WHERE status= '0' ORDER BY id desc";
                                $msg = $db->select($query);
                                if ($msg) {
                                    $i=0;
                                    while ($result = $msg->fetch_assoc()) {
                                        $i++
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
                                <td><?php echo $result['email']?></td>
                                <td><?php echo $fm->textShorten($result['body'], 20)?></td>
                                <td><?php echo $fm->formatData($result['date'])?></td>
                                <td>
                                    <a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || 
                                    <a href="replymsg.php?msgid=<?php echo $result['id'];?>">Reply</a> ||
                                    <a onclick="return confirm('Are you shure to Remove the Msg!!')" href="?seenid=<?php echo $result['id']?>">Seen</a> 
                            </td>
                            </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                    <div class="info">Showing 1 to 8 of 8 entries</div>
                </div>
            </div>

            <div style="min-height: 0px; margin-top: 8%" class="dashboard">
                <h1>Inbox</h1>
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
                <table style="min-width: 189%; margin-bottom:15px;">
                        <thead style="font-size: 20px; height: 30px;">
                            <tr>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php 
                            if(isset($_GET['delid'])) {
                                $delid = $_GET['delid'];
                                $delquery = "DELETE FROM tbl_contact WHERE id='$delid'";
                                $deldata = $db->delete($delquery);
                                if ($deldata) {
                                    echo "<p style='color: green; font-size: 18px;'>Massege Deleted Successfully.</p>";
                                } else {
                                    echo "<p style='color: red; font-size: 18px;'>Massege Not Deleted.</p>";
                                }
                            }
                        ?>  
                        <tbody style="height: 0px;">
                             <?php 
                                $query = "SELECT * FROM tbl_contact WHERE status= '1' ORDER BY id desc";
                                $msg = $db->select($query);
                                if ($msg) {
                                    $i=0;
                                    while ($result = $msg->fetch_assoc()) {
                                        $i++
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
                                <td><?php echo $result['email']?></td>
                                <td><?php echo $fm->textShorten($result['body'], 20)?></td>
                                <td><?php echo $fm->formatData($result['date'])?></td>
                                <td>
                                    <a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || 
                                    <a onclick="return confirm('Are you shure to Delete!!')" href="?delid=<?php echo $result['id']?>">Delete</a> 
                            </td>
                            </tr>
                            <?php } }?>
                        </tbody>
                   </div>   
             </div>     
</body>
</html>