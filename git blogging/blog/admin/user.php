<?php include "includes/admin_header.php" ;

     

    //navigation bar
     include "includes/admin_sidebarNav.php" ;
     include "includes/admin_topNav.php" ;
    //END HERE
?>


   <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Welcome To Admin  </h1>
    </div>



<?php 
    //main content


    if(isset($_GET['source'])){
      $source = $_GET['source'];

    }
    
    else{

        $source='';
    }
     

    switch($source){
    
        case 'add_user':
            include "includes/add_user.php"; 
        break;
        case 'edit_user':

            include "includes/edit_user.php"; 
        break;

        default:
        include "includes/all_user.php"; 
    }




   
    
    //END HERE
 ?>
   
    

   <?php
         if(isset($_GET['delete'])){
          $the_user_id = $_GET['delete'];
        $query ="DELETE FROM users WHERE user_id = {$the_user_id}";
          $delete_user=mysqli_query($connection,$query);
          header("Location: user.php");
    
    
        }
        
        ?>

 <?php 
 include "includes/admin_footer.php" ;

?>
