<div class="footersection">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <?php 
                        $query = "SELECT * FROM tbl_footer WHERE id='1'";
                        $copyright = $db->select($query);
                        if($copyright) {
                            while($result = $copyright->fetch_assoc()) {
                    ?>
            <h3>©<?php echo $result['note'];?> <?php echo date('Y')?></h3>
            <?php } } ?>
        </div>