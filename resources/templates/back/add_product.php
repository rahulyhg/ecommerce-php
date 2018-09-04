<?php

if(isset($_POST['publish'])){

  $product_title=escape_string($_POST['product_title']);
  $product_desc=escape_string($_POST['product_description']);
  $product_price=escape_string($_POST['product_price']);
  $product_image=$_FILES['file']['name'];
  $product_image_temp=$_FILES['file']['tmp_name'];
  $pc_id=escape_string($_POST['product_category_id']);
  $product_keywords=escape_string($_POST['product_keywords']);
  $product_quantity=escape_string($_POST['product_quantity']);
  $short_desc=escape_string($_POST['short_desc']);

  move_uploaded_file($product_image_temp,"../images/$product_image");

  $insert_query=query("INSERT into products(product_id,product_title,product_category_id,product_price,
   product_description,product_image,short_desc,product_quantity,product_keywords) VALUES('','{$product_title}',
   '{$pc_id}','{$product_price}','{$product_desc}','{$product_image}','{$short_desc}','{$product_quantity}',
    '{$product_keywords}')");

   confirm($insert_query);
   set_message("<h4 class='text-success'>Product Added successfuly</h4>");
   redirect('index.php?products');
  }
 ?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product

</h1>
</div>



<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control">

    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control">
      </textarea>
    </div>

    <div class="form-group">
           <label for="product-sd">Product Short Description</label>
      <textarea name="short_desc" id="" cols="30" rows="2" class="form-control">
      </textarea>
    </div>


    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60">
      </div>
    </div>







</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     <!-- Product Categories-->

    <div class="form-group">


         <label for="product-title">Product Category</label>
        <select name="product_category_id" id="" class="form-control">
          <option value="">Select Category</option>
          <?php
              $cat_query=query("SELECT * FROM categories");
              confirm($cat_query);
              while($rowc=fetch_array($cat_query)){

                $cat_id=$rowc['cat_id'];
                $cat_title=$rowc['cat_title'];


               ?>
               <option value="<?php echo $cat_id;?>"><?php echo $cat_title; ?></option>
             <?php } ?>
        </select>


</div>





    <!-- Product Brands-->


  <!--  <div class="form-group">
      <label for="product-title">Product Brand</label>
         <select name="product_brand" id="" class="form-control">
            <option value="">Select Brand</option>
         </select>
    </div>
-->

<!-- Product Tags -->
    <div class="form-group">
          <label for="product-quantity">Product Quantity</label>
        <input type="text" name="product_quantity" class="form-control">
    </div>

    <div class="form-group">
          <label for="product-title">Product Keywords</label>
        <input type="text" name="product_keywords" class="form-control">
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file" value="">
    </div>



</aside><!--SIDEBAR-->

<div class="form-group">
   <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish Product">
</div>

</form>
