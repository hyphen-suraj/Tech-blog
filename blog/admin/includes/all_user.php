


<table class="table table-bordered table-hover">
    <thead>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
          $query= "SELECT * FROM users";
          $user_list=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($user_list)){
                            $user_id=$row['user_id'];
                            $username=$row['username'];
                            $user_firstname=$row['user_firstname'];
                            $user_lastname=$row['user_lastname'];
                            $user_email=$row['user_email'];
                            
                            $user_role=$row['user_role'];
                            




                            // $query="SELECT * FROM categories WHERE cat_id = $post_cat_id ";
                            // $display_cat=mysqli_query($connection,$query);
                            // while($row=mysqli_fetch_assoc($display_cat)){

                            //   $post_category=$row['cat_title'];

                            // }
 

       
                           echo "<tr>";
                           echo "<td>{$user_id}</td>";
                           echo "<td>{$username}</td>";
                           echo "<td>{$user_firstname}</td>";
                           echo "<td>{$user_lastname}</td>";
                           echo "<td>{$user_email}</td>";
                          
                           echo "<td>{$user_role}</td>";
                          
                           echo "<td><a href='user.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
                           echo "<td><a href='user.php?delete={$user_id}'>Delete</a></td>";
                           echo "</tr>";
                          }
        
        
        
        
        
        
        
        ?>



       
      
      </tbody>
    </table>