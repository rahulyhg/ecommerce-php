
<div class="row">
<?php display_message(); ?>
<h1 class="page-header">
   All Products

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Category</th>
           <th>Price</th>
           <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
   <?php

   $query=query("SELECT * FROM products");
   confirm($query);
   while($row=fetch_array($query)){

    $product_id=$row['product_id'];
    $product_cat_id=$row['product_category_id'];
    $product_title=$row['product_title'];
    $product_price=$row['product_price'];
    $product_quantity=$row['product_quantity'];
    $product_image=$row['product_image'];
    $cat_select=query("SELECT cat_title FROM categories WHERE cat_id='{$product_cat_id}' ");
    $rowc=fetch_array($cat_select);
    $cat_title=$rowc['cat_title'];

    ?>
      <tr>
            <td><?php echo $product_id; ?></td>
            <td><?php echo $product_title; ?><br>
              <img src="../images/<?php echo $product_image?>" alt="" style="width:150px;height:100px;">
            </td>
            <td><?php echo $cat_title; ?></td>
            <td><?php echo $product_price; ?></td>
            <td><?php echo $product_quantity; ?></td>
            <td><a class="btn btn-primary" href="index.php?edit_product=<?php echo $product_id;?>">Edit</a></td>
            <td><a class="btn btn-danger" href="index.php?delete_product=<?php echo $product_id;?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>


<?php } ?>
  </tbody>
</table>















             </div>



    </div>
