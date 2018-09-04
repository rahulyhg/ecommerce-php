<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>

<?php include "../resources/templates/front/header.php" ?>
    <!-- Navigation -->
<?php include "../resources/templates/front/navbar.php" ?>

<?php

if(isset($_GET['tx'])){
  report();
  session_destroy();
}else{
  redirect('index.php');
}

 ?>


<div class="container">
  <h1 class="text-center text-success" style="padding-top:15%">Thank You</h1>
  <h3 class="text-center text-success">Your Order Has Been Placed Successfuly</h3>
</div>
    <!-- /.container -->
    <hr>
    <footer class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2030</p>
            </div>
        </div>
    </footer>


 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
