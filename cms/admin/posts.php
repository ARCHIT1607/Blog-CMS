
<?php include("includes/admin_header.php"); ?>

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
                                <i class="fa fa-fw fa-edit"></i>  <a href="posts.php">View All Posts</a>
                            </li>
                        </ol>
                <!-- Category Main Title -->						
			</div>
			
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<?php 

					if (isset($_GET['source'])) {
						$source = escape($_GET['source']);
					}
					else {
						$source = "";
					}

					switch ($source) {
						case 'add_post':
							include('includes/add_post.php');
							break;

						case 'edit_post':
							include('includes/edit_post.php');
							break;
						
						default:
							include('includes/view_posts.php');
							break;
					}

				?>
			</div>
		</div>

		<hr>

		<footer>
            <div class="row">
                <div class="col-lg-6">
                    <p>&copy; Blog CMS | 2018</p>
                </div>
                <div class="col-lg-6">
                    <p class="pull-right"></p>
                </div>         
            </div>
            <!-- /.row -->
        </footer>
		
<?php include("includes/admin_footer.php") ?>