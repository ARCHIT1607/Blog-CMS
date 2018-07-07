		
				
<?php 

if(isset($_POST['checkBoxArray']))
{
    foreach($_POST['checkBoxArray'] as $postValueId)
    {
        $bulk_options =escape($_POST['bulk_options']);
        
        switch($bulk_options )
        {
            case 'published':
                
                $query ="UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id= {$postValueId} ";
                
                $update_to_published_status = mysqli_query($connection,$query);
                
                break;
                
                case 'draft':
                
                $query ="UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id= {$postValueId} ";
                
                $update_to_draft_status = mysqli_query($connection,$query);
                
                break;
                
                case 'delete':
                
                $query ="DELETE  FROM posts WHERE post_id= {$postValueId} ";
                
                $update_to_delete_status = mysqli_query($connection,$query);
                
                break;
                
                 case 'clone':
                
                $query ="SELECT *  FROM posts WHERE post_id= {$postValueId} ";
                
                $select_post_query = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_array($select_post_query))
                {
                    $post_title =escape($row['post_title']);
                    $post_category_id =escape($row['post_category_id']);
                    $post_date =escape($row['post_date']);
                    $post_author =escape($row['post_author']);
                    $post_status =escape($row['post_status']);
                    $post_image =escape($row['post_image']);
                    $post_tags =escape($row['post_tags']);
                    $post_content =escape($row['post_content']);
                }
                $query  = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
	        	$query .= "VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags',  '$post_status')";
                $copy_query =mysqli_query($connection,$query);
                if(!$copy_query)
                {
                    die("Query Failed" . mysqli_error($connection));
                }
                
                break;
        }
    }
}



?>		
				<?php

					// Function for deleting posts
					delete_from_posts();

				?>
				<form action="" method="post">

				
					<table class="table  table-bordered table-hover">
					  <div id="bulkOptionsContainer" class="col-xs-4">
					    <select class="form-control" name="bulk_options" id="">
					        
					        <option value="">Select Options</option>
					        <option value="published">Publish </option>
					        <option value="draft">Draft </option>
					        <option value="delete">Delete </option>
					        <option value="clone">Clone </option>
					        
					    </select>
					
					
					  </div>
					  <div class="col-xs-4">
					      <input type="submit" name="submit" class="btn btn-success" value="Apply">
					      <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
					  </div>
						<thead>
							<th><input id="selectAllBoxes" type="checkbox"></th>
							<th>ID</th>
							<th>Users</th>
							<th>TITLE</th>
							<th>CATEGORY</th>
							<th>STATUS</th>
							<th>IMAGE</th>
							<th>TAGS</th>
							<th>COMMENTS</th>
							<th>DATE</th>
							<th>View Post</th>
							<th>EDIT</th>
							<th>DELETE</th>
						</thead>
						<tbody>
							<?php 

								 $query = "SELECT * FROM posts ORDER BY post_id DESC ";
				                $show_data_from_posts = mysqli_query($connection, $query);

				                while ($row = mysqli_fetch_assoc($show_data_from_posts)) {
				                    
				                    $post_id 			 =  escape($row['post_id']);
				                    $post_title     	 =  escape($row['post_title']);
				                    $post_author    	 =  escape($row['post_author']);
				                    $post_user    	     =  escape($row['post_user']);
				                    $post_category_id	 =  escape($row['post_category_id']);
				                    $post_date      	 =  escape($row['post_date']);
				                    $post_image     	 =  escape($row['post_image']);
				                    $post_tags	    	 =  escape($row['post_tags']);
				                    $post_status    	 =  escape($row['post_status']);
				                    $post_comment_count  =  escape($row['post_comment_count']);
				                    $post_views_count  =  escape($row['post_views_count']);

				                    echo "<tr>";
                                       
                                    ?>
                                    <td><input class='checkBoxes' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                                     <?php
     
        echo "<td>$post_id </td>";


        if(!empty($post_author)) {

             echo "<td>$post_author</td>";


        } elseif(!empty($post_user)) {

            echo "<td>$post_user</td>";


        }

                                    
                                    
                                    
                                    
				                    echo "<td>$post_title</td>";

				                    $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id'";
									$edit_category_in_table = mysqli_query($connection, $query);

									while ($row = mysqli_fetch_assoc($edit_category_in_table)) {
										$cat_id    = escape($row['cat_id']);
										$cat_title = escape($row['cat_title']);
				                	
				                    	echo "<td>$cat_title</td>";
				                	}

				                    echo "<td>$post_status</td>";
				                    echo "<td align='center'><img src=\"../images/$post_image\" width='100' ></td>";
				                    echo "<td>$post_tags</td>";
                                    
                                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                                    $send_comment_query = mysqli_query($connection,$query);
                                    $row = mysqli_fetch_array($send_comment_query);
                                    $comment_id = escape($row['comment_id']);
                                    $count_comments = mysqli_num_rows($send_comment_query);
                                    
                                    
                                    
				                    echo "<td><a href='post_comments.php?id=$post_id'>$count_comments</a></td>";
                                    
                                    
				                    echo "<td>$post_date </td>";
                                    echo "<td><a href='../post.php?p_id=$post_id' id='text-link'>View Post</td>";
				                    echo "<td><a href='posts.php?source=edit_post&p_id=$post_id' id='text-link'>Edit</td>";
				                    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='posts.php?delete=$post_id' id='text-link'>Delete</a></td>";
				                    echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
				                    echo "</tr>";

				                }

							?>
						</tbody>
					</table>
</form>






<?php

if(isset($_GET['delete']))
{
    $the_post_id = escape($_GET['delete']);
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location: posts.php");
}


if(isset($_GET['reset']))
{
    $the_post_id = escape($_GET['reset']);
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection,$_GET['reset']) ." ";
    $reset_query = mysqli_query($connection,$query);
    header("Location: posts.php");
}


?>