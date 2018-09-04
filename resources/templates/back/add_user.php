<?php

if(isset($_POST['create_user'])){

$username=escape_string($_POST['username']);
$user_email=escape_string($_POST['user_email']);
$user_password=escape_string($_POST['user_password']);


$insert="INSERT into users(user_id,username,user_email,user_password)
VALUES ('','$username','$user_email','$user_password')";

$user_insert=query($insert);
confirm($user_insert);
set_message("<h4 class='text-success'>User added successfuly</h4>");
redirect("index.php?users");
}

 ?>

<form action="" method="post" enctype="multipart/form-data" class="container" style="width:50%;">

<br>
<div class="form-group text-center">
  <label for="username">Username</label>
  <input type="text" name="username" class="form-control" >
</div>

<div class="form-group text-center">
  <label for="email">Email</label>
  <input type="email" name="user_email" class="form-control" >
</div>

<div class="form-group text-center">
  <label for="password">Password</label>
  <input type="password" name="user_password" class="form-control" >
</div>

<div class="form-group text-center">
  <input type="submit" name="create_user" class="btn btn-primary" value="Add User">
</div>

</form>
