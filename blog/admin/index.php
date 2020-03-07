<?php include "includes/admin_header.php" ;

     

    //navigation bar
     include "includes/admin_sidebarNav.php" ;
     include "includes/admin_topNav.php" ;
    //END HERE
     

    //main content
     include "includes/admin_content.php"; 
    //END HERE

       ?>        
    <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Posts</div>

          <?php
          $query="SELECT * FROM post ";
          $num_post=mysqli_query($connection,$query);
          $num_post=mysqli_num_rows($num_post);
          echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$num_post}</div>";
          
          ?>
          
        </div>
        <div class="col-auto">
          <i class="fa fa-file fa-3x"></i>
        </div>
      </div>
      <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Comments</div>
          <?php
          $query="SELECT * FROM comment ";
          $num_comment=mysqli_query($connection,$query);
          $num_comment=mysqli_num_rows($num_comment);
          echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$num_comment}</div>";
          
          ?>
          
        </div>
        <div class="col-auto">
          <i class="fa fa-comments fa-3x"></i>
        </div>
      </div>
      <a href="comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users</div>
          <?php
          $query="SELECT * FROM users ";
          $num_user=mysqli_query($connection,$query);
          $num_user=mysqli_num_rows($num_user);
          echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$num_user}</div>";
          
          ?>
          
            
              
            
           
          
        </div>
        <div class="col-auto">
          <i class="fa fa-user fa-3x"></i>
        </div>
      </div>
      <a href="user.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Categories</div>
          <?php
          $query="SELECT * FROM categories ";
          $num_category=mysqli_query($connection,$query);
          $num_category=mysqli_num_rows($num_category);
          echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$num_category}</div>";
          
          ?>
          
          
        </div>
        <div class="col-auto">
          <i class="fa fa-list fa-3x"></i>
        </div>
      </div>
      <a href="category.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
    </div>
    
  </div>
</div>
</div>



<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php 

$query="SELECT * FROM post WHERE post_status ='draft' ";
          $num_post_draft=mysqli_query($connection,$query);
          $num_post_draft=mysqli_num_rows($num_post_draft);


          $query="SELECT * FROM post WHERE post_status ='published' ";
          $num_post_pub=mysqli_query($connection,$query);
          $num_post_pub=mysqli_num_rows($num_post_pub);


          $query="SELECT * FROM comment WHERE comm_status = 'Unapproved' ";
          $num_comment_unapp=mysqli_query($connection,$query);
          $num_comment_unapp=mysqli_num_rows($num_comment_unapp);

          $query="SELECT * FROM comment WHERE comm_status = 'approved' ";
          $num_comment_app=mysqli_query($connection,$query);
          $num_comment_app=mysqli_num_rows($num_comment_app);



          $query="SELECT * FROM users WHERE user_role = 'subscriber' ";
          $num_user_role=mysqli_query($connection,$query);
          $num_user_role=mysqli_num_rows($num_user_role);
          
          $element_text=['Total Post','Active Post','Draft Post','Comments','AppovedComment','Unappoved','Users','Subscribers','Category'];
          $element_data=[$num_post,$num_post_pub,$num_post_draft,$num_comment,$num_comment_app,$num_comment_unapp,$num_user,$num_user_role,$num_category];
          for($i=0; $i<9; $i++){
              echo "['{$element_text[$i]}'" . ","."{$element_data[$i]}],";



          }
          
          
          
          
          ?>
          
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: 90%; height: 500px; margin-left: 5%;"></div>



</div>

<?php
 include "includes/admin_footer.php" ;

?>
