<?php require_once("../resources/config.php"); ?>

<?php include "../resources/templates/front/header.php" ?>
    <!-- Navigation -->
<?php include "../resources/templates/front/navbar.php" ?>

<?php

if(isset($_SESSION['username'])){

redirect('admin');

}

 ?>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
        <div class="col-sm-4 col-sm-offset-5">
            <form class="" action="" method="post" enctype="multipart/form-data">

                <?php login_user(); ?>

                <div class="form-group"><label for="">
                    Username<input type="text" name="username" class="form-control" required></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control" required></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>


    </header>


        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2030</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
