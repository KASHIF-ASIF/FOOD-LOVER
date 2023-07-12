<?php
include'header.php';
?>
<?php
include'connection.php';
?>
<?php
  if(isset($_POST['deletefood']))
   {
    $dfid=$_POST['delfoodid'];
    
     $query="delete from food where food_id=$dfid;";
     try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Record Not Deletd!');
      </script>";
    }
    } 
  ?>
  <?php
  if(isset($_POST['refillfood']))
   {
    $cfq=$_POST['refillfoodid'];
    $pfq=$_POST['prevfoodquan'];
    $nfq=$_POST['newrefillfood'];
    $tq=$pfq+$nfq;
     $query="update food set food_quantity=$tq where food_id=$cfq;";
     try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Record Not Deletd!');
      </script>";
    }
    unset($_POST['refillfood']);
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

    <title>FOOD</title>
    <style>
      body{
        height: 100vh;
            width: 100vw;
            background-image: url("https://thumbs.dreamstime.com/b/greek-food-background-traditional-different-dishes-top-view-close-up-153149838.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
      }
      table{
        background-color: white;
      }
    </style>
  </head>
  <body>
    <div class="container" style="display: flex; justify-content: center;">
      <h2 style="background-color: whitesmoke;">FOODS!</h2>
  </div>
  <hr>
  <div class="container" style="display: flex; justify-content: center;">
<button type="button" onclick="location.href='newfood.php'" class="btn btn-dark">CREATE A NEW FOOD MENU</button>
</div>
  <hr>
  <div class="container table-responsive">
    <table class="table table-striped center">
      <thead>
        <tr>
          <th scope="col">FOOD ID </th>
          <th scope="col">FOOD NAME</th>
          <th scope="col">FOOD PRICE</th>
          <th scope="col">FOOD DESCRIPTION </th>
          <th scope="col">FOOD QUANTITY </th>
          <th scope="col">FOOD IMAGE</th>
          <th scope="col">CATEGORY ID</th>
          <th scope="col">REFILL</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php
$query="select food_id,food_name,food_price,food_description,food_quantity,food_image,cat_id from food;";
 $fdata=mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($fdata))
  { 
        echo"<tr>
          <th scope='row'>$row[food_id]</th>
          <td>$row[food_name]</td>
          <td>$row[food_price]</td>
          <td>$row[food_description]</td>
          <td>$row[food_quantity]</td>";
          echo"<td><img src='$row[food_image]' class='img-fluid' style='max-width:150px ;max-height:150px ; width: 100%;height:100%;'></td><td>$row[cat_id]</td>
          <td><form method='post'>
          <input type='number' value='$row[food_id]' name='refillfoodid'hidden>
          <input type='number' value='$row[food_quantity]' name='prevfoodquan'hidden>
          <input style='width: 100%;' type='number' min='1' name='newrefillfood'><br><br>
          <button style='width: 100%;' type='submit' name='refillfood' class='btn btn-danger'>Add</button>
        </form></td>
          <td><form method='post'><br>
          <input type='number' value='$row[food_id]' name='delfoodid' hidden>
          <button style='width: 100%;' type='submit' name='deletefood' class='btn btn-danger'>Remove</button>
        </form></td>
        </tr>";
    }
       ?>
      </tbody>
    </table>
  </div>
  <?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['user_type'])){
  echo'<script>
  window.location.href = "index.php";
</script>';
}
else if($_SESSION['user_type']!="Admin" && $_SESSION['user_type']!="Manager"){echo'<script>
  window.location.href = "index.php";
</script>';}
?>
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