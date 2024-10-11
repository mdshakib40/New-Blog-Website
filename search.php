<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
if(!isset($_GET['search']) || $_GET['search'] == NULL) {
        header("Location:404.php");
} else {
        $search  = $_GET['search'];
}
?>

<?php 
     $query =  "select * from tbl_post where title like '%$search%' or body like '%$search%'";
     $post = $db->select($query);
     if($post) {
         while ($result = $post->fetch_assoc()) {
?>

<div class="Pages">
        <h3><?php echo $result['title'];?></h3>
        <h4 style="color: wheat;"><?php echo $fm->formatData( $result['date']);?> By,
        <a href=""><?php echo $result['author']?></a>
        <img src="admin/<?php echo $result['image'];?>" alt="">
        <?php echo $fm->textShorten($result['body']);?>
        <a class="btn" href="post.php?id=<?php echo $result['id']; ?>">Read more</a><br><br>
           
<?php } } ?>
     
</div> 
</div>  
<?php include 'inc/footer.php';?>