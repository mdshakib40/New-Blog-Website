<?php include 'lib/database.php';?>
<?php include 'helpers/format.php';?>
<?php include 'config/config.php';?>

<?php
    $db = new Database();
    $fm = new Format();
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
      if(isset($_GET['pageid'])) {
        $pagetitleid = $_GET['pageid'];
        $query = "SELECT * FROM tbl_page WHERE id = '$pagetitleid'";
        $page = $db->select($query);
        if($page) {
          while($result = $page->fetch_assoc()) { ?>
            <title><?php echo $result['name'] ?> - <?php echo TITLE ?></title>
        <?php  } } } elseif(isset($_GET['id'])) {

        $postid = $_GET['id'];
        $query = "SELECT * FROM tbl_post WHERE id = '$postid'";
        $post = $db->select($query);
        if($post) {
          while($result = $post->fetch_assoc()) { ?>
            <title><?php echo $result['title']; ?> - <?php echo TITLE ?></title>
        <?php  } } }else { ?>
            
            <title><?php echo $fm->title(); ?>-<?php echo TITLE ?></title>
     <?php }; ?> 
    
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>

<div style="width: 55%; margin: 0 auto" class="bg">
            <?php 
              $query = "SELECT * FROM title_slogan WHERE id='1'";
              $blog_title = $db->select($query);
              if($blog_title) {
                while($result = $blog_title->fetch_assoc()) {
            ?>
        <div class="logo">
            <img style="width: 120px;  height: 90px; margin-top: 17px; " src="admin/<?php echo $result['logo']; ?>"alt="">
        </div>
              <h1><?php echo $result['title']; ?></h1>
              <?php } } ?>
            <div class="icon">
            <?php 
                $query = "SELECT * FROM tbl_social WHERE id='1'";
                $social_media = $db->select($query);
                if($social_media) {
                    while($result = $social_media->fetch_assoc()) {
            ?>
                <a href="<?php echo $result['fb']; ?>"><i style="margin-left: 10px;" class="mx-2 text-blue-600 bg-white rounded-full fa-brands fa-facebook"></i></a>
                <a href="<?php echo $result['tw']; ?>"><i style="margin-left: 10px;" class="mx-2 text-blue-700 fa-brands fa-twitter"></i></a>
                <a href="<?php echo $result['gp']; ?>"><i style="margin-left: 10px;" class="mx-2 text-red-600 fa-brands fa-google"></i></a>
                <a href="<?php echo $result['ing']; ?>"><i style="margin-left: 10px;" class="mx-2 text-yellow-600 fa-brands fa-square-instagram"></i></a>
                <?php } } ?>
            </div>
            <form action="search.php" method="POST">
                <div class="search-bar">    
                    <input style="padding: 3px 10px; border-radius: 4px;" placeholder="Search..." type="text" name="search">
                    <input style="color: white; border: 1px solid; padding: 2px 10px; background: gray; border-radius: 4px;" type="submit" value="Search" name="submit">
                </div>
            </form>
            <?php 
              $query = "SELECT * FROM title_slogan WHERE id='1'";
              $blog_title = $db->select($query);
              if($blog_title) {
                while($result = $blog_title->fetch_assoc()) {
            ?>
         <h6><?php echo $result['slogan']; ?></h6>
         <?php } } ?>
    <div class="main-contant">
                <nav class="navbar">
                    <div class="container">
                        <?php 
                         $path = $_SERVER['SCRIPT_FILENAME'];
                         $currentpage = basename($path, '.php')
                        ?>
                        <ul class="navbar-nav">
                            <li><a 
                            <?php if($currentpage == 'index') {echo "id='active'";}?>
                            href="index.php">Home</a></li>
                            <li>
                            <?php 
                                $query = "SELECT * FROM tbl_page";
                                $page = $db->select($query);
                                if($page) {
                                    while($result = $page->fetch_assoc()) {
                                ?>
                              <a 
                              <?php 
                              if(isset($_GET['pageid']) && $_GET['pageid'] == $result['id']) {
                                echo "id='active'";
                              }
                            ?> href="page.php?pageid=<?php echo $result['id']?>"><?php echo $result['name']; ?></a>
                              <?php } } ?>
                            </li>
                            <li><a <?php if($currentpage == 'contact') {echo "id='active'";}?> href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </nav>
<style>
    #active {
        color: black;
        background: white;
    }
</style>