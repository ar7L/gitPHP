
<div class="row justify-content-center">
	<div class="col-sm-12 col-md-12">
        <div class="white-box analytics-info">
            <ul class="">
            <div class="animate__animated animate__slideInLeft">
            <form method = "POST" enctype="multipart/form-data">
              <div class="row">    
              	<div class="col-md-6">
	              	<label for="exampleFormControlInput" class="form-label">Title</label>
	                <input name = "post_title" type="text" class="form-control" id="exampleFormControlInputUserName" placeholder="User Name" required="required">
	                

	                <label for="exampleFormControlInput" class="form-label">Date</label>
	                <input name = "post_date" type="date" class="form-control" id="example-date-input" placeholder="User Name" required="required">

	                <label for="exampleFormControlInput" class="form-label">Select category</label><br>
	                <select name = "post_cat">
	                	<?php
	                	   $q = "select * from category";
	                	   $r = mysqli_query($conn , $q);
	                	   while($row = mysqli_fetch_assoc($r)){
	                	   	 ?>
	                	   	 <option value="<?php echo $row['c_id']?>"><?php echo $row['c_name']; ?></option>
	                	   	 <?php
	                	}
	                	?>

	                </select>
	                <select name="post_status" id="">
              			<option value="0">Active</option>
              			<option value="1">Incative</option>
              		</select>

	                <textarea name = "post_description" class="form-control my-3" name="" id="" cols="12" rows="3" placeholder="Description"></textarea>

	              
              	</div>
              	<div class="col-md-6">
              		
              		<div class="form-group">
              		<label for="exampleInputFile">Image</label><br>
              		<input type="file" name = "image" class="form-control-file" id = "exampleInputFile">
              		<small id = "fileHelp" class="form-text text-muted">Don't upload more than 1 mb file and make sure image formate is png,jpg,jpeg etc.</small>
              		</div>
              		<div class="form-group">
              		</div>
              		
              		</div>
	                <input name="add_post" type = "submit" class="btn btn-primary" value = "Add new post">

              		
              	</div>


            </div>
            </form>

            <?php
	          if(isset($_POST['add_post'])){
	          	// echo "button pressed";
	          	    $extentions = array("jpg","png","jpg");
	                $p_title = $_POST["post_title"];
					$p_description = $_POST["post_description"];
					$p_cat = $_POST["post_cat"];
					$p_date = $_POST["post_date"];
					$p_author = "Ashraf Hossain";
					$p_comment = "";
					$p_status = $_POST['post_status'];
					$p_image = $_FILES['image']['name'];
					$tmp_name = $_FILES['image']['tmp_name'];


					$art = array();
					array_push($art,$p_title,$p_image,$p_author,$p_description,$p_date,$p_cat,$p_comment,$p_status);
					if(empty($p_title) || empty($p_description)){
						echo "<span class = 'alert alert-danger'>Fill All required fields </span><br><br><br>";
						echo $p_status;
					}else{
						$extn = explode(".", $p_image);
						if(in_array(strtolower($extn[1]), $extentions)){
							move_uploaded_file($tmp_name, 'image/posts/'.$p_image);
							myInsert("posts",$art,"posts.php?do=Manage");
							
						}else{
							echo "Please insert an image File";
						}

					}

					

					

                        }
                      
             ?>
            </div>
            </ul>
        </div>		
		
	</div>
</div>