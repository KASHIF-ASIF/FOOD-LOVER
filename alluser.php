<?php
include'connection.php';
?>
<?php
include'header.php';
?>
<?php
  if(isset($_POST['deleteuser']))
   {
    $duserid=$_POST['deluserid'];
    
     $query="delete from user where user_id=$duserid;";
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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>USER'S</title>
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
        max-width:100vw;
      }
    </style>
  </head>
  <body>
    <div class="container" style="display: flex; justify-content: center;">
      <h2 style="background-color: whitesmoke;">USER!</h2>
  </div>
  <hr>
  <div class="container" style="display: flex; justify-content: center;">
<button type="button" onclick="location.href='signup.php'" class="btn btn-dark">CREATE A NEW USER</button>
</div>
  <hr>
  <div class="container table-responsive" style="max-width: 100vw;">
    <table class="table table-striped center">
      <thead>
        <tr>
          <th scope="col">USER ID </th>
          <th scope="col">USER NAME</th>
          <th scope="col">USER PHONE</th>
          <th scope="col">USER ADDRESS </th>
          <th scope="col">USER EMAIL</th>
          <th scope="col">USER TYPE</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php
$query="select user_id,user_Name,user_Phone,user_Address,user_Email,user_Type from user;";
 $fdata=mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($fdata))
  { 
        echo"<tr>
          <th scope='row'>$row[user_id]</th>
          <td>$row[user_Name]</td>
          <td>$row[user_Phone]</td>
          <td>$row[user_Address]</td>
          <td>$row[user_Email]</td>
          <td>$row[user_Type]</td>
          <td><form method='post'>
          <input type='number' value='$row[user_id]' name='deluserid' hidden>
          <button style='width: 100%;' type='submit' name='deleteuser' class='btn btn-danger'>Remove</button>
        </form></td>
        </tr>";
    }
       ?>
      </tbody>
    </table>
  </div></div>
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