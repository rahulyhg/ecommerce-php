<div class="col-md-12">
  <?php display_message(); ?>
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Id</th>
           <th>Amount</th>
           <th>Transaction number</th>
           <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $select="SELECT * FROM orders";
      $query=query($select);
      confirm($query);
      while($row=fetch_array($query)){

      $order_id=$row['order_id'];
      $order_amount=$row['order_amount'];
      $order_trans=$row['order_transaction'];
      $order_status=$row['order_status'];



       ?>
        <tr>
            <td><?php echo $order_id; ?></td>
            <td><?php echo $order_amount; ?></td>
            <td><?php echo $order_trans; ?></td>
            <td><?php echo $order_status; ?></td>
            <td><a class="btn btn-danger" href="index.php?delete_order=<?php echo $order_id;?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

<?php } ?>
    </tbody>
</table>

</div>
