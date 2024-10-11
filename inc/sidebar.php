<div style="padding: 10px;" class="sidebar">
            <h2 style="width:100%" class="w-[5%] mx-auto">Categories</h2>
<?php 
    $query = "SELECT * FROM tbl_category"; 
    $category = $db->select($query);
    if($category) {
    while ($result = $category->fetch_assoc()) {      
?>
        <ul>
            <li style="border-bottom: 1px dashed antiquewhite;
            color:white;
            margin-top:5px;"
            class="w-[90%] mx-auto"><a href="posts.php?category=<?php echo $result['id']; ?>"><?php echo $result['name']?></a></li>
            <?php }} else { ?>
            <li style="border-bottom: 1px dashed antiquewhite; color:white; margin-top:5px" class="w-[90%] mx-auto">No Category Create</li>
        </ul>
                <?php } ?>
        
            <h3 style="width:100%" class="w-[5%] mx-auto">Latest articles</h3>
<?php 
    $query = "SELECT * FROM tbl_post limit 5";
    $post = $db->select($query);
    if($post) {
    while ($result = $post->fetch_assoc()) {
?>
            <h5 style="text-align: center;" class="w-[90%] mx-auto"><?php echo $result['title'];?></h5>
            <img src="admin/<?php echo $result['image'];?>" alt="">
            <?php echo $fm->textShorten($result['body'], 120); ?>

<?php } } else { header("Location:404.php");}?> 
</div>