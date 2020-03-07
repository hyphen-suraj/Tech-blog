<?php 

function addCate(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title=$_POST['cat_title'];
        if($cat_title==""||empty($cat_title)){
          echo "This field should not be empty";
        }
        else{
        $query="INSERT INTO categories(cat_title) ";
        $query.="VALUE('{$cat_title}') ";
        $added_cat=mysqli_query($connection,$query);
        if(!$added_cat){
          die('QUERY FAILED'.mysqli_error($connection));
        }
        }
        
        
          }
}

function showCate(){
    global $connection;
    $query= "SELECT * FROM categories";
    $category_list=mysqli_query($connection,$query);
  while($row=mysqli_fetch_assoc($category_list)){
                      $cat_id=$row['cat_id'];
                      $cat_title=$row['cat_title'];
                     echo "<tr>";
                     echo "<td>{$cat_id}</td>";
                     echo "<td>{$cat_title}</td>";
                     echo "<td><a href='category.php?delete={$cat_id}'>Delete</a></td>";
                     echo "<td><a href='category.php?edit={$cat_id}'>Edit</a></td>";
                     echo "</tr>";
                    }
}


function deleteCate(){

    global $connection;
    if(isset($_GET['delete'])){
        $del_cat_id=$_GET['delete'];
            $query="DELETE FROM categories WHERE cat_id={$del_cat_id}";
            $delete_cat=mysqli_query($connection,$query);
            header("Location: category.php");
        
            }  
}


?>