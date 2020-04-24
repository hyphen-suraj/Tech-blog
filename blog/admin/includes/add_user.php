<?php 
if(isset($_POST["create_user"])){

$username=$_POST["username"];
$password=$_POST["password"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$user_image=$_FILES["image"]["name"];
$user_image_temp=$_FILES["image"]["tmp_name"];


$role=$_POST["role"];

$query="SELECT rant_solt FROM users ";
$salt_query=mysqli_query($connection,$query);
if(!$salt_query){
    die("QUERY FAILED ".mysqli_error($connection));
}
$row=mysqli_fetch_assoc($salt_query);
$salt=$row['rant_solt'];
$password=crypt($password,$salt);


move_uploaded_file($user_image_temp,dirname(__FILE__)."\..\..\userImages\\".$user_image);

$query="INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_image,user_role) ";
$query .="VALUES('{$username}','{$password}','{$firstname}','{$lastname}','{$email}','{$user_image}','{$role}') ";

$add_user=mysqli_query($connection,$query);

if(!$add_user){
    die('QUERY FAILED'.mysqli_error($connection));
  }

}


?>
<form action="" method="post"  enctype="multipart/form-data" style="margin-left: 10px;margin-right: 10px">


<div class="form-group">
<label for="post_status">Firstname</label>
<input type="text" class="form-control" name="firstname">
</div>


<div class="form-group">
<label for="post_status">Lastname</label>
<input type="text" class="form-control" name="lastname">
</div>

<div class="form-group">
<label for="post_status">Email</label>
<input type="email" class="form-control" name="email">
</div>


<div class="form-group">
<label for="title">Username</label>
<input type="text" class="form-control" name="username">
</div>







<div class="form-group">
<label for="post_author">Password</label>
<input type="password" class="form-control" name="password">
</div>









<div class="form-group">
<label for="image">Image</label>
<input type="file"  name="image">
</div>



<div class="form-group">
<label for="post_tags">Role</label>

<select name="role" >
<option value="admin">Admin</option>
<option value="subscriber">Subscriber</option>


</select>
</div>




<div class="form-group">

<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
</div>


</form>


