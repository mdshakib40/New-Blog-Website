<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
            <div style="overflow: hidden; min-height:0px" class="dashboard">
                <h1>Post List</h1>
                <form action="" method="post">
                <div class="search-bar">    
                    <input style=" width: 230px; padding: 6px 10px; border-radius: 4px;" placeholder="Search..." type="text" name="search">
                    <input style="color: white; border: 1px solid; padding: 6px 14px; background: gray; border-radius: 4px;" type="submit" value="search" name="submit">
                </form>
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
                    <table class="postlist" style="min-width: 100%;">
                        <thead style="font-size: 19px;">
                            <tr>
                                <th width="5%">NO.</th>
                                <th width="15%">Post Title</th>
                                <th width="15%">Description</th>
                                <th width="10%">Category</th>
                                <th width="10%">Image</th>
                                <th width="10%">Tags</th>
                                <th width="10%">Date</th>
                                <th width="10%">Author</th>
                                <th width="15%">Action</th>
                            </tr>
                           
                        </thead>
                        <tbody style="font-size:16px; height: 48px;">
                        <?php 
                              $query  = "SELECT tbl_post. * , tbl_category.name FROM tbl_post INNER JOIN tbl_category
                              ON tbl_post.cat = tbl_category.id
                              ORDER By tbl_post.title DESC ";
                              $post = $db->select($query);
                              if ($post) {
                                $i=0;
                                while ($result = $post->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['title'];?></td>
                                <td><?php echo $fm->textShorten($result['body'], 50);?></td>
                                <td><?php echo $result['name'];?></td>
                                <td><img style="height: 40px; width:60px;" src="<?php echo $result['image'];?>" alt=""></td>
                                <td><?php echo $result['tags'];?></td>
                                <td><?php echo $fm->formatData( $result['date']);?></td>
                                <td><?php echo $result['author'];?></td>
                                <td>
                                <a style="text-decoration: none;" href="viewpost.php?viewpostid=<?php echo $result['id'];?>">View</a>
                                <?php
                                   if(Session::get('userId') == $result['user'] || Session::get('userRole') == '0') {?>   
                                ||  <a style="text-decoration: none;" href="editpost.php?editid=<?php echo $result['id'];?>">Edit</a> ||
                                
                                 <a style="text-decoration: none;" onclick="return confirm('Are you shure to Dalete!')" href="delpost.php?delid=<?php echo $result['id'];?>">Delete</a>
                                 <?php } ?>
                                 <td>                            
                             </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                    <div class="info">Showing 1 to 8 of 8 entries</div>
                </div>
            </div>
            <div class="footersection">
                <h2>© Copyright <a href="https://www.facebook.com/profile.php?id=100091065334614">Shamim</a> All Rights Reserved.</h2>
            </div>
</body>
</html>