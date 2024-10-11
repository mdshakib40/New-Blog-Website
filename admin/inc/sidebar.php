<div class="sidebar">
                <div class="dropdown">
                    <h1>Site Option</h1>
                    <div class="sidenav">
                        <button class="dropdown-btn">Title & Slogan
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                          <a href="titleslogan.php">Title & Slogan</a>
                          <a href="social.php">Social Media</a>
                          <a href="copyright.php">Copyright</a>
                        </div>

                        <button class="dropdown-btn">Update Pages
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                        <a href="addpage.php">Add Pages</a>
                        <?php 
                          $query = "SELECT * FROM tbl_page";
                          $page = $db->select($query);
                          if($page) {
                            while($result = $page->fetch_assoc()) {
                          ?>
                       <a href="page.php?pageid=<?php echo $result['id']?>"><?php echo $result['name']; ?></a>
                    <?php } } ?>
                        </div>

                        <button class="dropdown-btn">Category Option
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                          <a href="addcat.php">Add Category</a>
                          <a href="catlist.php">Category List</a>
                        </div>

                        <button class="dropdown-btn">Post Option
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                          <a href="post.php">Add Post</a>
                          <a href="postlist.php">Post List</a>
                        </div>
                      </div>     
                      
                      <script>
                      /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
                      var dropdown = document.getElementsByClassName("dropdown-btn");
                      var i;
                      
                      for (i = 0; i < dropdown.length; i++) {
                        dropdown[i].addEventListener("click", function() {
                          this.classList.toggle("active");
                          var dropdownContent = this.nextElementSibling;
                          if (dropdownContent.style.display === "block") {
                            dropdownContent.style.display = "none";
                          } else {
                            dropdownContent.style.display = "block";
                          }
                        });
                      }
                      </script>
                </div>
            </div>