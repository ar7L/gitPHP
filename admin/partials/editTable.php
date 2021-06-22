<?php
  
  if(isset($_GET["edit_id"])){
  	$x = $_GET["edit_id"];
    $e_sql = "SELECT * FROM users WHERE u_id = '$x'";
    $e_res = mysqli_query($conn , $e_sql);
    while($row = mysqli_fetch_assoc($e_res)){
    	$usr_id = $row['u_id'];
    	$usr_name = $row['u_name'];
    	$usr_email = $row['u_email'];
    	$usr_pass = $row['u_password'];
    	$usr_add = $row['u_address'];
    	$usr_phn = $row['u_phone'];
    	$usr_dob = $row['u_dob'];
    	$usr_gen = $row['u_gender'];
    	$usr_role = $row['u_role'];
    	$usr_stat = $row['u_status'];
    	$usr_edu = $row['u_education'];
    	$usr_img = $row['u_image'];
    }?>
      <div class="row justify-content-center">
      	<div class="col-sm-12 col-md-12">
      		<div class="white-box analytics-info">
      			<div class="animate__animated animate__slideInLeft">
      				<form action = "users.php?do=update"  method = "POST" enctype="multipart/form-data">
              <div class="row">    
              	<div class="col-md-6">
	              	<label for="exampleFormControlInput" class="form-label">User Name</label>
	                <input name = "user_name" type="text" class="form-control" id="exampleFormControlInputUserName" value = '<?php echo $usr_name?>'>
	                <label for="exampleFormControlInput" class="form-label">User Email</label>
	                <input name = "user_email" type="email" class="form-control" id="exampleFormControlInputUserEmail" value = '<?php echo $usr_email?>'>
	                <label for="exampleFormControlInput" class="form-label">User Password</label>
	                <input name = "user_password" type="password" class="form-control" id="exampleFormControlInputUserpassword">
	                <label for="exampleFormControlInput" class="form-label">User address</label>
	                <input name = "user_address" type="text" class="form-control" id="exampleFormControlInputUseAddress" value = '<?php echo $usr_add?>'>
	                <label for="exampleFormControlInputUserPhone" class="form-label">User Name</label>
	                <input name = "user_phone" type="number" class="form-control" id="exampleFormControlInputUserPhone" value = '<?php echo $usr_phn?>'>

	                <label for="exampleFormControlInput" class="form-label">User DOB</label>
	                <input name = "user_DOB" type="date" class="form-control" id="example-date-input" value = '<?php echo $usr_dob?>'>

	              
              	</div>
              	<div class="col-md-6">
              		<label for="">Select Gender</label><br>
              		<select name="user_gender" id="">
              			<option value="Male" <?php if($usr_gen == 0)echo "selected"?> >Male</option>
              			<option value="Female" <?php if($usr_gen == 1)echo "selected"?> >FeMale</option>
              		</select>
              		<textarea name = "user_education" class="form-control my-3" name="" id="" cols="12" rows="3" placeholder="User Education">
              			<?php echo $usr_edu; ?>
              		</textarea>
              		<div class="form-group">
              		<label for="exampleInputFile">Image</label><br>
              		<img src = "<?php echo "image/users/".$usr_img?>" class = "img-fluid"><br><br>
              		<input type="file" name = "image" class="form-control-file" id = "exampleInputFile">
              		<small id = "fileHelp" class="form-text text-muted">Don't upload more than 1 mb file and make sure image formate is png,jpg,jpeg etc.</small>
              		</div>
              		<div class="form-group">
              		<label for="exampleInputFile">user role</label><br>
              		<select name="user_role" id="">
              			<option value="0" <?php if($usr_role == 0)echo "selected";?> >Subscriber</option>
              			<option value="1" <?php if($usr_role == 1)echo "selected";?> >Editor</option>
              			<option value="2" <?php if($usr_role == 2)echo "selected";?> >Admin</option>
              		</select>
              		</div>
              		<select name="user_status" id="">
              			<option value="0" <?php if($usr_stat==0)echo "selected"?> >Inactive</option>
              			<option value="1" <?php if($usr_stat==1)echo "selected"?> >Active</option>
              		</select>
              		<input type="hidden" name = "userId" value = "<?php echo $usr_id?>">
              		</div>

	                <input name="add_userr" type = "submit" class="btn btn-primary" value = "Add new user">

    
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