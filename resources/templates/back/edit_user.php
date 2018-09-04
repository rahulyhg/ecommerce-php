<?php

$select_query=query("SELECT * FROM users WHERE user_id='$edit_id' ");
confirm($select_query);
$row=fetch_array($select_query);

$user_email=$row['user_email'];
$username=$row['username'];
$user_password=$row['user_password'];

if(isset($_POST['edit_user'])){

$username=escape_string($_POST['username']);
$user_email=escape_string($_POST['user_email']);
$user_password=escape_string($_POST['user_password']);

$update="UPDATE users set username='$username',user_email='$user_email',user_password='$user_password'
         WHERE user_id='$edit_id' ";
$user_update=query($update);
confirm($user_update);
set_message("<h4 class='text-success'>User updated successfuly</h4>");
redirect("index.php?users");
}

 ?>

<form action="" method="post" enctype="multipart/form-data" class="container" style="width:50%;">

<br>
<div class="form-group text-center">
  <label for="username">Username</label>
  <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
</div>

<div class="form-group text-center">
  <label for="email">Email</label>
  <input type="email" name="user_email" class="form-control" value="<?php echo $user_email;?>">
</div>

<div class="form-group text-center">
  <label for="password">Password</label>
  <input type="password" name="user_password" class="form-control" value="<?php echo $user_password;?>">
</div>

<div class="form-group text-center">
  <input type="submit" name="edit_user" class="btn btn-primary" value="Edit User">
</div>

</form>
