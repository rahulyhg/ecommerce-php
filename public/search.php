<?php
 require_once("../resources/config.php");

 $search = $_POST['search'];
 if(!empty($search)){

   $query="SELECT * from products WHERE product_title LIKE '%$search%' ";
   $search_query=mysqli_query($connection,$query);
   if(!$search_query){
     die('Query failed'.mysqli_error($connection));
   }
   $count =mysqli_num_rows($search_query);
   if($count<1){
     echo "<a class='btn btn-danger'>Sorry no products available</a>";
   }
   while($row=mysqli_fetch_array($search_query)){
     $product_title=$row['product_title'];
     $product_id=$row['product_id'];
     echo "<ul>";
     echo "<li style='color:white' class='list-unstyled'>";
     ?>
     <a style="color:white;" href="item.php?id=<?php echo $product_id; ?>" class="btn btn-primary">
     <?php
     echo  $product_title;
     echo "</a>";
     echo "</li>";
     echo "</ul>";
   }

 }

 ?>
