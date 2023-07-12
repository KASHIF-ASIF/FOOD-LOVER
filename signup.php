<?php
include'header.php';
?>
<?php
include'connection.php';
?>
<?php
  if(isset($_POST['savebtn']))
   {
    $un=$_POST['firstname'];
    $un=str_replace("'","","$un");
    $un=str_replace('"',"","$un");
    $upno=$_POST['phone'];
    $ua=$_POST['address'];
    $ua=str_replace("'","","$ua");
    $ua=str_replace('"',"","$ua");
    $ut=$_POST['type'];
     $ue=strtolower($_POST['email']);
     $up=md5( $_POST['pass']);
     $query="insert into user(User_Name,User_Phone,User_Address,User_Email,User_Password,User_Type) values ('$un','$upno','$ua','$ue','$up','$ut');";
     try {
     $data=mysqli_query($conn,$query); 
     echo"<script type='text/javascript'>
      alert('ACCOUNT CREATED!');
      </script>";
      echo'<script>
            window.location.href = "login.php";
          </script>';
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Email Already Taken!');
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

    <title>Signup</title>
    <style>
      body{
        height: 100vh;
            width: 100vw;
            background-image: url("https://t3.ftcdn.net/jpg/03/55/60/70/360_F_355607062_zYMS8jaz4SfoykpWz5oViRVKL32IabTP.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
      }
    </style>
  </head>
  <body>
    <div class="fl" style="display: flex; justify-content: center; align-items: center;overflow:hidden;">
      <div class="card mb-3" style="">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="https://t3.ftcdn.net/jpg/04/87/16/34/360_F_487163480_u4q13pQTIIbcVbolPiHKZFFlkfVrnVP3.jpg" class="card-img" alt="..." style="height: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">SIGNUP...</h5><hr>
              <div class="card-text"><b style="color: crimson;">Create</b> account here...</div>
              <div class="card-body">
              <form action="" method="post">
                  <input required type="text"  minlength="3" placeholder="Enter Name..." name="firstname"style="width: 100%;"><br><br>
                  <input required type="number" minlength="11" maxlength="11" placeholder="Enter Phone Number..." name="phone"style="width: 100%;"><br><br>
                  <input required type="text" minlength="1" placeholder="Enter Complete Address..." name="address"style="width: 100%;"><br><br>
<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='Admin')
{ echo'
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">User Type</label>
  </div>
  <select name="type" class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="Admin">Admin</option>
    <option value="Manager">Manager</option>
    <option value="Customer">Customer</option>
    <option value="Rider">Rider</option>
  </select>
</div>';
}
else{
  echo'<select name="type" class="custom-select" id="inputGroupSelect01" hidden>
  <option value="Customer" selected>Customer</option>
</select>';
}
?>
                <input required type="email" onkeypress="return RestrictCommaSemicolon(event);" ondrop="return false;" onpaste="return false;" name="email" placeholder="Enter Email Address..." style="width: 100%;"><br><br>
                <input required type="password" onkeypress="return RestrictCommaSemicolon(event);" ondrop="return false;" onpaste="return false;" minlength="8" name="pass"id="myInput" placeholder="Enter Password..."style="width: 100%;"><br>
                <input type="checkbox" id="mycheck" onclick="myFunction()"> <b style="cursor: context-menu;" onclick="checker()">Show Password</b>
                <br><br>
                <button type="submit" class="btn btn-primary" name="savebtn" style="border-radius: 5%;width: 100%;">Create</button>
              </form> 
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