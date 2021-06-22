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
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal">Dashboard</a></li>

                </ol>
                <a href="inc/logout.php" class="btn btn-danger mx-2">Log out</a>
                
            </div>
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
    <?php

       
        $do = isset($_GET["do"])?$_GET["do"]:"Manage";
        if($do == "Manage"){
            include("partials/usersTable.php");
        }
        if($do == "Add"){
            include("partials/AddNew.php");
        }
        if($do == "delete"){

        }
        if($do == "edit"){
            // if(isset($_GET["edit_id"])){
            //     $x =  $_GET["edit_id"];
            //     echo $x;
            // }
            include("partials/editTable.php");
        }
        if($do == "update"){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $extentions = array("jpg","png","jpg");
                $u_id = $_POST["userId"];
                $u_name = $_POST["user_name"];
                $u_email = $_POST["user_email"];
                $u_password = $_POST["user_password"];
                $u_address = $_POST["user_address"];
                $u_phone = $_POST["user_phone"];
                $u_gender = $_POST["user_gender"];
                $u_DOB = $_POST["user_DOB"];
                $u_education = $_POST["user_education"];
                $u_role = $_POST["user_role"];
                $u_status = $_POST["user_status"];
                $u_image = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];

                if(empty($u_password) && empty($u_image)){
                   $arr = compact("u_name","u_email","u_address","u_phone","u_dob","u_gender","u_education","u_role","u_status");
                   myUpdate("users",$arr,$u_id,"users.php?do=Manage");

                }else if(empty($u_password) && !empty($u_image)){
                    $extn = explode(".", $u_image);

                        if(in_array(strtolower($extn[1]), $extentions)){
                            move_uploaded_file($tmp_name, 'image/users/'.$u_image);


                            $image_name = "SELECT u_image FROM users WHERE u_id = '$u_id'";
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
                            $arr = compact("u_name","u_image","u_email","u_address","u_phone","u_dob","u_gender","u_education","u_role","u_status");
                            echo $u_image;
                            myUpdate("users",$arr,$u_id,"users.php?do=Manage");
                            
                        }else{
                            echo "Please insert an image File";
                        }

                }else if(!empty($user_password) && !empty($image_name)){

                }else{

                }
            }
        }
       

    ?>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include("inc/footer.php"); ?>
