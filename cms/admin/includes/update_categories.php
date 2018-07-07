					
					<br/>
					<br/>

					<form method="post" action="">
						<div class="form-group">
							<h4>Update Category :</h4>

							<?php 

							if (isset($_GET['edit'])) {
								$edit_cat_id = escape($_GET['edit']);

								$query = "SELECT * FROM categories WHERE cat_id = '$edit_cat_id'";
								$edit_category_in_table = mysqli_query($connection, $query);

								while ($row = mysqli_fetch_assoc($edit_category_in_table)) {
									$update_cat_id    = escape($row['cat_id']);
									$update_cat_title = escape($row['cat_title']);

							?>

								<input value="<?php if (isset($update_cat_title)) {
									echo $update_cat_title;
								} ?>" type="text" class="form-control" name="updated_cat_title">

							<?php 

								}
							}

							?>

							<?php 

								if (isset($_POST['update'])) {
									
									$updated_cat_title = escape($_POST['updated_cat_title']);

									$query = "UPDATE categories SET cat_title = '$updated_cat_title' WHERE cat_id = '$update_cat_id'";
									$update_categories_in_table = mysqli_query($connection, $query);

									if (!$update_categories_in_table) {
										die("Categories cannot be updated. Sorry! " . mysqli_error($connection));
									}

								}

							?>

						</div>
						<button type="submit" class="btn btn-primary" name="update">UPDATE</button>
					</form>