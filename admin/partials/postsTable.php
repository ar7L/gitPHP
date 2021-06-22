<div style = "font-size: 20px;" class="col-lg-12 col-md-12">
    <div class="white-box analytics-info">
        <h3 class="box-title">Total Page Views</h3>
        <ul class="">
<table class="table table-hover">
      <thead>
        <tr>
         
              <th class =  " border-top-0 " > # </th>
              <th class =  " border-top-0 " > Date </th>
              <th class =  " border-top-0 " > Thumbnail </th>
              <th class =  " border-top-0 " > Title</th>
              <th class =  " border-top-0 " > Description </th>
              <th class =  " border-top-0 " > Category </th>
              <th class =  " border-top-0 " > Author </th>
              <th class =  " border-top-0 " > Action </th>
              <th class =  " border-top-0 " > Status </th>

        </tr>
      </thead>
      <tbody>

<?php 


$sql_r = "SELECT * FROM posts";
$r_conn = mysqli_query($conn , $sql_r);

$c = 1;

while($row = mysqli_fetch_assoc($r_conn)){

   ?>
       <tr>
          <td><?php echo $c?></td>
          <td><?php echo $row['p_date']?></td>
          <td><img src = "image/posts/<?php echo $row['p_image']?>" class = "img-fluid">
               <?php echo $row['p_image']?>
          </td>
          <td><?php echo $row["p_title"]?> </td>
          <td><?php echo substr($row["p_description"],0,50).'...'?></td>
          <td><?php
              $p_cat = $row['p_cat'];
              $q = "select c_name from category where c_id = '$p_cat'";
              $r = mysqli_query($conn , $q);
              while($row2 = mysqli_fetch_assoc($r)){
                echo $row2['c_name'];
              }
             ?></td>

          <td><?php echo $row["p_author"]?></td>
          <td>
            <a href="posts.php?do=edit&edit_id=<?php echo $row['p_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="me-2"><i style = "color: deepskyblue;" class="fas fa-edit"></i></a>
            <a onClick="return confirm('Are you sleeping??');" href="posts.php?delete_id=<?php echo $row['p_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="delete"><i style = "color: crimson;" class="fas fa-trash"></i></a>
          </td>


          <td><?php
            if($row["p_status"] == 0){
                echo "<span class = 'btn alert-danger'>Inactive</span>";
            }else{
                echo "<span class = 'btn alert-success'>Active</span>";
                
            }
           ?></td>
      </tr>
<?php        
$c++;
}

?>

</tbody>
</table>
        </ul>
        <!-- DELETE PHP STARTS -->

        <?php

           if(isset($_GET['delete_id'])){
            // echo $_GET['delete_id'];
            $del_id = $_GET['delete_id'];
            $image_name = "SELECT p_image FROM posts WHERE p_id = '$del_id'";
            $res = mysqli_query($conn , $image_name);
            while($row = mysqli_fetch_assoc($res)){
              $img_name = $row['p_image'];
            }
            unlink('image/posts/'.$img_name);
            $sql_d = "DELETE FROM posts WHERE p_id = '$del_id'";
            $d_conn = mysqli_query($conn,$sql_d);
            if($d_conn){
                header("location: posts.php?do=Manage");
            }else{
                echo "Something went wrong!!";
            }
           }

        ?>

        <!--DELETE PHP ENDS -->
    </div>
</div>