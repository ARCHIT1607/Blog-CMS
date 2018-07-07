
<?php include "includes/db.php"; ?>

<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- <h1 class="page-header"> -->
                <h1>
                    Our-Blogs
                    <small> &nbsp;</small>
                </h1>

            <?php 

                if (isset($_GET['p_id'])) {
                    $caught_id  = $_GET['p_id'];
                    
                    $view_query ="UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id= $caught_id";
                    $send_query = mysqli_query($connection,$view_query);
                    
                    if(!$send_query)
                    {
                        die("Query Failed");
                    }
               

                $query = "SELECT * FROM posts WHERE post_id = $caught_id";
                $show_data_from_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($show_data_from_posts)) {
                    
                    $post_id        =   $row['post_id'];
                    $post_title     =   $row['post_title'];
                    $post_author    =   $row['post_author'];
                    $post_date      =   $row['post_date'];
                    $post_image     =   $row['post_image'];
                    $post_content   =   $row['post_content'];

            ?>

                <hr>
                <hr>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p><br>
                

                <?php } 
                
                
                } else {
                    header("Location: index.php");
                }
                
                
                ?>

                <hr>

                <!-- Blog Comments -->

                <?php 

                    if (isset($_POST['create_comment'])) {
                        
                        $caught_id = $_GET['p_id'];
                        $comment_author   = $_POST['comment_author'];
                        $comment_email    = $_POST['comment_email'];
                        $comment_content  = mysqli_real_escape_string( $connection, $_POST['comment_content']);
                        
                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                            
                            
                        $query  = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES ('$caught_id', '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";

                        $create_comment_query = mysqli_query($connection, $query);

                        if (!$create_comment_query) {
                            die('Sorry! Query failed. ' . mysqli_error($connection));
                        }
//
//                         Update comment count
//                        $query  = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
//                        $query .= "WHERE post_id = $caught_id";
//                        $update_comment_count = mysqli_query($connection, $query);

                        }else{
                            echo "<script>alert('Fields cannot be empty')</script>";
                        }
                         

                    }

                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4 class="media media-heading">Want to leave a comment? &nbsp; <small>{Comment will be approved within 24 hours}</small></h4>
                    <hr>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" class="form-control" name="comment_author" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" class="form-control" name="comment_email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Your comment :</label>
                            <textarea name="comment_content" class="form-control" rows="4" placeholder="Type here . . ."></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 

                    $query  = "SELECT * FROM comments WHERE comment_post_id = $caught_id ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC";
                    $display_comment_query = mysqli_query($connection, $query);
                    if (!$display_comment_query) {
                        die('Sorry! Query failed. ' . mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_assoc($display_comment_query)) {
                        $comment_date       =  $row['comment_date'];
                        $comment_author     =  $row['comment_author'];
                        $comment_content    =  $row['comment_content'];

                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><strong><?php echo "$comment_author"; ?></strong>
                            <small>@ <?php echo "$comment_date"; ?></small>
                        </h4>
                        <?php echo "$comment_content"; ?>
                    </div>
                </div>

                <?php

                    }

                ?>

                <br>

                <hr>

                <!-- Pager -->
<!--
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
-->

            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include "includes/footer.php"; ?>