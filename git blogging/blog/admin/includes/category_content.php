 
 
 <?php 
 include "function.php";
 
 ?>
 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Welcome To Admin  </h1>
  
</div>
<div class="row">
  <div class="col"> 



  <?php
 addCate();
  ?>

<form action="" method="post">

<div class="form-group">
<label for="cat_title"> Add Category</label>
<div><input type="text" class="form-control" name="cat_title"></div>
</div>

<div class="form-group">
<input class="btn btn-primary" type="submit" name="submit" value="submit">
</div>

</form>


<?php
if(isset($_GET['edit'])){

include "category_update.php ";

}
?>

</div>


<div class="col">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Id</th>
<th>Category Title</th>
<th>Delete</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
  <?php
showCate();
 ?>




<?php 
deleteCate();  

?>
</tbody>

</table>
</div>





</div>