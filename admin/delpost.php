<?php
  include '../lib/Session.php';
  Session::checkSession();
?>
<?php include '../lib/database.php';?>
<?php include '../helpers/format.php';?>
<?php include '../config/config.php';?>

<?php
    $db = new Database();
?>
<?php 
if(!isset($_GET['delid']) || $_GET['delid'] == NULL) {
    echo "<script>window.location = 'postlist.php';</script>";
} else {
    $postid = $_GET['delid'];

    $query = "SELECT * FROM tbl_post WHERE id = '$postid'";
    $getData = $db->select($query);
    if ($getData) {
        while ($delimg = $getData->fetch_assoc()) {
            $dellink = $delimg['image'];
            unlink($dellink);
        }
    }

    $delquery = "DELETE FROM tbl_post WHERE id = '$postid'";
    $delData = $db->delete($delquery);
    if($delData) {
        echo "<script>alert('Data Deleted successfully.');</script>";
        echo "<script>window.location='postlist.php';</script>";
    } else {
        echo "<script>alert('Data Not Deleted!!');</script>";
        echo "<script>window.location='postlist.php';</script>";
    }
}
?>