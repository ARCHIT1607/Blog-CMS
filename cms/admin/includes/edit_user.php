	
	<?php 

		if (isset($_GET['edit_user'])) 
        {
			$edit_user_id = $_GET['edit_user'];

			$query = "SELECT * FROM users WHERE user_id = $edit_user_id";
	        $show_data_of_user = mysqli_query($connection, $query);

	        while ($row = mysqli_fetch_assoc($show_data_of_user)) 
            {
	            
	            $user_id  		=  escape($row['user_id']);
	            $username  		=  escape($row['username']);
	            $user_password  =  escape($row['user_password']);
	            $user_firstname =  escape($row['user_firstname']);
	            $user_lastname  =  escape($row['user_lastname']);
	            $user_email  	=  escape($row['user_email']);
	            $user_image  	=  escape($row['user_image']);
	            $user_role  	=  escape($row['user_role']);
	        }
?>
        
   <?php      
	        if (isset($_POST['edit_user'])) {

	        	$user_firstname  	= mysqli_real_escape_string($connection, $_POST['user_firstname']);
	            $user_lastname  	= mysqli_real_escape_string($connection, $_POST['user_lastname']);
	            $username  			= mysqli_real_escape_string($connection, $_POST['username']);
	            $user_email  		= escape($_POST['user_email']);
	            $user_password  	= escape($_POST['user_password']);
	            $user_role  		= escape($_POST['user_role']);
                
            
 
 

                
                
 if (!empty($user_password))
 {

     $query_password = "SELECT user_password FROM users WHERE user_id = $edit_user_id ";
     $get_user =mysqli_query($connection,$query_password);
     
     	if (!$get_user) {
	    			die("Query Failed! " . mysqli_error($connection));
	    		}
     
     $row = mysqli_fetch_array($get_user);
     $db_user_password  = escape($row['user_password']);
     
      if($db_user_password != $user_password)
            {
                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));;
         

      }
     $query  = "UPDATE users SET ";
	    		$query .= "username = '$username', ";
	    		$query .= "user_password = '{$hashed_password}', ";
	    		$query .= "user_firstname = '$user_firstname', ";
	    		$query .= "user_lastname = '$user_lastname', ";
	    		$query .= "user_email = '$user_email', ";
	    		$query .= "user_role = '$user_role' ";
	    		// $query .= "user_image = '$user_image' ";
	    		$query .= "WHERE user_id = '$edit_user_id'";

	    		$update_user_query = mysqli_query($connection, $query);
	    		if (!$update_user_query) {
	    			die("Query Failed! " . mysqli_error($connection));
	    		}
     
      echo "User Updated" . "<a href='users.php'>View Users?</a>";
 }
     
 }
            
  }else{
           
                header("Location: index.php");
                
                
        }
        
        
        





   
	?>

	<div class="col-lg-2">
		<!-- Just some space -->
	</div>
	<div class="col-lg-8">

		<form action="" method="post" enctype="multipart/form-data">

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="first-name">First Name: &nbsp;</label>
						<input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname" id="first-name">
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="last-name">Last Name: &nbsp;</label>
						<input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname" id="last-name">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="username">Username: &nbsp;</label>
						<input type="text" value="<?php echo $username; ?>" class="form-control" name="username" id="username">
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="email">Email: &nbsp;</label>
						<input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email" id="email">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="password">Password: &nbsp;</label>
				<input autocomplete="off" type="password" class="form-control" name="user_password" id="password">
			</div>

			<div class="form-group" style="margin-top: 25px;">
				<label for="user-role">Role: &nbsp;</label>
				<select name="user_role" id="user-role">
                <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
					<?php 

						

						if ($user_role == 'Admin') {
							echo "<option value='Subscriber'>Subscriber</option>";
						} else {
							echo "<option value='Admin'>Admin</option>";
						}

					?>

           
           <?php 
                    
                    
                    
                    
                    ?>
            
            
            
            
            
				</select>
			</div>

			<div class="form-group">
				<label for="user-image">Image: &nbsp;</label>
				<input type="file" name="image" id="user-image">
			</div>

			<div class="form-group"  style="margin-top: 30px;">
				<input class="btn btn-primary" type="submit" name="edit_user" value="Update USER">
			</div>

		</form>

	</div>
		<div class="col-lg-2">
		<!-- Just some space -->
	</div>
	