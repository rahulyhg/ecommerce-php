<h1 class="page-header">
  Product Categories
<?php display_message(); ?>
</h1>


<div class="col-md-4">

    <form action="" method="post">

<?php

if(isset($_POST['update'])){

$new_cat_title=escape_string($_POST['new_cat_title']);
$update_query=query("UPDATE categories set cat_title='$new_cat_title' WHERE cat_id='$edit_id' ");
confirm($update_query);
set_message("<h4 class='text-success'>Category updated successfuly</h4>");
redirect('index.php?categories');
}

 ?>
        <div class="form-group">
            <label for="category-title">New Title</label>
            <?php
             $query=query("SELECT * FROM categories WHERE cat_id='$edit_id' ");
             $row=fetch_array($query);
             $cat_title=$row['cat_title'];
             ?>
            <input type="text" class="form-control" name="new_cat_title" value="<?php echo $cat_title;?>">
        </div>

        <div class="form-group">

            <input type="submit" name="update" class="btn btn-primary" value="Update Category">
        </div>


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>Id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>

      <?php

       $query=query("SELECT * FROM categories");
       confirm($query);
       while ($row=fetch_array($query)) {
         $cat_title=$row['cat_title'];
         $cat_id=$row['cat_id'];

       ?>
        <tr>
            <td><?php echo $cat_id; ?></td>
            <td><?php echo $cat_title; ?></td>
            <td><a class="btn btn-primary" href="index.php?edit_category=<?php echo $cat_id;?>">Edit</a></td>
            <td><a class="btn btn-danger" href="index.php?delete_category=<?php echo $cat_id;?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
    </tbody>
<?php } ?>
        </table>

</div>
