<?php require_once("../resources/config.php"); ?>

<?php include "../resources/templates/front/header.php" ?>
    <!-- Navigation -->
<?php include "../resources/templates/front/navbar.php" ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

<?php include "../resources/templates/front/side_nav.php" ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">

<?php include "../resources/templates/front/slider.php" ?>

                    </div>

                </div>

                <div class="row">

                  <?php

//PAGINATION

                  $select="SELECT * FROM products";
                  $select_query=query($select);
                  confirm($select_query);

                  $rows=mysqli_num_rows($select_query);

                  if(isset($_GET['page'])){
                      $page=preg_replace('#[^0-9]#','',$_GET['page']);
                  }else{
                    $page=1;
                  }

                  $per_page=4;
                  //last_page means total pages
                  $last_page=ceil($rows/$per_page);
                  if($page<1){
                    $page=1;
                  }else if($page>$last_page){
                    $page=$last_page;
                  }

                  $middleNumbers='';
                  $add1=$page+1;
                  $add2=$page+2;
                  $sub1=$page-1;
                  $sub2=$page-2;

                  if($page==1){
                    $middleNumbers.='<li class="page-item active"><a>'.$page.'</a></li>';
                    $middleNumbers.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                    ?page='.$add1.'">'.$add1.'</a></li>';

                  }else if($page==$last_page){
                    $middleNumbers.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                    ?page='.$sub1.'">'.$sub1.'</a></li>';
                    $middleNumbers.='<li class="page-item active"><a>'.$page.'</a></li>';

                  }else if($page>2 && $page<$last_page-1){
                    $middleNumbers.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                    ?page='.$sub2.'">'.$sub2.'</a></li>';
                    $middleNumbers.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                    ?page='.$sub1.'">'.$sub1.'</a></li>';
                    $middleNumbers.='<li class="page-item active"><a>'.$page.'</a></li>';
                    $middleNumbers.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                    ?page='.$add1.'">'.$add1.'</a></li>';
                    $middleNumbers.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                    ?page='.$add2.'">'.$add2.'</a></li>';

                  }else if($page>1 && $page<$last_page){
                    $middleNumbers.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                    ?page='.$sub1.'">'.$sub1.'</a></li>';
                    $middleNumbers.='<li class="page-item active"><a>'.$page.'</a></li>';
                    $middleNumbers.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                    ?page='.$add1.'">'.$add1.'</a></li>';

                  }

//END PAGINATION

                  $select="SELECT * FROM products LIMIT ".($page-1)*$per_page.",".$per_page."";
                  $select_query=query($select);
                  confirm($select_query);

                  while($row=fetch_array($select_query)){
                    $product_id=$row['product_id'];
                    $product_price=$row['product_price'];
                    $product_title=$row['product_title'];
                    $short_desc=$row['short_desc'];
                    $product_description=$row['product_description'];
                    $product_image=$row['product_image'];
                   ?>
                 <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id=<?php echo $product_id;?>"><img style="width:320px;height:150px;" src="images/<?php echo $product_image;?>" alt=""></a>
                            <div class="caption" style="height:140px;">
                                <h4 class="pull-right">$<?php echo $product_price; ?></h4>
                                <h4><a href="item.php?id=<?php echo $product_id;?>"><?php echo $product_title; ?></a>
                                </h4>
                                <p><?php echo $short_desc; ?></p>
                                    <a href="cart.php?add=<?php echo $product_id;?>" class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>
                    </div>

                 <?php } ?>
                </div>

               <div class="text-center">
                 <ul class="pagination">
                   <?php
                    if($page!=1){
                      echo '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                      ?page='.($page-1).'">Prev</a></li>';
                    }
                    echo $middleNumbers;
                    if($page!=$last_page){
                      echo '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'
                      ?page='.($page+1).'">Next</a></li>';
                    }
                    ?>
                 </ul>
                 <?php if($last_page!=1){
                   echo "<h4 class='alert alert-success'>Page ".$page." of ".$last_page." Pages<span class='close' data-dismiss='alert'>x</span></h4>";
                 } ?>
               </div>


            </div>

        </div>

    </div>
    <!-- /.container -->
  

<?php include "../resources/templates/front/footer.php"; ?>
