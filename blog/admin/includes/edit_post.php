

<?php

if(isset($_GET['p_id'])){
    $edit_post_id=$_GET['p_id'];
    $query= "SELECT * FROM post WHERE post_id = $edit_post_id ";
    $edit_post=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($edit_post)){
      $post_cat_id=$row['post_category_id'];
      $post_edit_title=$row['post_title'];
      $post_edit_author=$row['post_author'];
      $post_edit_status=$row['post_status'];
      $post_edit_image=$row['post_image'];
      $post_edit_tags=$row['post_tags'];
      $post_edit_content=$row['post_content'];
    

    }
}

?>

<?php
if(isset($_POST["update_post"])){

    $post_title=$_POST["title"];
    $post_cat_id=$_POST["post_category_id"];
    $post_author=$_POST["post_author"];
    $post_status=$_POST["post_status"];
    $post_image=$_FILES["image"]["name"];
    $post_image_temp=$_FILES["image"]["tmp_name"];
    
    
    $post_tags=$_POST["post_tags"];
    $post_content=$_POST["post_content"];
    
    $post_date=date('d-m-y');
    
    
    
    move_uploaded_file($post_image_temp,dirname(__FILE__)."\..\..\images\\".$post_image);
    


    if(empty($post_image)){
   
      $query="SELECT * FROM post WHERE post_id = $edit_post_id ";
      $select_image = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($select_image)){
        $post_image = $row['post_image'];
      }

    }

    $query="UPDATE post SET post_title = '{$post_title}',post_author = '{$post_author}',post_date = now(),post_category_id =  '{$post_cat_id}', ";
    $query .="post_image = '{$post_image}',post_content = '{$post_content}',post_tags = '{$post_tags}',post_status = '{$post_status}' WHERE post_id = {$edit_post_id}";
    
    
    $update_post=mysqli_query($connection,$query);
    
    if(!$update_post){
        die('QUERY FAILED'.mysqli_error($connection));
      }

      echo "<p class='bg-success'>Post Updated <a href='../prt_blog.php?blog_id= $edit_post_id '>view Post</a> or <a href='posts.php'>Edit More Post</a></p>";
    
    }


?>

<form action="" method="post"  enctype="multipart/form-data" style="margin-left: 10px;margin-right: 10px">

<div class="form-group">
<label for="title">Post Title</label>
<input type="text" class="form-control" name="title" value=<?php   echo $post_edit_title;?>>
</div>


<div class="form-group">
<label for="post_category">Post Category Id</label>
<select name="post_category_id" class="form-control">
<?php

$query= "SELECT * FROM categories ";
$post_cat_id=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($post_cat_id)){
$cat_id=$row['cat_id'];
$cat_title=$row['cat_title'];
echo "<option value={$cat_id}>{$cat_title}</option>";


}


?>

</select>
</div>


<div class="form-group">
<label for="post_author">Post Author</label>
<input type="text" class="form-control" name="post_author" value=<?php   echo $post_edit_author;?>>
</div>

<div class="form-group">
<label for="post_status">Post Status</label>
<select name="post_status" class="form-control">
<option value="<?php echo $post_edit_status;?>"><?php echo $post_edit_status;?></option>
<?php
if($post_edit_status == 'published')
echo "<option value='draft'>Draft</option>";
else
echo "<option value='published'>Published</option>";


?>


</select>

</div>

<div class="form-group">
<label for="image">Post Image</label>
<input type="file"  name="image" value=<?php   echo $post_edit_image;?>>
</div>

<div class="form-group">
<img src="../images/<?php echo $post_edit_image; ?>" height="80">
</div>



<div class="form-group">
<label for="post_tags">Post Tags</label>
<input type="text" class="form-control" name="post_tags" value=<?php   echo $post_edit_tags;?>>
</div>


<div class="form-group">
<label for="post_content">Post Content</label>
<textarea type="text" class="form-control" name="post_content" id="editor1" cols="30" rows="10"><?php echo $post_edit_content;?></textarea>
</div>


<div class="form-group">

<input type="submit" class="btn btn-primary" name="update_post" value="Update">
</div>


</form>

