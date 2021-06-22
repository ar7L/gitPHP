
<div class="row justify-content-center">
	<div class="col-sm-12 col-md-12">
        <div class="white-box analytics-info">
            <ul class="">
            <div class="animate__animated animate__slideInLeft">
            <form method = "POST" enctype="multipart/form-data">
              <div class="row">    
              	<div class="col-md-6">
	              	<label for="exampleFormControlInput" class="form-label">User Name</label>
	                <input name = "user_name" type="text" class="form-control" id="exampleFormControlInputUserName" placeholder="User Name" required="required">
	                <label for="exampleFormControlInput" class="form-label">User Email</label>
	                <input name = "user_email" type="email" class="form-control" id="exampleFormControlInputUserEmail" placeholder="User Email" required="required">
	                <label for="exampleFormControlInput" class="form-label">User Password</label>
	                <input name = "user_password" type="password" class="form-control" id="exampleFormControlInputUserpassword" placeholder="User password" required="required">
	                <label for="exampleFormControlInput" class="form-label">User address</label>
	                <input name = "user_address" type="text" class="form-control" id="exampleFormControlInputUseAddress" placeholder="User address" required="required">
	                <label for="exampleFormControlInputUserPhone" class="form-label">User Name</label>
	                <input name = "user_phone" type="number" class="form-control" id="exampleFormControlInputUserPhone" placeholder="User phone" required="required">

	                <label for="exampleFormControlInput" class="form-label">User DOB</label>
	                <input name = "user_DOB" type="date" class="form-control" id="example-date-input" placeholder="User Name" required="required">

	              
              	</div>
              	<div class="col-md-6">
              		<label for="">Select Gender</label><br>
              		<select name="user_gender" id="">
              			<option value="Male">Male</option>
              			<option value="Female">FeMale</option>
              		</select>
              		<textarea name = "user_education" class="form-control my-3" name="" id="" cols="12" rows="3" placeholder="User Education"></textarea>
              		<div class="form-group">
              		<label for="exampleInputFile">Image</label><br>
              		<input type="file" name = "image" class="form-control-file" id = "exampleInputFile">
              		<small id = "fileHelp" class="form-text text-muted">Don't upload more than 1 mb file and make sure image formate is png,jpg,jpeg etc.</small>
              		</div>
              		<div class="form-group">
              		<label for="exampleInputFile">user role</label><br>
              		<select name="user_role" id="">
              			<option value="0">Subscriber</option>
              			<option value="1">Editor</option>
              			<option value="2">Admin</option>
              		</select>
              		</div>
              		<select name="user_status" id="">
              			<option value="0">Active</option>
              			<option value="1">Incative</option>
              		</select>
              		</div>
	                <input name="add_userr" type = "submit" class="btn btn-primary" value = "Add new user">

              		
              	</div>


            </div>
            </form>

            <?php
	          if(isset($_POST['add_userr'])){
	          	// echo "button pressed";
	          	    $extentions = array("jpg","png","jpg");
	                $user_name = $_POST["user_name"];
					$user_email = $_POST["user_email"];
					$user_password = $_POST["user_password"];
					$user_address = $_POST["user_address"];
					$user_phone = $_POST["user_phone"];
					$user_gender = $_POST["user_gender"];
					$user_DOB = $_POST["user_DOB"];
					$user_education = $_POST["user_education"];
					$user_role = $_POST["user_role"];
					$user_status = $_POST["user_status"];
					$image_name = $_FILES['image']['name'];
					$tmp_name = $_FILES['image']['tmp_name'];

					$encrypt_pas = sha1($user_password);

					$art = array();
					array_push($art,$user_name,$image_name,$user_email,$encrypt_pas,$user_address,$user_phone,$user_DOB,$user_gender,$user_education,$user_role,$user_status);
				


					if(empty($user_name) || empty($user_password) || empty($user_email) ||empty($image_name) ){
						echo "<span class = 'alert alert-danger'>Fill All required fields </span>";
					}else{
						$extn = explode(".", $image_name);

						if(in_array(strtolower($extn[1]), $extentions)){
							move_uploaded_file($tmp_name, 'image/users/'.$image_name);
							myInsert("users",$art,"users.php?do=Manage");
							
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