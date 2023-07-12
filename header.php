<?php
  if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  ?>
<?php
include'connection.php';
?>
<?php
  if(isset($_POST['removecartitems']))
   {
    $rmcartid=$_POST['removecartid'];
    
     $query="delete from cart where food_id=$rmcartid;";
     try {
     $data=mysqli_query($conn,$query);
     header("Refresh:0"); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Record Not Deletd!');
      </script>";
    }
    } 
  ?>
  
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="FILES/TITLE.ico">
    <style>
      </style>
  </head>
  <body >
  <nav class="navbar navbar-expand-lg navbar-dark text-white bg-dark ">
    <a class="navbar-brand" href="index.php">
        <img alt="LOGO" style="height: 10vh; width: 20vw;padding: 0;margin: 0;" src="FILES/LOGO.PNG">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active ">
        <?php
          
          if(isset($_SESSION['user_type'])){
          if($_SESSION['user_type']=="Admin" ||$_SESSION['user_type']=="Manager" )
          {
            echo"<a class='nav-link' href='maindashboard.php'>Home <span class='sr-only'>(current)</span></a>";
          }elseif($_SESSION['user_type']=="Rider")
          {
            echo"<a class='nav-link' href='riderpanel.php'>Home <span class='sr-only'>(current)</span></a>";
          }
          else{
            echo"<a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>";
          }}
          else{
            echo"<a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>";
          }?>
        </li>
        <?php
        if(isset($_SESSION['user_type'])){
        echo'<li class="nav-item active ">
          <a class="nav-link"  href="myorder.php">My Orders</a>
        </li>';}
        ?>
        <li class="nav-item active ">
          <a  class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button" class="btn btn-primary">My Cart <i class="fa-solid fa-cart-shopping"></i></a>
          <!-- ------ -->
         
          <!-- -------- -->
        </li>
          <?php
          if(isset($_SESSION['user_name']))
          {
            echo'<li class="nav-item active  dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            echo$_SESSION["user_name"];
            echo'</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="changepassword.php">Change Info & Password</a>
              <a class="dropdown-item" href="destroy.php">Logout</a>
            </div>
          </li>';
          }
          else{
            echo'<li class="nav-item active "><a class="nav-link"  href="login.php"> Login </a></li>';
          }
          ?>
        <li class="nav-item active">
        <form class="d-flex spbnav " role="search" action="showfoodviasearch.php" method="get">
            <input required class="form-control me-2" type="search" name="getfoodname" placeholder="Search Your Food Here" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form></li>
      </ul>
    </div>
  </nav><hr>
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">MY CART</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- ----------------- -->
        <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Food</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(session_status() !== PHP_SESSION_ACTIVE) session_start();
  if(isset($_SESSION['user_name']))
  {
    $useridforcart=$_SESSION['user_id'];
    $query="SELECT cart.food_id,food.food_image,cart.cart_food_quan,food.food_price,food.food_name from cart,food where cart.food_id=food.food_id and cart.user_id= $useridforcart ;";
    $fdata=mysqli_query($conn,$query);
    $counts=0;
    $totals=0;
     while ($row = mysqli_fetch_assoc($fdata))
     { 
      
      $counts+=1;
      echo'<tr>
      <th scope="row"><img src="';
       echo$row['food_image'];
      echo'" class="img-fluid" style="max-width:75px ;max-height:75px ; width: 100%;height:100%;"></th>
      <td>';
      echo$row['food_name'];
      echo'</td>
      <td>';
      echo$row['food_price'];
      echo'</td>
      <td>';
      echo$row['cart_food_quan'];
      echo'</td>
      <td>';
      echo($row['cart_food_quan'] * $row['food_price']);
      $totals+=($row['cart_food_quan'] * $row['food_price'])*1;
      echo'</td>
      <td><form action="" method="post">
      <input type="number"  value="';
      echo$row['food_id'];
      echo'" hidden name="removecartid"><button style="width: 100%;" type="submit" name="removecartitems" class="btn btn-danger">Remove</button></form></td>
    </tr>';
       }
       if($counts>0)
       {
        echo'<tr><td colspan="6"><form action="checkout.php" method="post"><button style="width: 100%;" type="submit" name="checkoutbuttonofcart" class="btn btn-success">CHECKOUT</button></form></td></tr>';
       }
  }
  else
  {
    echo'<tr><td colspan="6"><center style="color: red;font-weight: bold;">Please Login to Access Cart!!!</center></td></tr>';
  }
    ?>
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>