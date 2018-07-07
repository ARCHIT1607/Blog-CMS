

    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <form action="search.php" method="post">
                <div class="input-group" style="margin-top: 15px;">
                    <input type="text" name="search" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="submit" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>

        <div class="well">
            <h4>Login</h4>
            <form action="includes/login.php" method="post">
                <div class="input-group" style="margin-top: 15px;">
                    <input type="text" name="username" placeholder="Enter username" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-user"></span>
                        </button>
                    </span>
                </div>
                <div class="input-group" style="margin-top: 12px;">
                    <input type="password" name="password" placeholder="Enter password" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-lock"></span>
                        </button>
                    </span>
                </div>
                <div style="margin-top: 15px;">
                    <button class="btn btn-primary" name="login" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4 style="margin-bottom: 25px;">Blog Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                        <?php 

                            $query = "SELECT * FROM categories";
                            $show_data_from_categories = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($show_data_from_categories)) {
                                $cat_id    = $row['cat_id'];
                                $cat_title = $row['cat_title'];

                        ?>

                        <li>
                            <h5><a href="categories.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></h5>
                        </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <?php include("widget.php"); ?>

    </div>