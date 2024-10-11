<?php
  include '../lib/Session.php';
  Session::checkSession();
?>
<?php include '../lib/database.php';?>
<?php include '../config/config.php';?>

<?php
    $db = new Database();
?>
<?php 
if(!isset($_GET['delpage']) || $_GET['delpage'] == NULL) {
    echo "<script>window.location = 'index.php';</script>";
} else {
    $pageid = $_GET['delpage'];

    $delquery = "DELETE FROM tbl_page WHERE id = '$pageid'";
    $delData = $db->delete($delquery);
    if($delData) {
        echo "<script>alert('Data Deleted successfully.');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data Not Deleted!!');</script>";
        echo "<script>window.location='index.php';</script>";
    }
}
?>