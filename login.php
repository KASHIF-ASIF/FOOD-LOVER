<?php
  if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<?php
include'connection.php';
?>
<?php
  if(isset($_POST['savebtn']))
   {
     $ue=strtolower($_POST['email']);
     $ue=str_replace("'","","$ue");
    $ue=str_replace('"',"","$ue");
     $up=md5( $_POST['pass']);
     $query="select User_id,User_Name,User_Password,User_Phone,User_Address,User_Email,User_Type from user where User_Email='$ue'";
     $data=mysqli_query($conn,$query); 
     $check_email="kashif@gmail.com";
     $check_password="strong";
     while ($row = mysqli_fetch_assoc($data))
      {
          $check_email = $row['User_Email'];
          $check_password = $row['User_Password'];
          $check_id = $row['User_id'];
          $check_name = $row['User_Name'];
          $check_phone = $row['User_Phone'];
          $check_address = $row['User_Address'];
          $check_type = $row['User_Type'];
      }
      if ($ue == $check_email && $up == $check_password) {
        
    if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
        $_SESSION['user_id']=$check_id;
        $_SESSION['user_name']=$check_name;
        $_SESSION['user_phone']=$check_phone;
        $_SESSION['user_address']=$check_address;
        $_SESSION['user_email']=$check_email;
        $_SESSION['user_type']=$check_type;
        header("Location: index.php");
      } else {
          $message = "Incorrect Email Or Password!!!";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
        } 
  ?>
<?php
include'header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
    <style>
      body{
        height: 100vh;
            width: 100vw;
            background-image: url("https://wallpaperforu.com/wp-content/uploads/2020/10/food-wallpaper-20100313220613.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
      }
    </style>
  </head>
  <body>
    <div class="fl" style="display: flex; justify-content: center; align-items: center;">
      <div class="card mb-3" style="">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="https://c4.wallpaperflare.com/wallpaper/237/148/1014/burger-4k-top-rated-wallpaper-preview.jpg" class="card-img" alt="..." style="height: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">LOGIN...</h5><hr>
              <div class="card-text"><b style="color: crimson;">LOGIN</b> to your account to manage all the services and explore our tools</div>
              <div class="card-body">
                <form action="" method="post">
                <input type="email" onkeypress="return RestrictCommaSemicolon(event);" ondrop="return false;" onpaste="return false;" name="email" placeholder="Enter Your Email..." style="width: 100%;"><br><br>
                <input type="password" onkeypress="return RestrictCommaSemicolon(event);" ondrop="return false;" onpaste="return false;" name="pass"id="myInput" placeholder="Enter Your Password..."style="width: 100%;"><br>
                <input id="mycheck" type="checkbox" onclick="myFunction()"> <b style="cursor: context-menu;" onclick="checker()">Show Password</b>
                <br><br>
                <button type="submit" class="btn btn-primary" style="border-radius: 5%;width: 100%;" name="savebtn">Login</button>
              </form> 
              </div>
              <div class="card-text" style="text-align: center;">
                <a href="signup.php">Create An Account???</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <script>
  function checker(){
      document.getElementById("mycheck").click();
    }
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
  <script>
      function RestrictCommaSemicolon(e) {
        var theEvent = e || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[^,'";]+$/;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) {
                theEvent.preventDefault();
            }
        }
    }
    </script>
  <?php
if(isset($_SESSION['user_type'])){
  echo'<script>
  window.location.href = "index.php";
</script>';
}
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