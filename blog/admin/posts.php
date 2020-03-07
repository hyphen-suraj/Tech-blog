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
    
        case 'add_post':
            include "includes/add_post.php"; 
        break;
        case 'edit_post':

            include "includes/edit_post.php"; 
        break;

        default:
        include "includes/all_post.php"; 
    }




   
    
    //END HERE
 ?>
   
    

   <?php
         if(isset($_GET['delete'])){
          $the_post_id = $_GET['delete'];
        $query ="DELETE FROM post WHERE post_id = {$the_post_id}";
          $delete_post=mysqli_query($connection,$query);
          header("Location: posts.php");
    
    
        }
        
        ?>

 <?php 
 include "includes/admin_footer.php" ;

?>
