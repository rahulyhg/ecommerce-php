<?php require_once("../../resources/config.php") ?>
<?php include "../../resources/templates/back/header.php" ?>

<?php

if(!isset($_SESSION['username'])){
  redirect('../login.php');
}

 ?>
        <div id="page-wrapper">

            <div class="container-fluid">


               <?php

                  if($_SERVER['REQUEST_URI']=='/ecommerce/public/admin/' || $_SERVER['REQUEST_URI']=='/ecommerce/public/admin/index.php'){
                     include "../../resources/templates/back/admin_content.php";
                  }

                  if(isset($_GET['orders'])){
                    include "../../resources/templates/back/orders.php";
                  }

                  if(isset($_GET['reports'])){
                    include "../../resources/templates/back/reports.php";
                  }

                  if(isset($_GET['products'])){
                    include "../../resources/templates/back/products.php";
                  }

                  if(isset($_GET['add_product'])){
                    include "../../resources/templates/back/add_product.php";
                  }

                  if(isset($_GET['categories'])){
                    include "../../resources/templates/back/categories.php";
                  }

                  if(isset($_GET['edit_product'])){
                    include "../../resources/templates/back/edit_product.php";
                  }

                  if(isset($_GET['edit_category'])){
                    $edit_id=$_GET['edit_category'];
                    include "../../resources/templates/back/edit_category.php";
                  }

                  if(isset($_GET['users'])){
                    include "../../resources/templates/back/users.php";
                  }

                  if(isset($_GET['add_user'])){
                    include "../../resources/templates/back/add_user.php";
                  }

                  if(isset($_GET['edit_user'])){
                    $edit_id=$_GET['edit_user'];
                    include "../../resources/templates/back/edit_user.php";
                  }

                  if(isset($_GET['delete_order'])){
                    $del_id=$_GET['delete_order'];
                    $query=query("DELETE FROM orders WHERE order_id=".escape_string($del_id)." ");
                    confirm($query);
                    set_message("<h4 class='text-danger'>Order With Id ".escape_string($del_id)." deleted successfuly</h4>");
                    redirect('index.php?orders');
                  }

                  if(isset($_GET['delete_product'])){
                    $del_id=$_GET['delete_product'];
                    $query=query("DELETE FROM products WHERE product_id=".escape_string($del_id)." ");
                    confirm($query);
                    set_message("<h4 class='text-danger'>Product deleted successfuly</h4>");
                    redirect('index.php?products');
                  }

                  if(isset($_GET['delete_category'])){
                    $del_id=$_GET['delete_category'];
                    $query=query("DELETE FROM categories WHERE cat_id=".escape_string($del_id)." ");
                    confirm($query);
                    set_message("<h4 class='text-danger'>Category deleted successfuly</h4>");
                    redirect('index.php?categories');
                  }

                  if(isset($_GET['delete_user'])){
                    $del_id=$_GET['delete_user'];
                    $query=query("DELETE FROM users WHERE user_id=".escape_string($del_id)." ");
                    confirm($query);
                    set_message("<h4 class='text-danger'>User deleted successfuly</h4>");
                    redirect('index.php?users');
                  }

                  if(isset($_GET['delete_report'])){
                    $del_id=$_GET['delete_report'];
                    $query=query("DELETE FROM reports WHERE user_id=".escape_string($del_id)." ");
                    confirm($query);
                    set_message("<h4 class='text-danger'>Report deleted successfuly</h4>");
                    redirect('index.php?reports');
                  }

                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "../../resources/templates/back/footer.php" ?>
