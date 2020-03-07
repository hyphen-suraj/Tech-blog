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


  

        include "includes/all_comment.php"; 
    




   
    
    //END HERE
 ?>
   
    

   <?php
         if(isset($_GET['delete'])){
          $the_comm_id = $_GET['delete'];
        $query ="DELETE FROM comment WHERE comm_id = {$the_comm_id}";
          $delete_post=mysqli_query($connection,$query);
          header("Location: comment.php");
    
    
        }


        if(isset($_GET['approve'])){
            $the_comm_id = $_GET['approve'];
          $query="UPDATE comment SET comm_status = 'Approved' WHERE comm_id = {$the_comm_id} ";;
            $approve_comment=mysqli_query($connection,$query);
            header("Location: comment.php");
      
      
          }


          if(isset($_GET['unapprove'])){
            $the_comm_id = $_GET['unapprove'];
          $query="UPDATE comment SET comm_status = 'Unapproved' WHERE comm_id = {$the_comm_id} ";;
            $approve_comment=mysqli_query($connection,$query);
            header("Location: comment.php");
      
      
          }
        
        ?>

 <?php 
 include "includes/admin_footer.php" ;

?>
