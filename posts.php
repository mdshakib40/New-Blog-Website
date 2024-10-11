<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    if(!isset($_GET['category']) || $_GET['category'] == NULL) {
            header("Location: 404.php");
    } else {
            $id = $_GET['category'];
    }
?>

<?php 
     $query = "SELECT * FROM tbl_post WHERE cat= $id";
     $post = $db->select($query);
     if($post) {
           while ($result = $post->fetch_assoc()) {
?>

<div class="Pages">
        <h3><?php echo $result['title'];?></h3>
        <h4 style="color: wheat;"><?php echo $fm->formatData( $result['date']);?></h4>
        <img src="admin/<?php echo $result['image'];?>" alt="">
        <?php echo $fm->textShorten($result['body']);?>
        <a class="btn" href="post.php?id=<?php echo $result['id']; ?>">Read more</a><br><br>
           
<?php } } else { header("Location:404.php");}?>        
</div> 
</div>  
<?php include 'inc/footer.php';?>