<?php
include'header.php';
?>
<?php
include'connection.php';
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Food Lover!</title>
  <style>
    body {
      height: 100vh;
      width: 100vw;
      background-image: url("https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    .cardbackground {
      background-image: url("https://background-tiles.com/overview/white/patterns/large/1025.png");
      background-color: whitesmoke;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    .mcard{
    margin-left: 10px;
}
  </style>
</head>
<?php
$query="select * from ad;";
 $fdata=mysqli_query($conn,$query);
 $count=0;
  while ($row = mysqli_fetch_assoc($fdata))
  { 
    $count=$count+1;
    if($count==1){
    $_SESSION['adnumberone']=$row['ad_pic'];
    $_SESSION['adnumberonelink']=$row['ad_link'];}
    if($count==2){
      $_SESSION['adnumbertwo']=$row['ad_pic'];
      $_SESSION['adnumbertwolink']=$row['ad_link'];}
      if($count==3){
        $_SESSION['adnumberthree']=$row['ad_pic'];
        $_SESSION['adnumberthreelink']=$row['ad_link'];}
    }
    $count=0;
?>
<body>
  <center>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-width: 60vw;">
      <div class="carousel-inner">
        <div class="carousel-item active" style="height: 50vh;  overflow: hidden;">
          <a target="_blank" href="<?php echo$_SESSION['adnumberonelink']; ?>"> <img class="d-block w-100"
              src="<?php echo$_SESSION['adnumberone']; ?>"
              style="max-width: 100%; max-height: 100%; min-width: 100%;min-height: 100%;" alt="First slide"></a>
        </div>
        <div class="carousel-item" style="height: 50vh;  overflow: hidden;">
          <a target="_blank" href="<?php echo$_SESSION['adnumbertwolink']; ?>"> <img class="d-block w-100"
              src="<?php echo$_SESSION['adnumbertwo']; ?>"
              style="max-width: 100%; max-height: 100%; min-width: 100%;min-height: 100%;" alt="Second slide"></a>
        </div>
        <div class="carousel-item" style="height: 50vh;  overflow: hidden;">
          <a target="_blank" href="<?php echo$_SESSION['adnumberthreelink']; ?>"> <img class="d-block w-100"
              src="<?php echo$_SESSION['adnumberthree']; ?>"
              style="max-width: 100%; max-height: 100%; min-width: 100%;min-height: 100%;" alt="Third slide"></a>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </center>
  <hr>
  <div class="container cardbackground">
    <center>
      <h2><b><u style="color: red;">EXPLORE FOOD</u></b></h2>
    </center>
    <hr>
    <center>
      <div  style="display: flex; flex-wrap: wrap; row-gap: 3vh;  justify-content:space-between;width: 96%;margin-right: 3vw; margin-left: 5vh;">
        <?php
  $query="SELECT cat_id,cat_name, cat_img FROM category ORDER BY cat_id LIMIT 3;";
  $fdata=mysqli_query($conn,$query);
   while ($row = mysqli_fetch_assoc($fdata))
   {
    $catid=$row['cat_id'];
    $imgsource=$row['cat_img'];
    $categoryname=$row['cat_name'];
     echo'<div class="card" style="width: 18rem; ">';
     echo'<img src="';
     echo$imgsource;
     echo' " height="200vh" width="40vw"
       class="card-img-top" alt="..." >
     <ul class="list-group list-group-flush">
       <li class="list-group-item"></li>
       <li class="list-group-item">
       <form action="showfoodviacategory.php" method="get">
       <input type="text" hidden name="catfoodname" value="';
       echo$categoryname;
       echo'">
          <input type="number" hidden name="catfoodid" value="';
          echo$catid;
          echo'">
            <center><button type="submit" class="btn btn-success" style="width:100%;">';
            echo$categoryname;
            echo'</button></center>
            </form>
       </li>
     </ul></div>';
     }
  ?>

      </div>
      <hr><button type="button" class="btn btn-primary" onclick="location.href='showcategory.php'" style="width: 100%;">View All Category's</button>
      <hr>
  </div>
  <hr>
  <div class="container-fluid">
    <video width="100%" height="100%" controls autoplay loop>
      <source src="FILES/vid.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
  <hr>
  <div class="container cardbackground">
    <center>
      <h2><b><u style="color: red;">Our Menu</u></b></h2>
    </center>
    <hr>
    <center>
      
    <center>
      <div  style="display: flex; flex-wrap: wrap; row-gap: 3vh;  justify-content:space-between;width: 96%;margin-right: 3vw; margin-left: 5vh;">
        <?php
  $query="SELECT food_id,food_name, food_price, food_description, food_quantity, food_image, cat_id FROM food ORDER BY food_id LIMIT 3;";
  $fdata=mysqli_query($conn,$query);
   while ($row = mysqli_fetch_assoc($fdata))
   { 
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
        <input type="number" class="form-control" name="cartqty" value="1" min="1" max="';
        echo$row['food_quantity'];
        echo'" aria-describedby="basic-addon1">
      </div></li><input type="number" name="cartfoodid" value="';
      echo$row['food_id'];
      echo'" hidden>
      <li class="list-group-item"><center><button onclick="reloads()"  type="submit"  name="addtocartbutton" class="btn btn-success"style="width:100%;">Add to Cart</button></form></center></li>
    </ul>
  </div>';
   }
  ?>

      </div>

        <hr><button type="button" class="btn btn-primary" onclick="location.href='showfood.php'" style="width: 90%;">View All Food Item's</button><hr>
      </div>
    </center>
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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>
<?php
include'footer.php';
?>