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

    <title>All Order</title>
    <style>
      body{
        height: 100vh!important;
            width: 100vw;
            background-image: url("https://thumbs.dreamstime.com/b/italian-food-background-different-types-pasta-health-vegetarian-concept-top-view-copy-space-italian-food-114155664.jpg");
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
      <h2 style="background-color: whitesmoke;">ORDER!</h2>
  </div>
  <hr>
  <div class="container table-responsive">
    <table class="table table-striped center">
      <thead>
        <tr>
          <th scope="col">ORDER ID </th>
          <th scope="col">ORDER ITEM</th>
          <th scope="col">TOTAL PRICE</th>
          <th scope="col">USER ID </th>
          <th scope="col">ORDER TIME </th>
          <th scope="col">ORDER STATUS</th>
        </tr>
      </thead>
      <tbody>
        <?php
$query="select order_id,order_des,order_total,user_id,order_time,order_status from order_info order by order_id;";
 $fdata=mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($fdata))
  { 
        echo"<tr>
          <th scope='row'>$row[order_id]</th>
          <td>$row[order_des]</td>
          <td>$row[order_total]</td>
          <td>$row[user_id]</td>
          <td>$row[order_time]</td>
          <td>$row[order_status]</td></tr>";
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