<?php
include'connection.php';
?>
<?php
if(isset($_POST['checkoutbuttonofcart']))
{
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    $uid=$_SESSION['user_id'];
    $allitems='';
    $cartcal=0;
    $query="SELECT cart.cart_id,cart.user_id,cart.food_id,cart.cart_food_quan,food.food_quantity,food.food_id,food.food_name,food.food_price from cart,food where user_id=$uid and cart.food_id=food.food_id;";
    $fdata=mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($fdata))
    { 
        if($row['food_quantity']>=$row['cart_food_quan'])
        {
            $deductfoodid=$row['food_id'];
            $deductfoodnum=$row['food_quantity']-$row['cart_food_quan'];
            $query="update food set food_quantity=$deductfoodnum where food_id=$deductfoodid ;";
           try {
            $data=mysqli_query($conn,$query); 
            }
            catch(Exception $e) {
             echo"<script type='text/javascript'>
             alert('Issue in cart');
             </script>";
           }  

            $allitems .=$row['food_name'] ;
            $allitems .='(';
            $allitems .=$row['cart_food_quan'];
            $allitems .=')';
           $allitems .='<br>';
           $cartcal+=$row['food_price']*$row['cart_food_quan'];
           $fid=$row['food_id'];
           $query="delete from cart where food_id=$fid and user_id= $uid;";
           try {
            $data=mysqli_query($conn,$query); 
            }
            catch(Exception $e) {
             echo"<script type='text/javascript'>
             alert('Issue in cart');
             </script>";
           }        }
    }
if($allitems!=''){
 $cartnames=$allitems;
 $carttotalrs=$cartcal;
 date_default_timezone_set("Asia/Karachi");
 $ctime=date('m/d/Y h:i:s a', time());
 $carttotalrs+=10;
  $query="insert into order_info(order_des,order_total,User_id,order_status,order_time) values ('$cartnames','$carttotalrs','$uid','Ordered','$ctime');";
  try {
  $data=mysqli_query($conn,$query); 
  }
  catch(Exception $e) {
   echo"<script type='text/javascript'>
   alert('Image Not Uploaded');
   </script>";
 }}

 echo'<script>
   window.location.href = "index.php";
 </script>';
}
?>