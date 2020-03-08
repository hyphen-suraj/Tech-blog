  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="./index.php">BLOG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">


        <?php
        if(!isset($_SESSION['role'])){
        
        if(isset($_GET['blog_id'])){
          
            $id=$_GET['blog_id'];
echo "<li class='nav-item active'><a href='admin/posts.php?source=edit_post&p_id={$id}' class='nav-link'>Edit Post</a></li>";
          

        }
      }
      
        ?>




<li class='nav-item active'><a href="admin" class='nav-link'>Admin</a></li>
<li class='nav-item active'><a href="registration.php" class='nav-link'>Register</a></li>
        <?php 
        $query= "SELECT * FROM categories";
        $cat_list=mysqli_query($connection,$query);
        
        while($row=mysqli_fetch_assoc($cat_list)){
          $cat_title=$row['cat_title'];
          $cat_id=$row['cat_id'];
          echo "<li class='nav-item active'>
          <a class='nav-link' href='cat_blog.php?cat_id={$cat_id}'>{$cat_title}</a>
        </li>";
        }

        
        ?>
        <!--
          <li class="nav-item active">

            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
      -->
        </ul>
      </div>
    </div>
  </nav>