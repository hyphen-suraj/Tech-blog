
         <!-- Categories Widget -->



         <?php 
         $query= "SELECT * FROM categories";
         $cat_list=mysqli_query($connection,$query);

         ?>



          <div class="card my-4">
               <h5 class="card-header">Categories</h5>
               <div class="card-body">
                 <div class="row">
                    <div class="col-lg-6">
                       <ul class="list-unstyled mb-0">
                       <?php
                         while($row=mysqli_fetch_assoc($cat_list)){
                           $cat_title=$row['cat_title'];
                           $cat_id=$row['cat_id'];
                            echo "<li>
                             <a href='cat_blog.php?cat_id={$cat_id}'>{$cat_title}</a>
                             </li>";
                          }
          
                  
                  
                  
                        ?>
                   
                        </ul>
                      </div>
                      
                    </div>
                   </div>
                 </div>

          
  