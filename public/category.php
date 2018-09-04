<?php require_once("../resources/config.php"); ?>

<?php include "../resources/templates/front/header.php" ?>
    <!-- Navigation -->
<?php include "../resources/templates/front/navbar.php" ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">

          <?php

          if(!$_GET['id']){
             redirect('shop.php');
           }
          else{
            $pc_id=$_GET['id'];
          }

           $select="SELECT * FROM categories where cat_id=".escape_string($pc_id)." ";
           $cat_query=query($select);
           confirm($cat_query);
           $row=fetch_array($cat_query);
           $cat_title=$row['cat_title'];
           ?>

            <div class="col-lg-12">
                <h3><?php echo $cat_title; ?></h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

          <?php

          $select="SELECT * FROM products WHERE product_category_id=".escape_string($pc_id)." ";
          $select_query=query($select);
          confirm($select_query);
          while($row=fetch_array($select_query)){
            $product_id=$row['product_id'];
            $product_price=$row['product_price'];
            $product_title=$row['product_title'];
            $short_desc=$row['short_desc'];
            $product_description=$row['product_description'];
            $product_image=$row['product_image'];
            $product_cat_id=$row['product_category_id'];
           ?>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img style="width:320px;height:150px;" src="images/<?php echo $product_image;?>" alt="">
                    <div class="caption" style="height:156px;">
                        <h3><?php echo $product_title; ?></h3>
                        <p><?php echo $short_desc; ?></p>
                        <p>
                            <a href="cart.php?add=<?php echo $product_id;?>" class="btn btn-primary">Add To Cart</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
         <?php } ?>
        </div>
        <!-- /.row -->

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
