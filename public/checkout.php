<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>

<?php include "../resources/templates/front/header.php" ?>
    <!-- Navigation -->
<?php include "../resources/templates/front/navbar.php" ?>

    <!-- Page Content -->
    <div class="container">


<!-- /.row -->

<div class="row">
      <?php display_message(); ?>
      <h1>Checkout</h1>

      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

        <!-- Saved buttons use the "secure click" command -->
        <input type="hidden" name="cmd" value="_cart">

         <input type="hidden" name="business" value="testvivekpaypal@gmail.com">

         <input name="currency_code" type="hidden" value="INR">

    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>


          </tr>
        </thead>
        <tbody>

          <?php cart(); ?>
          <!--  <tr>
                <td>apple</td>
                <td>$23</td>
                <td>3</td>
                <td>2</td>
                <td><a href='cart.php?remove=1'>Remove</a></td>
                <td><a href='cart.php?delete=1'>Delete</a></td>
                <td><a href='cart.php?add=1'>Add</a></td>

            </tr>  -->
        </tbody>
    </table>
  <?php show_paypal(); ?>
</form>



<!--  ***********CART TOTALS*************-->

<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php echo isset($_SESSION['total_items'])?$_SESSION['total_items']:"None" ?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">
&dollar;
<?php echo isset($_SESSION['total_price'])?$_SESSION['total_price']:"Nil" ?>
</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


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
