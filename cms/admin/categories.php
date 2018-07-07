
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
                            Categories
                            <!-- <small> &nbsp;Subheading</small> -->
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-fw fa-edit"></i>  <a>Categories</a>
                            </li>
                        </ol>
                <!-- Category Main Title -->						
			</div>
			
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<!-- Category Column -->
				<div class="col-lg-3">
					<br/>

					<?php 

						// Function for inserting values into categories
						insert_into_categories();

					?>

					<!-- Category Title -->
                    <form method="post" action="">
	                    <div class="form-group">
	                    	<h4>Add Category :</h4>
	                        <input type="text" name="cat_title" class="form-control">
	                    </div>
						<button type="submit" class="btn btn-primary" name="submit">ADD</button>
					</form>

					

					<?php 

						// Updating category
						if (isset($_GET['edit'])) {

							include("includes/update_categories.php");
						
						}

					?>

					<br/>
					<br/>

				</div>
				
				<div class="col-lg-1">
					<!-- Just some spacing -->
				</div>

				<div class="col-lg-8">

					<br/>
					<br/>
					
					<div class="row">
						<div id="tabletitle">
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
								  <tr>
								  	<th>SELECT</th>
									<th>ID</th>
									<th>TITLE</th>
									<th>EDIT</th>
									<th>DELETE</th>
								  </tr>
								</thead>
								<tbody>

								<?php

									// Function for displaying all the categories
									show_all_data_from_categories();

								?>

								 <?php 

								 	// Function for deleting category
								 	delete_from_category();

								 ?>

								</tbody>
							  </table>
						</div>
						</div>
					</div>	
				</div>
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