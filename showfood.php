<?php
include'header.php';
?>
<?php
include'connection.php';
?>
<?php
  if(isset($_POST['addtocartbutton']))
   {
    $cartitemqty=$_POST['cartqty'];
    $cartfoodid=$_POST['cartfoodid'];
    $cartuserid=$_SESSION['user_id'];
     $query="insert into cart(user_id,food_id,cart_food_quan) values ('$cartuserid','$cartfoodid','$cartitemqty');";
     try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Not able to Add Item to Cart');
      </script>";
    }}
  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>All Foods!</title>
    <style>
      body{
        height: 100vh;
            width: 100vw;
            background-image: url("https://i.pinimg.com/originals/60/f4/53/60f453bd1fe7d061e8fe4d766d830134.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
      }
    </style>
  </head>
  <body>
  <div class="container cardbackground" style="background-color: whitesmoke;">
    <center>
      <h2><b><u style="color: red;">Our Menu</u></b></h2>
    </center>
    <hr>
    <center>
      <div  style="display: flex; flex-wrap: wrap; row-gap: 3vh;  justify-content:space-between;width: 96%;margin-right: 3vw; margin-left: 5vh;">
        <?php
  $query="SELECT food_id,food_name, food_price, food_description, food_quantity, food_image, cat_id FROM food ORDER BY food_id;";
  $fdata=mysqli_query($conn,$query);
   while ($row = mysqli_fetch_assoc($fdata))
   { 
    if($row['food_quantity']>0){
    echo'<div class="card" style="width: 18rem;">
    <img src="';
    echo$row['food_image'];
    echo'" height="200vh" width="40vw" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">';
      echo$row['food_name'];
      echo'</h5>
      <p class="card-text">';
      echo$row['food_description'];
      echo'</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"></li>
      <li class="list-group-item">Price -> RS : ';
      echo$row['food_price'];
      echo'</li><form action="insert.php" method="post">
      <li class="list-group-item"><div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Enter Quantity</span>
        <input type="number" name="cartqty" class="form-control" value="1" min="1" max="';
        echo$row['food_quantity'];
        echo'" aria-describedby="basic-addon1">
      </div></li><input type="number" name="cartfoodid" value="';
      echo$row['food_id'];
      echo'" hidden>
      <li class="list-group-item"><center><button onclick="reloads()" type="submit" name="addtocartbutton" class="btn btn-success"style="width:100%;">Add to Cart</button></form></center></li>
    </ul>
  </div>';
   }}
  ?>

      </div>  <!-- -------- -->

      </div><br>
    </center>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
    function reloads(){
      var delayInMilliseconds = 1000;
setTimeout(function() {
  location.reload();
}, delayInMilliseconds);
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include'footer.php';
?>