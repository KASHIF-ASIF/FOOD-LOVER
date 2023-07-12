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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>All Categories!</title>
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
        <h2><b><u style="color: red; ">ALL CATEGORY OF FOOD'S</u></b></h2>
      </center>
      <hr>
      <center>
        <div  style="display: flex; flex-wrap: wrap; row-gap: 3vh;  justify-content:space-between;width: 96%;margin-right: 3vw; margin-left: 5vh">
          <?php
    $query="SELECT cat_id,cat_name, cat_img FROM category ORDER BY cat_id;";
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
        <hr>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include'footer.php';
?>