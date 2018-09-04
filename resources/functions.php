<?php

function last_id(){
global $connection;
return mysqli_insert_id($connection);

}

function redirect($location){
  header("Location:$location");
}

function query($sql){
  global $connection;
  return mysqli_query($connection,$sql);
}

function confirm($result){
  global $connection;
  if(!$result){
    die("QUERY FAILED ".mysqli_error($connection));
  }
}

function escape_string($string){
  global $connection;
  return mysqli_real_escape_string($connection,$string);
}

function fetch_array($query){
  return mysqli_fetch_array($query);
}

/*function get_products(){

  $select="SELECT * FROM products";
  $select_query=query($select);
  confirm($select_query);
  while($row=fetch_array($select_query)){
    $product = <<<DELIMETER
    <div class="col-sm-4 col-lg-4 col-md-4">
           <div class="thumbnail">
               <img src="{$row['product_image']}" alt="">
               <div class="caption" style="height:156px;">
                   <h4 class="pull-right">${$row['product_price']}</h4>
                   <h4><a href="product.html">{$row['product_title']}</a>
                   </h4>
                   <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                     <a href="#" class="btn btn-primary">Buy Now</a>
               </div>
           </div>
    </div>

DELIMETER;
    echo $product;
  }
}
*/

function login_user(){
  if(isset($_POST['submit'])){
    $username=escape_string($_POST['username']);
    $password=escape_string($_POST['password']);

    $select="SELECT * FROM users WHERE username='$username' and user_password='$password' ";
    $query=query($select);
    confirm($query);
    if(mysqli_num_rows($query)==0){
      echo "<h4 class='text-danger'>Plz enter correct username and password</h4>";
    }else{
      $_SESSION['username']=$username;
      redirect('admin');
    }
  }
}

function send_message(){
  if(isset($_POST['submit'])){
    $to="vivekrautela000@gmail.com";
    $name=escape_string($_POST['name']);
    $email=escape_string($_POST['email']);
    $subject=escape_string($_POST['subject']);
    $message=escape_string($_POST['message']);

    $headers="From:".$name." ".$email." ";
    $sent=mail($to,$subject,$message,$headers);
    if(!$sent){
      echo "<h4 class='text-danger'>Error:Message not sent</h4>";
    }else{
      echo "<h4 class='text-success'>Message sent successfuly</h4>";
    }
  }
}

function set_message($message){
  if(!empty($message)){
    $_SESSION['message']=$message;
  }else{
    $message='';
  }
}

function display_message(){
  if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}
 ?>
