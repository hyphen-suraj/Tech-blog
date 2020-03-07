<?php include "includes/header.php" ;

     

    //navigation bar
     include "includes/navigation_bar.php" ;
    //END HERE
     ?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>




        <?php 
        if(isset($_POST['submit'])){
  
            $search=$_POST['search'];
            $query="SELECT * FROM post WHERE post_tags LIKE '%$search%' ";
            $search_post=mysqli_query($connection,$query);
            if(! $search_post){
                die("QUERY FAILED". mysqli_error($connection));
            }

            if(mysqli_num_rows($search_post)==0){
              echo "NO result found";
            
            }
            
            
            
            
       else{
        
        while($row = mysqli_fetch_assoc($search_post)){

          $post_title=$row['post_title'];
          $post_author=$row['post_author'];
          $post_date=$row['post_date'];
          $post_content=$row['post_content'];
          $post_image=$row['post_image'];
          $post_title=$row['post_title'];
        
        ?>


        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="./images/<?php echo $post_image?>"  alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?php echo $post_title?> </h2>
            <p class="card-text"><?php echo $post_content?> </p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo "$post_date"?>  by
            <a href="#"><?php echo "$post_author"?> </a>
            </div>
        </div>

        <?php
         }
        }
        }       
         ?>
         




        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>
      <?php
      //sidebar
    include "includes/sidebar_search.php" ;
    include "includes/sidebar_category.php" ;
     include "includes/sidebar_widget.php" ;
    //sidebar END HERE


 include "includes/footer.php" ;

?>