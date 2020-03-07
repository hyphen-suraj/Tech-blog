


<form action="" method="post">

<div class="form-group">
<label for="cat_title"> Update Category</label>

<div>
<?php
  if(isset($_GET['edit'])){
$edit_cat_id=$_GET['edit'];
$query= "SELECT * FROM categories WHERE cat_id = $edit_cat_id ";
$edit_cat=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($edit_cat)){
  $cat_edit_id=$row['cat_id'];
  $cat_edit_title=$row['cat_title'];
}
?>
<input type="text" class="form-control" name="cat_edit_title" value=<?php if(isset($cat_edit_title)){echo $cat_edit_title; }
 ?>>
<?php
  }
  ?>
</div>
</div>

<div class="form-group">
<input class="btn btn-primary" type="submit" name="update" value="update">
</div>

</form>




<?php 

if(isset($_POST['update'])){
  $cat_title=$_POST['cat_edit_title'];
  if($cat_title==""||empty($cat_title)){
    echo "This field should not be empty";
  }
  else{
  $query="UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$edit_cat_id} ";
  
  $update_cat=mysqli_query($connection,$query);
  if(!$update_cat){
    die('QUERY FAILED'.mysqli_error($connection));
  }
  }
  
  
    }

?>

