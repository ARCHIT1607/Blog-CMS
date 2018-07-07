
<?php include("includes/admin_header.php"); ?>
    
  				    <?php 

    if(isset($_SESSION['username']))
    {
        $username= escape($_SESSION['username']);
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_user_profile_query))
            {
            $user_id  	=  escape($row['user_id']);
            $username  	=  escape($row['username']);
            $user_password  	=  escape($row['user_password']);
            $user_firstname  	=  escape($row['user_firstname']);
            $user_lastname  	=  escape($row['user_lastname']);
            $user_email  	=  escape($row['user_email']);
            $user_image  	=  escape($row['user_image']);
            $user_role  	=  escape($row['user_role']);
        }
    }


?>
   
   <?php 
 if (isset($_POST['edit_user'])) {

	        	$user_firstname  	= mysqli_real_escape_string($connection, $_POST['user_firstname']);
	            $user_lastname  	= mysqli_real_escape_string($connection, $_POST['user_lastname']);
	            $username  			= mysqli_real_escape_string($connection, $_POST['username']);
	            $user_email  		= escape($_POST['user_email']);
	            $user_password  	= escape($_POST['user_password']);
	            

	        	$query  = "UPDATE users SET ";
	    		$query .= "username = '$username', ";
	    		$query .= "user_password = '$user_password', ";
	    		$query .= "user_firstname = '$user_firstname', ";
	    		$query .= "user_lastname = '$user_lastname', ";
	    		$query .= "user_email = '$user_email', ";
	    		
	    		// $query .= "user_image = '$user_image' ";
	    		$query .= "WHERE username = '{$username}' ";

	    		$update_user_query = mysqli_query($connection, $query);
	    		if (!$update_user_query) {
	    			die("Query Failed! " . mysqli_error($connection));
	    		}

	        }



?>
   
   
   
   
    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>

        <div id="page-wrapper" style="margin-top: 69px;">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            All Posts
                            <!-- <small> &nbsp;Subheading</small> -->
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-fw fa-edit"></i>  <a>View All Posts</a>
                            </li>
                        </ol>
                <!-- Category Main Title -->						
			</div>
			
		</div>
		
		<div class="container-fluid">
			<div class="row">
				  
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
				<input autocomplete="off" type="password"  class="form-control" name="user_password" id="password">
			</div>

			

			<div class="form-group">
				<label for="user-image">Image: &nbsp;</label>
				<input type="file" name="image" id="user-image">
			</div>

			<div class="form-group"  style="margin-top: 30px;">
				<input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
			</div>

		</form>


        
        
			</div>
		</div>

		<hr>

		<footer>
            <div class="row">
                <div class="col-lg-6">
                    <p>&copy; Blog CMS | 2018</p>
                </div>
                <div class="col-lg-6">
                    <p class="pull-right"> </p>
                </div>         
            </div>
            <!-- /.row -->
        </footer>
		
<?php include("includes/admin_footer.php") ?>