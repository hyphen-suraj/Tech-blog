


<table class="table table-bordered table-hover">
    <thead>
        <th>Id</th>
        <th>Email</th>
        <th>Comment</th>
        <th>Author</th>
        <th>Post title</th>
        
        
        <th>Date</th>
        <th>Status</th>
        
        
        <th>Approved</th>
        <th>Unapproved</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
          $query= "SELECT * FROM comment";
          $post_list=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($post_list)){
                            $comm_id=$row['comm_id'];
                            $comm_author=$row['comm_author'];
                            $comm_content=$row['comm_content'];
                            $comm_date=$row['comm_date'];
                            $comm_status=$row['comm_status'];
                            $comm_post_id=$row['comm_post_id'];
                            $comm_date=$row['comm_date'];
                            $comm_email=$row['comm_email'];
                            




                            $query="SELECT * FROM post WHERE post_id = $comm_post_id ";
                            $display_post=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($display_post)){

                              $comm_post_title=$row['post_title'];

                            }
 

       
                           echo "<tr>";
                           echo "<td>{$comm_id}</td>";
                           echo "<td>{$comm_email}</td>";
                           echo "<td>{$comm_content}</td>";
                           echo "<td>{$comm_author}</td>";
                           echo "<td>{$comm_post_title}</td>";
                          
                           echo "<td>{$comm_date}</td>";
                           echo "<td>{$comm_status}</td>";
                           
                           echo "<td><a href='comment.php?approve={$comm_id}'>Approved</a></td>";
                           echo "<td><a href='comment.php?unapprove={$comm_id}'>Unapproved</a></td>";
                           echo "<td><a href='comment.php?delete={$comm_id}'>Delete</a></td>";
                           echo "</tr>";
                          }
        
        
        
        
        
        
        
        ?>



       
      
      </tbody>
    </table>