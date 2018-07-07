


<?php 


function escape($string)
{
    
    
 global $connection;
    
 return mysqli_real_escape_string($connection,trim($string));
    
}







function users_online ()
{     
    if(isset($_GET['onlineusers'])){
        
        
    global $connection;
            if(!$connection)
            {

            session_start();
            include ("../includes/db.php");
              $session = session_id();
            $time =time();
            $time_out_in_seconds = 30;
            $time_out = $time = $time_out_in_seconds ;

            $query = "SELECT * FROM users_online WHERE session = '$session'";
            $send_query = mysqli_query($connection,$query);
            $count = mysqli_num_rows($send_query);

            if($count == NULL)
            {
            mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session', '$time')");

            }else {
            mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session ='$session' ");
            }

            $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time = '$time_out '");
            echo  $count_user = mysqli_num_rows($users_online_query);
            }

            }

            }

users_online ();

	function insert_into_categories() {

		global $connection;

		if (isset($_POST['submit'])) {
			$add_cat_title = mysqli_real_escape_string($connection, $_POST['cat_title']);

			if ($add_cat_title == "" || empty($add_cat_title)) {
				die("This field cannot be empty. Please try again! ");
			}
			else {
				$query  = "INSERT INTO categories(cat_title) ";
				$query .= "VALUE ('$add_cat_title')";

				$add_categories_in_table = mysqli_query($connection, $query);
				if (!$add_categories_in_table) {
					die("Input cannot be added into categories. Sorry! " . mysqli_error($connection));
				}
			}
		}
	}
	
	function show_all_data_from_categories() {

		global $connection;

		$query = "SELECT * FROM categories";
		$show_categories_in_table = mysqli_query($connection, $query);

		if (!$show_categories_in_table) {
			die("Query cannot be processed. Sorry!" . mysqli_error($connection));
		}
		else {

			while ($row = mysqli_fetch_assoc($show_categories_in_table)) {

				$table_cat_id 	 = $row['cat_id'];
				$table_cat_title = $row['cat_title'];

				echo "<tr>";
				echo "<td><input type=\"checkbox\" value=\"\"></td>";
				echo "<td>{$table_cat_id}</td>";
				echo "<td>{$table_cat_title}</td>";
				echo "<td><a href=\"categories.php?edit={$table_cat_id}\" id=\"text-link\">Edit</a></td>";
				echo "<td><a href=\"categories.php?delete={$table_cat_id}\" id=\"text-link\">Delete</a></td>";
				echo "</tr>";

			}
		}
	}

	function delete_from_category() {

		global $connection;

		if (isset($_GET['delete'])) {
								 		
	 		$delete_cat_id = $_GET['delete'];

	 		$query = "DELETE FROM categories WHERE cat_id = '$delete_cat_id'";
	 		$delete_category_from_table = mysqli_query($connection, $query);

	 		header("Location: categories.php");

	 		if (!$delete_category_from_table) {
	 			die("Category cannot be deleted. Sorry! " . mysqli_error($connection));
	 		}

	 	}

	}

	function delete_from_posts() {

		global $connection;

		if (isset($_GET['delete'])) {
						
			$delete_post_id = $_GET['delete'];

			$query = "DELETE FROM posts WHERE post_id = $delete_post_id";
			$delete_query = mysqli_query($connection, $query); 
			if (!$delete_query) {
				die("Post cannot be deleted. Query failed! " . mysqli_error($connection));
			}

			// header("Location: view_posts.php");

		}

	}

?>