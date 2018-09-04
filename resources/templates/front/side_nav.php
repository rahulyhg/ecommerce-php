<div class="col-md-3">
    <p class="lead">Awesome Rautela Shop</p>
    <div class="list-group">
      <?php
        $select="SELECT * FROM categories";
        $query=query($select);
        confirm($query);
        while($row=fetch_array($query)){
          $cat_id=$row['cat_id'];
          $cat_title=$row['cat_title'];

       ?>
        <a href="category.php?id=<?php echo $cat_id;?>" class="list-group-item">
          <?php
           echo $cat_title;
         ?>
       </a>
     <?php } ?>
    </div>
</div>
