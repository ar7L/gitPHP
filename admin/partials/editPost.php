<?php
  echo "here we go";
  if(isset($_GET["edit_id"])){
  	$x = $_GET["edit_id"];
    $e_sql = "SELECT * FROM posts WHERE p_id = '$x'";
    $e_res = mysqli_query($conn , $e_sql);
    while($row = mysqli_fetch_assoc($e_res)){
    	$p_id = $row['p_id'];
    	$p_title = $row['p_title'];
    	$p_author = $row['p_author'];
    	$p_description = $row['p_description'];
    	$p_date = $row['p_date'];
    	$p_cat = $row['p_cat'];
    	$p_comment = $row['p_comment'];
    	$p_stat = $row['p_status'];
    	$p_img = $row['p_image'];
    }?>
      <div class="row justify-content-center">
      	<div class="col-sm-12 col-md-12">
      		<div class="white-box analytics-info">
      			<div class="animate__animated animate__slideInLeft">
      				<form action = "posts.php?do=update"  method = "POST" enctype="multipart/form-data">
              <div class="row">    
              	<div class="col-md-6">
	              	<label for="exampleFormControlInput" class="form-label">post title</label>
	                <input name = "post_title" type="text" class="form-control" id="exampleFormControlInputpostName" value = '<?php echo $p_title?>'>
	                <label for="exampleFormControlInput" class="form-label">post author</label>
	                <input name = "post_author" type="text" class="form-control" id="exampleFormControlInputpostEmail" value = '<?php echo $p_author?>'>
	                <label for="exampleFormControlInput" class="form-label">description</label><br>
                  <textarea name = "post_description" class="form-control">
                    <?php echo $p_description;?>
                  </textarea>
                  <label for="exampleFormControlInput" class="form-label">comments</label><br>
                  <textarea name = "post_comment" class="form-control">
                    <?php echo $p_comment;?>
                  </textarea>


	             
              	</div>
              	<div class="col-md-6">
              		<label for="">Select category</label><br>
              		<select name = "post_cat">
                    <?php
                       $q = "select * from category";
                       $r = mysqli_query($conn , $q);
                       while($row = mysqli_fetch_assoc($r)){
                         ?>
                         <option value="<?php echo $row['c_id']?>" <?php if($p_cat == $row['c_id'])echo "selected"?> ><?php echo $row['c_name']; ?></option>
                         <?php
                    }
                    ?>

                  </select>
              		<div class="form-group">
              		<label for="exampleInputFile">Image</label><br>
              		<img src = "<?php echo "image/posts/".$p_img?>" class = "img-fluid"><br><br>
              		<input type="file" name = "image" class="form-control-file" id = "exampleInputFile">
              		<small id = "fileHelp" class="form-text text-muted">Don't upload more than 1 mb file and make sure image formate is png,jpg,jpeg etc.</small>
              		</div>
              		<div class="form-group">
              		
              		</div>
              		<select name="post_status" id="">
              			<option value="0" <?php if($p_stat==0)echo "selected"?> >Inactive</option>
              			<option value="1" <?php if($p_stat==1)echo "selected"?> >Active</option>
              		</select>
              		<input type="hidden" name = "postId" value = "<?php echo $p_id?>">
              		</div>

	                <input name="add_postr" type = "submit" class="btn btn-primary" value = "update post">

    
              	</div>
            </div>
            </form>
      			</div>
      		</div>
      	</div>
      </div>
    <?php
  
  }

?>