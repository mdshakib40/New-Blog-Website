<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
        header("Location: 404.php");
    } else {
        $id = $_GET['pageid'];
    }
?>

                  <?php 
                    $pagequery = "SELECT * FROM tbl_page WHERE id ='$id'";
                    $pagedetails = $db->select($pagequery);
                    if($pagedetails) {
                    while($result = $pagedetails->fetch_assoc()) {
                  ?>
            <div class="Pages">
                    <h3><?php echo $result['name'];?></h3>
                    <?php echo $result['body']; ?>
                </div> 
         <?php } } else { header("Location:404.php");}?>  
    </div> 


     <!-- footersection -->
     <?php include 'inc/footer.php';?>
        <!-- footersection -->
</div>

</body>
</html>