    <?php include("inc/header.php");?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <?php include("inc/menubar.php");?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <ul class="">
                            <div class="animate__animated animate__slideInLeft">
                            <form method = "POST">
                              <div class="">    

                                <label for="exampleFormControlInput" class="form-label">Add New Category</label>
                                <input name = "cat_name" type="text" class="form-control" id="exampleFormControlInput" placeholder="Category Name" required="required">

                                <textarea name = "cat_desc" class="form-control my-3" name="" id="" cols="12" rows="3" placeholder="Add category Description"></textarea>
                                <input name="add_cat" type = "submit" class="btn btn-primary">

                            </div>
                        </form>
                         </div>
                            </ul>
                        </div>
                        <!-- EDIT CATEGORY -->
                        <?php

                           if(isset($_GET['update_id'])){
                            $upd_id = $_GET['update_id'];
                            $select_cat = "SELECT * FROM category WHERE c_id = '$upd_id'";
                            $select_conn = mysqli_query($conn , $select_cat);
                            while($row = mysqli_fetch_assoc($select_conn)){
                                $name = $row['c_name'];
                                $desc = $row['c_desc'];
                                $stat = $row['c_status'];
                            }
                            ?>
                        <div class="white-box analytics-info">
                            <ul class="">
                            <div class="animate__animated animate__slideInLeft">
                            <form method = "POST">
                              <div class="">    

                                <label for="exampleFormControlInput" class="form-label">Edit Category</label>
                                <input name = "cat_name" type="text" class="form-control" id="exampleFormControlInput" value="<?php echo $name;?>" required="required">

                                <textarea name = "cat_desc" class="form-control my-3" name="" id="" cols="12" rows="3" >
                                <?php echo trim($desc);?>
                                </textarea>
                                <div class="mb-3">
                                    <select class="form-select" name = "cat_stat">
                                        <option value = "1" <?php if($stat == 1)echo "selectd"?> >Active</option>
                                        <option value="0" <?php if($stat == 0)echo "selected"?> >Inactive</option>
                                        <!-- <option value="1">1</option> -->

                                    </select>
                                </div>
                                <input name="upd_cat" type = "submit" class="btn btn-primary">

                            </div>
                        </form>
                         </div>
                            </ul>
                        </div>
                            <?php                               
                           }

                        ?>
  
                        <!-- EDIT CATEGORY HTML ENDS-->
                    </div>
                    <!-- ADD CATEGORY PHP  STARTS -->
                      <?php
                        if(isset($_POST['add_cat'])){
                            $cat_name = $_POST['cat_name'];
                            $cat_desc = $_POST['cat_desc'];
                            $arr = array();
                            // array_push($arr,'"'.$cat_name.'"','"'.$cat_desc.'"',0);
                            array_push($arr,$cat_name,$cat_desc,0);
                            myInsert("category",$arr,"category.php");

                        }
                      ?>

                    <!-- ADD CATEGORY PHP ENDS-->
                    <!-- UPDATE CATEGORY PHP STARTS -->
                        <?php 

                           if(isset($_POST['upd_cat'])){
                            $c_name = $_POST['cat_name'];
                            $c_desc = $_POST['cat_desc'];
                            $c_status = $_POST['cat_stat'];
                            // $upd_sql = "UPDATE category SET c_name = '$c_name' , c_desc = '$c_desc', c_status = '$c_stat' WHERE c_id = '$upd_id'";
                            // $upd_conn = mysqli_query($conn , $upd_sql);
                            // // echo $c_stat;
                            // if($upd_conn){
                            //   header("Location: category.php");
                            // }else{
                            //   echo "Something went wrong";
                            // }
                            // $arr_u = array('c_name'=>$c_name,'c_desc'=>$c_desc,'c_status'=>$c_stat);
                            $arr1 = compact('c_name','c_desc','c_status');
                            myUpdate("category",$arr1,$upd_id,"category.php");
                           }

                       ?>
                    <!-- UPDATE CATEGORY PHP ENDS -->
                    <div style = "font-size: 20px;" class="col-lg-8 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Page Views</h3>
                            <ul class="">
                    <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Handle</th>
                              <th scope="col">status</th>

                            </tr>
                          </thead>
                          <tbody>

                <?php 


                   $sql_r = "SELECT * FROM category";
                   $r_conn = mysqli_query($conn , $sql_r);

                   $c = 1;

                   while($row = mysqli_fetch_assoc($r_conn)){
                       $id   = $row['c_id'];
                       $name = $row['c_name'];
                       $desc = $row['c_desc'];
                       $status = $row['c_status'];

                       ?>
                           <tr>
                              <th scope="row"><?php echo $c?></th>
                              <td><?php echo $name?></td>
                              <td><?php echo $desc?></td>
                              <td>
                                <a href="category.php?update_id=<?php echo $id?>" class="me-2"><i style = "color: deepskyblue;" class="fas fa-edit"></i></a>
                                <a onClick="return confirm('Are you sleeping??');" href="category.php?delete_id=<?php echo $id?>"><i style = "color: crimson;" class="fas fa-trash"></i></a>
                              </td>
                              <td><?php
                                if($status == 0){
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
                                myDelete("category" , "category.php", $del_id);
                               //  $sql_d = "DELETE FROM category WHERE c_id = '$del_id'";
                               //  $d_conn = mysqli_query($conn,$sql_d);
                               //  if($d_conn){
                               //      header("location: category.php");
                               //  }else{
                               //      echo "Something went wrong!!";
                               //  }
                               }

                            ?>

                            <!--DELETE PHP ENDS -->
                        </div>
                    </div>
                </div>
 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
           <?php include("inc/footer.php"); ?>