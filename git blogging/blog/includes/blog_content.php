
  <!-- Page Content -->
  <div class="container">
  
    <div class="row">

        <div class="col-md-8">
   

            <?php 

            if(isset($_GET['blog_id'])){

                $p_id = $_GET['blog_id'];
    
            $query= "SELECT * FROM post WHERE post_id = {$p_id} ";
                 $posts_list=mysqli_query($connection,$query);
  
                 while($row = mysqli_fetch_assoc($posts_list)){

                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_content=$row['post_content'];
                    $post_image=$row['post_image'];
                    $post_title=$row['post_title'];
                    $post_comment_count=$row['post_comment_count'];
                    


                 }
  
              ?>

       <!-- Blog Entries Column -->
      

        






        <!-- Blog Post -->
        <div class="card mb-4">
               <img class="card-img-top" src="./images/<?php echo $post_image?>"  alt="Card image cap">
               <div class="card-body">
                  <h2 class="card-title"><?php echo $post_title?> </h2>
                  <p class="card-text"><?php echo $post_content?> </p>
                  
                </div>
                <div class="card-footer text-muted">
                  Posted on <?php echo "$post_date"?>  by
                  <a href="#"><?php echo "$post_author"?> </a>
                  
                  


                  
                </div>
        
         </div>
         <?php } ?>
         <br/>

        <!-- Pagination -->
              <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                 </li>
                  <li class="page-item disabled">
                      <a class="page-link" href="#">Newer &rarr;</a>
                  </li>
                </ul>

      <!-- Comments Form -->
<?php

if(isset($_POST["submit"])){

  $comm_author=$_POST["author"];
  $comm_email=$_POST["email"];
  $comm_content=$_POST["comment"];
  
  
  
  
  
  $query="INSERT INTO comment(comm_author,comm_content,comm_date,comm_status,comm_post_id,comm_email) ";
  $query .="VALUES('{$comm_author}','{$comm_content}',now(),'draft','{$p_id}','{$comm_email}') ";
  
  $add_comment=mysqli_query($connection,$query);
  
  if(!$add_comment){
      die('QUERY FAILED'.mysqli_error($connection));
    }
  
  }
  
    $query="UPDATE post SET post_comment_count = post_comment_count + 1 WHERE post_id = {$p_id} ";
    $update_comment_count=mysqli_query($connection,$query);

  




?>



      <div class="card my-4">
      
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="" method="post">
            <div class="form-group">
            <label for="author">Author</label>
                <input type="text" name="author" class="form-control" required>
              </div>

              <div class="form-group">
            <label for="email">Email</label>
                <input type="text" name="email"class="form-control" required>
              </div>
              <div class="form-group">
              <label for="email">Comment</label>
                <textarea class="form-control" rows="3" name="comment" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
          </div>
        </div>






        <?php
        
        $query= "SELECT * FROM comment WHERE comm_post_id = {$p_id} AND comm_status = 'Approved' ";
        $query.="ORDER BY comm_id DESC ";
        $comment_list=mysqli_query($connection,$query);
       while($row=mysqli_fetch_assoc($comment_list)){
                          
                          $comm_author=$row['comm_author'];
                          $comm_content=$row['comm_content'];
                          
          
        
        ?>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0"><?php echo $comm_author;?></h5>
            <?php echo $comm_content;?></h5>
          </div>
        </div>


       <?php } ?>

        <!-- Comment with nested comments -->
       
      </div>
      

      



      