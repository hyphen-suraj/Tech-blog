

<?php

if(isset($_SESSION['user_id'])){
    $edit_user_id=$_SESSION['user_id'];
    $query= "SELECT * FROM users WHERE user_id = $edit_user_id ";
    $edit_user=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($edit_user)){
      $username=$row['username'];
      $user_password=$row['user_password'];
      $user_firstname=$row['user_firstname'];
      $user_lastname=$row['user_lastname'];
      $user_email=$row['user_email'];
      $user_role=$row['user_role'];
      $user_image=$row['user_image'];
      
    

    }
}

?>



<form action="" method="post"  enctype="multipart/form-data" style="margin-left: 10px;margin-right: 10px">



<div class="form-group">
<label for="post_status">Firstname</label>
<input type="text" class="form-control" name="firstname" value=<?php   echo $user_firstname;?>>
</div>

<div class="form-group">
<label for="post_status">Lastname</label>
<input type="text" class="form-control" name="lastname" value=<?php   echo $user_lastname;?>>
</div>



<div class="form-group">
<label for="post_status">Email</label>
<input type="email" class="form-control" name="email" value=<?php   echo $user_email;?>>
</div>



<div class="form-group">
<label for="title">Username</label>
<input type="text" class="form-control" name="username" value=<?php   echo $username;?>>
</div>




<div class="form-group">
<label for="post_author">Password</label>
<input type="password" class="form-control" name="password" value=<?php   echo $user_password?>>
</div>



<div class="form-group">
<label for="image">User Image</label>
<input type="file"  name="image" value=<?php   echo $user_image;?>>
</div>

<div class="form-group">
<img src="../user_images/<?php echo $user_image; ?>" height="80">
</div>



<div class="form-group">
<label for="post_tags">Role</label>

<select name="role" >
<option value="admin">Admin</option>
<option value="subscriber">Subscriber</option>


</select>
</div>





<div class="form-group">

<input type="submit" class="btn btn-primary" name="update_user" value="Update">
</div>


</form>

<?php
if(isset($_POST["update_user"])){

    $username=$_POST["username"];
    $user_password=$_POST["password"];
    $user_firstname=$_POST["firstname"];
    $user_lastname=$_POST["lastname"];
    $user_email=$_POST["email"];
    $user_image=$_FILES["image"]["name"];
    $user_image_temp=$_FILES["image"]["tmp_name"];
    
    
    $user_role=$_POST["role"];
   
    
    
    move_uploaded_file($user_image_temp,dirname(__FILE__)."/../../userImages/".$user_image);


    if(empty($user_image)){
   
      $query="SELECT * FROM users WHERE user_id = $edit_user_id ";
      $select_image = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($select_image)){
        $user_image = $row['user_image'];
      }

    }

    $query="UPDATE users SET username = '{$username}',user_password = '{$user_password}',user_firstname = '{$user_firstname}',user_lastname =  '{$user_lastname}', ";
    $query .="user_email = '{$user_email}',user_image = '{$user_image}',user_role = '{$user_role}' WHERE user_id = {$edit_user_id}";
    
    
    $update_user=mysqli_query($connection,$query);
    
    if(!$update_user){
        die('QUERY FAILED'.mysqli_error($connection));
      }
    
    }


?>