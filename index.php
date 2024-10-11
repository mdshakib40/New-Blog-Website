<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>
<?php include 'inc/sidebar.php';?>

<!-- pagination -->
<?php 
    $per_page = 3;
    if(isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_form = ($page-1) * $per_page; ?>
<!-- pagination -->

    <?php 
        $query = "SELECT * FROM tbl_post limit $start_form, $per_page";
        $post = $db->select($query);
        if($post) {
            while ($result = $post->fetch_assoc()) {
    ?>
            <div class="Pages">
                    <h3><?php echo $result['title'];?></h3>
                    <h4 style="color: wheat;"><?php echo $fm->formatData( $result['date']);?> By,
                    <a href=""><?php echo $result['author']?></a>
                    </h4>
                    <p></p>
                    <img src="admin/<?php echo $result['image'];?>" alt="">
                    <?php echo $fm->textShorten($result['body']);?>
                    <a class="btn" href="post.php?id=<?php echo $result['id']; ?>">Read more</a><br><br>
           
                </div>           
<?php } ?>
<?php } else { header("Location:404.php");}?>  
</div>  
<?php include 'inc/footer.php';?>

</body>
</html>