<?php
include'connection.php';
?>
<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(isset($_SESSION['user_name']))
  {
  if(isset($_POST['addtocartbutton']))
   {
    $cartitemqty=$_POST['cartqty'];
    $cartfoodid=$_POST['cartfoodid'];
    $cartuserid=$_SESSION['user_id'];
    $temp=0;
    $query="select cart_food_quan from cart where user_id=$cartuserid and food_id=$cartfoodid;";
 $fdata=mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($fdata))
  { 
    $temp=$row['cart_food_quan'];
  }
  if($temp<1){
     $query="insert into cart(user_id,food_id,cart_food_quan) values ('$cartuserid','$cartfoodid','$cartitemqty');";
    }
    else{
      $temp+=$cartitemqty;
      $query="update cart set cart_food_quan=$temp where user_id=$cartuserid and food_id=$cartfoodid;";
    }
    try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Not able to Add Item to Cart');
      </script>";
    }}  }
    header("location:javascript://history.go(-1)");

  ?> 