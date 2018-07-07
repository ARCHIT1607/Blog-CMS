	
	<div class="col-lg-2">
		<!-- Just some space -->
	</div>
	<div class="col-lg-8">

		<?php 

			if(isset(escape($_POST['create_user'])) {
	   
	            $user_firstname  	= mysqli_real_escape_string($connection, $_POST['user_firstname']);
	            $user_lastname  	= mysqli_real_escape_string($connection, $_POST['user_lastname']);
	            $username  			= mysqli_real_escape_string($connection, $_POST['username']);
	            $user_email  		= escape($_POST['user_email']);
	            $user_password  	= escape($_POST['user_password']);
	            $user_role  		= escape($_POST['user_role']);
	    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));      

	        	$query  = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_password, user_role) ";
	        	$query .= "VALUES ('$user_firstname', '$user_lastname', '$username', '$user_email', '$user_password', '$user_role')";

	        	$create_user_query = mysqli_query($connection, $query);
//                confirmQuery($create_user_query);

                echo"User Created: ". " "."<a href='users.php'>View Users</a>";
                    
	        	if (!$create_user_query) {
	        		die("User not added. Sorry! " . mysqli_error($connection));
	        	}

	        }

		?>

		<form action="" method="post" enctype="multipart/form-data">

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="first-name">First Name: &nbsp;</label>
						<input type="text" class="form-control" name="user_firstname" id="first-name">
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="last-name">Last Name: &nbsp;</label>
						<input type="text" class="form-control" name="user_lastname" id="last-name">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="username">Username: &nbsp;</label>
						<input type="text" class="form-control" name="username" id="username">
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="email">Email: &nbsp;</label>
						<input type="text" class="form-control" name="user_email" id="email">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="password">Password: &nbsp;</label>
				<input type="password" class="form-control" name="user_password" id="password">
			</div>

			<div class="form-group" style="margin-top: 25px;">
				<label for="user-role">Role: &nbsp;</label>
				<select name="user_role" id="user-role">

					<option selected hidden>Select</option>

					<option value="Admin">Admin</option>
					<option value="Subscriber">Subscriber</option>

				</select>
			</div>

			<div class="form-group">
				<label for="user-image">Image: &nbsp;</label>
				<input type="file" name="image" id="user-image">
			</div>

			<div class="form-group"  style="margin-top: 30px;">
				<input class="btn btn-primary" type="submit" name="create_user" value="ADD USER">
			</div>

		</form>

	</div>
		<div class="col-lg-2">
		<!-- Just some space -->
	</div>