
<?php
if(isset($_POST['checkboxArray'])){

  foreach($_POST['checkboxArray'] as $checkboxValue){
    $bulk_option=$_POST['bulkOption'];

    switch($bulk_option){
      case 'published':
      $query= "UPDATE post SET post_status='published' WHERE post_id={$checkboxValue} ";
      $update_query=mysqli_query($connection,$query);

      break;

      case 'draft':
        $query= "UPDATE post SET post_status='draft' WHERE post_id={$checkboxValue} ";
        $update_query=mysqli_query($connection,$query);
  
        break;

        case 'delete':
          $query= "DELETE FROM post  WHERE post_id={$checkboxValue} ";
          $delete_query=mysqli_query($connection,$query);
    
          break;




    }
    
}

}

?>





<form action="" method="post">
<div class="row">
<div id="bulkoptionscontainer" class="col-md-4">

<select class="form-control" name="bulkOption" > 
<option value="">Select Option</option>
<option value="draft">Draft</option>
<option value="published">Publish</option>
<option value="delete">Delete</option>

</select>


</div>

<div class="col-md-4">

<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
</div>
</div>



<table class="table table-bordered table-hover">
    <thead>
    <th><input type="checkbox" id="selectAll"></th>
        <th>Id</th>
        <th>Category</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comment Count</th>
        <th>Status</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
          $query= "SELECT * FROM post";
          $post_list=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($post_list)){
                            $post_id=$row['post_id'];
                            $post_title=$row['post_title'];
                            $post_cat_id=$row['post_category_id'];
                            $post_author=$row['post_author'];
                            $post_tags=$row['post_tags'];
                            $post_date=$row['post_date'];
                            $post_image=$row['post_image'];
                            $post_count=$row['post_comment_count'];
                            $post_status=$row['post_status'];




                            $query="SELECT * FROM categories WHERE cat_id = $post_cat_id ";
                            $display_cat=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($display_cat)){

                              $post_category=$row['cat_title'];

                            }
 

       
                           echo "<tr>";
                           ?>
<td><input type='checkbox' class='checkbox' name='checkboxArray[]' value='<?php echo $post_id; ?>'></td>

                           <?php
                           
                           echo "<td>{$post_id}</td>";
                           echo "<td>{$post_category}</td>";
                           echo "<td>{$post_title}</td>";
                           echo "<td>{$post_author}</td>";
                           echo "<td>{$post_date}</td>";
                           echo "<td><img width='100' class='img-responsive' src='../images/$post_image' alt='image'></td>";
                           echo "<td>{$post_tags}</td>";
                           echo "<td>{$post_count}</td>";
                           echo "<td>{$post_status}</td>";
                           echo "<td><a href='../prt_blog.php?blog_id={$post_id}'>View</a></td>";
                           echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                           echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                           echo "</tr>";
                          }
        
        
        
        
        
        
        
        ?>



       
      
      </tbody>
    </table>
    </form>