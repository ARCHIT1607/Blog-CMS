	
	<div class="col-lg-2">
		<!-- Just some space -->
	</div>
	<div class="col-lg-8">

		<?php 

			if(isset($_POST['publish'])) {
	   
	            $post_title			= mysqli_real_escape_string($connection, trim($_POST['title']));
	            // $post_user       = $_POST['post_user'];
	            $post_user        = mysqli_real_escape_string($connection, trim($_POST['post_user']));
	            $post_category_id   = escape($_POST['post_category_id']);
	            $post_status        = escape($_POST['post_status']);
	    
	            $post_image         = escape($_FILES['image']['name']);
	            $post_image_temp    = escape($_FILES['image']['tmp_name']);
	    
	            $post_tags          = mysqli_real_escape_string($connection, trim($_POST['post_tags']);
	            $post_content       = mysqli_real_escape_string($connection, trim($_POST['post_content']));
	            $post_date          = escape(date('d-m-y'));

	            $post_comment_count = 0;

	       
	        	move_uploaded_file($post_image_temp, "../images/$post_image");

	        	 
      $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date,post_image,post_content,post_tags,post_status) ";
             
      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 

	        	$publish_query = mysqli_query($connection, $query);

	        	if (!$publish_query) {
	        		die("Not published. Sorry! " . mysqli_error($connection));
	        	}
                
                $post_id =mysqli_insert_id($connection);
                
                  echo "<p class='bg-success'>Post Created . <a href='../post.php?p_id={$post_id}'> View Post</a>or<a href='posts.php'>Edit Other Posts</a></p>";

	        }

		?>

		<form action="" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label for="post-title">Post Title: &nbsp;</label>
				<input type="text" class="form-control" name="title" id="post-title">
			</div>

			<div class="form-group">
				<label for="post-category">Category: &nbsp;</label>
				<select name="post_category_id" id="post-category">

					<option selected hidden>Select</option>

					<?php 

						$query = "SELECT * FROM categories";
						$show_categories_in_select_tag = mysqli_query($connection, $query);
						if (!$show_categories_in_select_tag) {
							die("Query Failed! " . mysqli_error($connection));
						}
						while ($row = mysqli_fetch_assoc($show_categories_in_select_tag)) {
							$category_id 	= escape($row['cat_id']);
							$category_title =escape($row['cat_title']);
							echo "<option value='$category_id'>" . $category_title . "</option>";
						}

					?>

				</select>
			</div>

			<!-- <div class="form-group">
				<label for="users">Users: &nbsp;</label>
				<select name="post_user" id="">
					<option value=''></option>
				</select>
			</div> -->


<div class="form-group">
				<label for="post-users">Users: &nbsp;</label>
				<select name="post_user" id="">

					<option selected hidden>Select</option>

					<?php 

						$query = "SELECT * FROM users";
						$select_users = mysqli_query($connection, $query);
						if (!$select_users) {
							die("Query Failed! " . mysqli_error($connection));
						}
						while ($row = mysqli_fetch_assoc($select_users)) {
							$user_id 	= $escape(row['user_id']);
							$username = escape($row['username']);
						 echo "<option value='{$username}'>{$username}</option>";
         
						}

					?>

				</select>
			</div>





<!--
			<div class="form-group">
				<label for="post-author">Post Author: &nbsp;</label>
				<input type="text" class="form-control" name="author" id="post-author">
			</div>
-->

			<div class="form-group">
				<label for="post-status">Post Status: &nbsp;</label>
				<select name="post_status" id="post-status">
					<option selected hidden>Select your option</option>
					
					<option value="published">Published</option>
					<option value="draft">Draft</option>
				</select>
			</div>

			<div class="form-group">
				<label for="post-image">Post Image: &nbsp;</label>
				<input type="file" name="image" id="post-image">
			</div>

			<div class="form-group">
				<label for="post-tags">Post Tags: &nbsp;</label>
				<input type="text" class="form-control" name="post_tags" id="post-tags">
			</div>

			<div class="form-group">
				<label for="post-content">Post Content: &nbsp;</label>
				<textarea class="form-control" name="post_content" id="body" rows="10" style="resize: none;"></textarea>
			</div>

			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="publish" value="PUBLISH">
			</div>

		</form>

	</div>
		<div class="col-lg-2">
		<!-- Just some space -->
	</div>