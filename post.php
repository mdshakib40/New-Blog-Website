<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    if(!isset($_GET['id']) || $_GET['id'] == NULL) {
            header("Location: 404.php");
    } else {
            $id = $_GET['id'];
    }
?>
<?php 
    $query = "SELECT * FROM tbl_post WHERE id = $id"; 
    $post = $db->select($query);
    if($post) {
    while ($result = $post->fetch_assoc()) {      
?>
       <div class="Pages">
                <h3><?php echo $result['title'];?></h3>
                <h4 style="color: wheat;"><?php echo $fm->formatData( $result['date']);?></h4>
                <img src="admin/<?php echo $result['image'];?>" alt="">
                <?php echo $result['body'];?>
        </div> 
<?php } } else { header("Location:404.php");}?>       
</div> 
<?php include 'inc/footer.php';?>
</div>

</body>
</html>