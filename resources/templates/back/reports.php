<div class="col-md-12">
  <?php display_message(); ?>
<div class="row">
<h1 class="page-header">
   Information About The Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Id</th>
           <th>Product Id</th>
           <th>Product Title</th>
           <th>Product Price</th>
           <th>Product Quantity</th>
           <th>Order Id</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $select="SELECT * FROM reports";
      $query=query($select);
      confirm($query);
      while($row=fetch_array($query)){

      $report_id=$row['report_id'];
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_price=$row['product_price'];
      $product_quantity=$row['product_quantity'];
      $order_id=$row['order_id'];


       ?>
        <tr>
            <td><?php echo $report_id; ?></td>
            <td><?php echo $product_id; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><?php echo $product_price; ?></td>
            <td><?php echo $product_quantity; ?></td>
            <td><?php echo $order_id; ?></td>
            <td><a class="btn btn-danger" href="index.php?delete_report=<?php echo $report_id;?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

<?php } ?>
    </tbody>
</table>

</div>
