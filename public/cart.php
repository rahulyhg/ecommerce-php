<?php require_once("../resources/config.php"); ?>

<?php

if(isset($_GET['add'])){
//  $_SESSION['product_'.$_GET['add']] +=1;
//  redirect('index.php');
$select="SELECT * FROM products WHERE product_id=".escape_string($_GET['add'])."";
$query=query($select);
confirm($query);
while($row=fetch_array($query)){

if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]){
  $_SESSION['product_'.$_GET['add']]+=1;
  redirect('checkout.php');

}else{

  set_message("<h4 class='text-danger'>We only have ".$row['product_quantity']." ".$row['product_title']." available");
  redirect('checkout.php');
  //echo "<script type=text/javaScript>";
  //echo "setTimeout(function(){
    //window.open('checkout.php')
  //}, 5000)";
  //echo "</script>";
}

}
}

if(isset($_GET['remove'])){

    $_SESSION['product_'.$_GET['remove']]--;

    if($_SESSION['product_'.$_GET['remove']]<1){
      $_SESSION['product_'.$_GET['remove']]=0;
      unset($_SESSION['total_price']);
      unset($_SESSION['total_items']);
      redirect('checkout.php');
    }else{
      redirect('checkout.php');
    }

}

if(isset($_GET['delete'])){
    $_SESSION['product_'.$_GET['delete']]=0;
    unset($_SESSION['total_price']);
    unset($_SESSION['total_items']);
     redirect('checkout.php');
}

function cart(){

$total=0;
$items=0;
$item_name=1;
$item_number=1;
$amount=1;
$quantity=1;

foreach ($_SESSION as $name => $value) {

if($value>0){

  if(substr($name,0,8)=='product_'){

    $length=strlen($name);
    $id=substr($name,8,$length);
    $query=query("SELECT * FROM products WHERE product_id=".escape_string($id)." ");
    confirm($query);
    while($row=fetch_array($query)){

    $sub_total=$row['product_price'] * $value;
    $product=<<<DELIMETER

    <tr>
        <td>{$row['product_title']}</td>
        <td>&dollar;{$row['product_price']}</td>
        <td>{$value}</td>
        <td>&dollar;{$sub_total}</td>
        <td>
        <a class='btn btn-success' href='cart.php?add={$row['product_id']}'><span class='glyphicon glyphicon-plus'></span></a>
        <a class='btn btn-warning' href='cart.php?remove={$row['product_id']}'><span class='glyphicon glyphicon-minus'></span></a>
        <a class='btn btn-danger' href='cart.php?delete={$row['product_id']}'><span class='glyphicon glyphicon-remove'></span></a>
        </td>

    </tr>
      <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
      <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
      <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
      <input type="hidden" name="quantity_{$quantity}" value="{$value}">

DELIMETER;

    echo $product;

    $item_name++;
    $item_number++;
    $amount++;
    $quantity++;

    }

 $total+=$sub_total;;
 $items+=$value;

  }

}


}

$_SESSION['total_price']= $total;
$_SESSION['total_items']= $items;

}

function show_paypal(){

if(isset($_SESSION['total_items']) && $_SESSION['total_items']!=0){

 $paypal_button=<<<DELIMETER

 <!-- Saved buttons are identified by their button IDs -->
 <input type="hidden" name="hosted_button_id" value="221">

 <!-- Saved buttons display an appropriate button image. -->
 <input type="image" name="upload"
   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
   alt="PayPal - The safer, easier way to pay online">
 <img alt="" width="1" height="1"
   src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
   <br>
   (If you are within India then after clicking on buy now plz opt
    for payment with card as payment with paypal will not work in
     India)

DELIMETER;

echo $paypal_button;
}

}

function report(){

if(isset($_GET['tx'])){
  $amount=$_GET['amt'];
  $currency=$_GET['cc'];
  $transaction=$_GET['tx'];
  $status=$_GET['st'];

  $send_order=query("INSERT into orders (order_amount,order_transaction,
  order_status,order_currency) VALUES('$amount','$transaction','$status','$currency')");
  $last_order_id=last_id();
  confirm($send_order);

  $total=0;
  $items=0;

foreach ($_SESSION as $name => $value) {

if($value>0){

  if(substr($name,0,8)=='product_'){

    $length=strlen($name);
    $id=substr($name,8,$length);
    $query=query("SELECT * FROM products WHERE product_id=".escape_string($id)." ");
    confirm($query);
    while($row=fetch_array($query)){

    $sub_total=$row['product_price'] * $value;
    $product_price=$row['product_price'];
    $product_title=$row['product_title'];

    $insert_report=query("INSERT into reports(product_id,product_title,product_price,
    product_quantity,order_id) VALUES('{$id}','{$product_title}','{$product_price}','{$value}','{$last_order_id}')");
    confirm($insert_report);

    }

 $total+=$sub_total;;
 $items+=$value;

  }

}

}

}else{

redirect('index.php');


}
}

 ?>
