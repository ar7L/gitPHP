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
                        <h4 class="page-title">Posts</h4>
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

                  $do = isset($_GET['do'])?$_GET['do']:"Manage";
                  if($do == "Manage"){
                    include("partials/postsTable.php");
                  }if($do == "add"){
                    include("partials/Addpost.php");
                    
                  }if($do == "edit"){
                    // include("partials/Addpost.php");

                    include("partials/editPost.php");
                   }
                   if($do == "update"){ 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $extentions = array("jpg","png","jpg");
                        $p_id = $_POST["postId"];
                        $p_title = $_POST["post_title"];
                        $p_author = $_POST["post_author"];
                        $p_description = $_POST["post_description"];
                        $p_comment = $_POST["post_comment"];
                        $p_cat = $_POST["post_cat"];
                        $p_status = $_POST["post_status"];
                        $p_image = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];

                        if(empty($p_image)){
                           $arr = compact("p_title","p_author","p_description","p_comment","p_cat","p_status");
                           myUpdate("posts",$arr,$p_id,"posts.php?do=Manage");

                        }else{
                            $extn = explode(".", $p_image);

                                if(in_array(strtolower($extn[1]), $extentions)){
                                    move_uploaded_file($tmp_name, 'image/posts/'.$p_image);


                                    $image_name = "SELECT p_image FROM posts WHERE p_id = '$p_id'";
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
                                    $arr = compact("p_title","p_image","p_author","p_description","p_comment","p_cat","p_status");
                                    echo $p_image;
                                    myUpdate("posts",$arr,$p_id,"posts.php?do=Manage");
                                    
                                }else{
                                    echo "Please insert an image File";
                                }

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
        