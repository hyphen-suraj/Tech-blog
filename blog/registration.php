
<?php include "includes/header.php" ;?>


    <!-- Navigation -->
    
  
<?php include "includes/navigation_bar.php" ;?>
 
    <!-- Page Content -->
   




  <?php
  
  if(isset($_POST['submit'])){

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];


$username=mysqli_real_escape_string($connection,$username);
$email=mysqli_real_escape_string($connection,$email);
$password=mysqli_real_escape_string($connection,$password);

$query="SELECT rant_solt FROM users ";
$salt_query=mysqli_query($connection,$query);
if(!$salt_query){
    die("QUERY FAILED ".mysqli_error($connection));
}
$row=mysqli_fetch_assoc($salt_query);
$salt=$row['rant_solt'];
$password=crypt($password,$salt);

$query="INSERT INTO users(username,user_password,user_email,user_role) ";
$query .="VALUES('{$username}','{$password}','{$email}','subscriber') ";

$add_user=mysqli_query($connection,$query);

if(!$add_user){
    die('QUERY FAILED'.mysqli_error($connection));
  }

}






  

  ?>  
<section id="login" style="text-align: center;margin-left: 40%;">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>


      
