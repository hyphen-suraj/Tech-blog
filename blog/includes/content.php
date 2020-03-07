
  <!-- Page Content -->
  <div class="container">
  
    <div class="row">

        <div class="col-md-8">
   

            <?php 
    
                $query= "SELECT * FROM post";
                 $posts_list=mysqli_query($connection,$query);
  
                 while($row = mysqli_fetch_assoc($posts_list)){

                    $post_title=$row['post_title'];
                    $post_id=$row['post_id'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_content=substr($row['post_content'],0,100);
                    $post_image=$row['post_image'];
                    $post_title=$row['post_title'];
                    $post_status=$row['post_status'];

                    if($post_status == 'published'){
                    
  
              ?>

       <!-- Blog Entries Column -->
      

        






        <!-- Blog Post -->
        <div class="card mb-4">
        <a href="prt_blog.php?blog_id=<?php echo $post_id;?>"><img class="card-img-top" src="./images/<?php echo $post_image?>"  alt="Card image cap"></a>
               <div class="card-body">
                  <h2 class="card-title"><a href="prt_blog.php?blog_id=<?php echo $post_id;?>"><?php echo $post_title?></a></h2>
                  <p class="card-text"><?php echo $post_content?> </p>
                  <a href="prt_blog.php?blog_id=<?php echo $post_id;?>" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  Posted on <?php echo "$post_date"?>  by
                  <a href="#"><?php echo "$post_author"?> </a>
                 


                  
                </div>
        
         </div>

         <br/>
          

         <?php }  
        } ?>
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

      
