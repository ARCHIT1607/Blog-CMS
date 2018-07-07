
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<th>ID</th>
							<th>USERNAME</th>
							<th>FIRST NAME</th>
							<th>LAST NAME</th>
							<th>EMAIL</th>
							<th>ROLE</th>
							<th colspan="2">CHANGE ROLES</th>
							<th>EDIT</th>
							<th>DELETE</th>
						</thead>
						<tbody>
							<?php 

								$query = "SELECT * FROM users";
				                $show_data_from_users = mysqli_query($connection, $query);

				                while ($row = mysqli_fetch_assoc($show_data_from_users)) {
				                    
				                    $user_id  	=  escape($row['user_id']);
				                    $username  	=  escape($row['username']);
				                    $user_password  	=  escape($row['user_password']);
				                    $user_firstname  	=  escape($row['user_firstname']);
				                    $user_lastname  	=  escape($row['user_lastname']);
				                    $user_email  	=  escape($row['user_email']);
				                    $user_image  	=  escape($row['user_image']);
				                    $user_role  	=  escape($row['user_role']);

				                    echo "<tr>";
				                    echo "<td>$user_id</td>";
				                    echo "<td>$username</td>";
				                    echo "<td>$user_firstname</td>";
				                    echo "<td>$user_lastname</td>";

				                    /*

				                    $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id'";
									$edit_category_in_table = mysqli_query($connection, $query);

									while ($row = mysqli_fetch_assoc($edit_category_in_table)) {
										$cat_id    = $row['cat_id'];
										$cat_title = $row['cat_title'];
				                	
				                    	echo "<td>$cat_title</td>";
				                	} 

				                	*/

				                    echo "<td>$user_email</td>";
				                    echo "<td>$user_role</td>";

				                    /*
				                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
				                    $select_post_category_id = mysqli_query($connection, $query);
				                    while ($row = mysqli_fetch_assoc($select_post_category_id)) {
				                    	$post_id = $row['post_id'];
				                    	$post_title = $row['post_title'];
				                    	echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
				                    }
				                    */

				                    echo "<td><a href='users.php?change_to_admin=$user_id' id='text-link'>Admin</a>";
				                    echo "<td><a href='users.php?change_to_subscriber=$user_id' id='text-link'>Subscriber</a>";
				                   echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
				                    echo "<td><a href='users.php?delete=$user_id' id='text-link'>Delete</a>";
				                    echo "</tr>";

				                }

							?>

							<!-- Change user to admin -->
							<?php 

								if (isset($_GET['change_to_admin'])) {
									
									$admin_user_id = escape($_GET['change_to_admin']);

									$query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $admin_user_id";
									$admin_user_query = mysqli_query($connection, $query);
									header("Location: users.php");

								}

							?>

							<!-- Change user to subscriber -->
							<?php 

								if (isset($_GET['change_to_subscriber'])) {
									
									$subscriber_user_id = escape($_GET['change_to_subscriber']);

									$query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $subscriber_user_id";
									$subscriber_user_query = mysqli_query($connection, $query);
									header("Location: users.php");

								}

							?>

							<!-- Delete -->
							<?php 

								if (isset($_GET['delete'])) {
                                    
                                    
                                    if(isset($_SESSION['user_role'])){
                                        
                                        if($_SESSION['user_role'] == 'Admin'){
									
									$delete_user_id = mysqli_real_escape_string($connection,$_GET['delete']);

									$query = "DELETE FROM users WHERE user_id = $delete_user_id";
									$delete_comment_query = escape(mysqli_query($connection, $query));
									header("Location: users.php");

								}
                                }
                                }

							?>

						</tbody>
					</table>
				</div>