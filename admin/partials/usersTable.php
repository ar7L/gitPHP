<div style = "font-size: 20px;" class="col-lg-12 col-md-12">
    <div class="white-box analytics-info">
        <h3 class="box-title">Total Page Views</h3>
        <ul class="">
<table class="table table-hover">
      <thead>
        <tr>
         
              <th class =  " border-top-0 " > # </th>
              <th class =  " border-top-0 " > Thumbnail </th>
              <th class =  " border-top-0 " > Name </th>
              <th class =  " border-top-0 " > Gender </th>
              <th class =  " border-top-0 " > Email </th>
    
              <th class =  " border-top-0 " > Address </th>
              <th class =  " border-top-0 " > Phone </th>
              <th class =  " border-top-0 " > DOB </th>
              <th class =  " border-top-0 " > Education </th>
              <th class =  " border-top-0 " > Action </th>
              <th class =  " border-top-0 " > Role </th>

              <th class =  " border-top-0 " > Status </th>





        </tr>
      </thead>
      <tbody>

<?php 


$sql_r = "SELECT * FROM users";
$r_conn = mysqli_query($conn , $sql_r);

$c = 1;


while($row = mysqli_fetch_assoc($r_conn)){

   ?>
       <tr>
          <td><?php echo $c?></td>
          <td><img src = "image/users/<?php echo $row['u_image']?>" >
               <?php echo $row['u_image']?>
          </td>
          <td><?php echo $row["u_name"]?> </td>
          <td><?php echo $row["u_gender"]?></td>
          <td><?php echo $row["u_email"]?></td>
      
          <td><?php echo $row["u_address"]?></td>
          <td><?php echo $row["u_phone"]?></td>
          <td><?php echo $row["u_dob"]?></td>
          <td><?php echo $row["u_education"]?></td>
          

          <td>
            <a href="category.php?see_id=<?php echo $row['u_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="profile" class="me-2"><i style = "color: deepskyblue;" class="fas fa-eye text-warning"></i></a>

            <a href="users.php?do=edit&edit_id=<?php echo $row["u_id"]?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="me-2"><i style = "color: deepskyblue;" class="fas fa-edit"></i></a>
            <a onClick="return confirm('Are you sleeping??');" href="users.php?delete_id=<?php echo $row['u_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="delete"><i style = "color: crimson;" class="fas fa-trash"></i></a>
          </td>

          <td><?php
            if($row["u_role"] == 0){
                echo "<span class = 'btn alert-danger'>subscriber</span>";
            }else if($row['u_role'] == 1){
                echo "<span class = 'btn alert-warning'>Editor</span>";
                
            }else{
                echo "<span class = 'btn alert-success'>Admin</span>";

            }
           ?></td>


          <td><?php
            if($row["u_status"] == 0){
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
            $del_id = $_GET['delete_id'];
            $image_name = "SELECT u_image FROM users WHERE u_id = '$del_id'";
            $res = mysqli_query($conn , $image_name);
            while($row = mysqli_fetch_assoc($res)){
              $img_name = $row['u_image'];
            }
            unlink('image/users/'.$img_name);
            $sql_d = "DELETE FROM users WHERE u_id = '$del_id'";
            $d_conn = mysqli_query($conn,$sql_d);
            if($d_conn){
                header("location: users.php?do=Manage");
            }else{
                echo "Something went wrong!!";
            }
           }

        ?>

        <!--DELETE PHP ENDS -->
    </div>
</div>