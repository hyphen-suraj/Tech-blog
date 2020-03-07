<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$username=mysqli_real_escape_string($connection , $username);
$password=mysqli_real_escape_string($connection , $password);

$query="SELECT * FROM users WHERE username = '{$username}' ";
$login_query=mysqli_query($connection, $query);


if(!$login_query){
    die("QUERY FAILED".mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($login_query))
{


   $user_id = $row['user_id'];
   $user_firstname = $row['user_firstname'];
   $user_lastname = $row['user_lastname'];
   $user_role = $row['user_role'];
   $user_password = $row['user_password'];
   $db_username = $row['username'];


}

if($username == $db_username && $password == $user_password && $user_role === 'admin'){
header("Location: ../admin");

$_SESSION['username'] = $db_username;
$_SESSION['firstname'] = $user_firstname;
$_SESSION['lastname'] = $user_lastname;
$_SESSION['role'] = $user_role;
$_SESSION['user_id'] = $user_id;

}
else{
    header("Location: ../index.php"); 
}



}



?>