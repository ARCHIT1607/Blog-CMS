
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<th>ID</th>
							<th>AUTHOR</th>
							<th>COMMENT</th>
							<th>EMAIL</th>
							<th>STATUS</th>
							<th>POST</th>
							<th>DATE</th>
							<th>APPROVE</th>
							<th>UNAPPROVE</th>
							<th>DELETE</th>
						</thead>
						<tbody>
							<?php 

								$query = "SELECT * FROM comments";
				                $show_data_from_comments = mysqli_query($connection, $query);

				                while ($row = mysqli_fetch_assoc($show_data_from_comments)) {
				                    
				                    $comment_id			 =  escape($row['comment_id']);
				                    $comment_post_id     =  escape($row['comment_post_id']);
				                    $comment_author    	 =  escape($row['comment_author']);
				                    $comment_content	 =  escape($row['comment_content']);
				                    $comment_email     	 =  escape($row['comment_email']);
				                    $comment_status    	 =  escape($row['comment_status']);
				                    $comment_date    	 =  escape($row['comment_date']);

				                    echo "<tr>";
				                    echo "<td>$comment_id</td>";
				                    echo "<td>$comment_author</td>";
				                    echo "<td>$comment_content</td>";

				                    /*

				                    $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id'";
									$edit_category_in_table = mysqli_query($connection, $query);

									while ($row = mysqli_fetch_assoc($edit_category_in_table)) {
										$cat_id    = $row['cat_id'];
										$cat_title = $row['cat_title'];
				                	
				                    	echo "<td>$cat_title</td>";
				                	} 

				                	*/

				                    echo "<td>$comment_email</td>";
				                    echo "<td>$comment_status</td>";

				                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
				                    $select_post_id_query = mysqli_query($connection, $query);
                                    if(!$select_post_id_query)
    {
        die("Query Failed" .mysqli_error($connection));
    }
                                   
				                    while ($row = mysqli_fetch_assoc($select_post_id_query)) {
				                    	$post_id = escape($row['post_id']);
				                    	$post_title = escape($row['post_title']);
				                    	echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                             

				                    }

				                    echo "<td>$comment_date</td>";
				                  
				                    echo "<td><a href='comments.php?approve=$comment_id' id='text-link'>Approve</a>";
				                    echo "<td><a href='comments.php?unapprove=$comment_id' id='text-link'>Unapprove</a>";
				                    echo "<td><a href='comments.php?delete=$comment_id' id='text-link'>Delete</a>";
				                    echo "</tr>";

				                }

							?>

							<!-- Approve -->
							<?php 

								if (isset($_GET['approve'])) {
									
									$approve_comment_id = escape($_GET['approve']);

									$query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $approve_comment_id";
									$approve_comment_query = mysqli_query($connection, $query);
									header("Location: comments.php");

								}

							?>

							<!-- Unpprove -->
							<?php 

								if (isset($_GET['unapprove'])) {
									
									$unapprove_comment_id = escape($_GET['unapprove']);

									$query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $unapprove_comment_id";
									$unapprove_comment_query = mysqli_query($connection, $query);
									header("Location: comments.php");

								}

							?>

							<!-- Delete -->
							<?php 

								if (isset($_GET['delete'])) {
									
									$delete_comment_id = escape($_GET['delete']);

									$query = "DELETE FROM comments WHERE comment_id = $delete_comment_id";
									$delete_comment_query = mysqli_query($connection, $query);
									header("Location: comments.php");

								}

							?>

						</tbody>
					</table>
				</div>