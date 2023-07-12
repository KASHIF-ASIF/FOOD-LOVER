<?php
include'header.php';
?>
<?php
include'connection.php';
?>

<?php
  if(isset($_POST['savebtnadone']))
   {
    $al=$_POST['linkofadone'];
    $al=str_replace("'","","$al");
    $al=str_replace('"',"","$al");
    $df=md5(time());
    $adonepic=$_FILES['adimgone']['name'];
    $dst="./FILES/".$df.$adonepic;
     if(move_uploaded_file($_FILES['adimgone']['tmp_name'],$dst)){
     $query="update ad set ad_pic='$dst',ad_link='$al' where  ad_id=1;";
     try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Image Not Uploaded');
      </script>";
    }}
    } 
  ?>
  <?php
  if(isset($_POST['savebtnadtwo']))
   {
    $al=$_POST['linkofadtwo'];
    $al=str_replace("'","","$al");
    $al=str_replace('"',"","$al");
    $df=md5(time());
    $adtwopic=$_FILES['adimgtwo']['name'];
    $dst="./FILES/".$df.$adtwopic;
     if(move_uploaded_file($_FILES['adimgtwo']['tmp_name'],$dst)){
        $query="update ad set ad_pic='$dst',ad_link='$al' where  ad_id=2;";
     try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Image Not Uploaded');
      </script>";
    }}
    } 
  ?>
  <?php
  if(isset($_POST['savebtnadthree']))
   {
    $al=$_POST['linkofadthree'];
    $al=str_replace("'","","$al");
    $al=str_replace('"',"","$al");
    $df=md5(time());
    $adthreepic=$_FILES['adimgthree']['name'];
    $dst="./FILES/".$df.$adthreepic;
     if(move_uploaded_file($_FILES['adimgthree']['tmp_name'],$dst)){
        $query="update ad set ad_pic='$dst',ad_link='$al' where  ad_id=3;";
     try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Image Not Uploaded');
      </script>";
    }}
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

    <title>Ad Manager</title>
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
            <img src="https://i.pinimg.com/originals/da/96/a5/da96a533d3339ad1a65691b11450ee62.png" class="card-img" alt="..." style="height: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">ADVERTISMENT...</h5><hr>
              <div class="card-text"><b style="color: crimson;">Manage</b> Advertisment here...</div>
              <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data"><br><br><label><b>Upload First Advertiment </b>
            </label>
            <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Enter Ad Link : </span>
  <input type="text" class="form-control" name="linkofadone" required aria-label="Username" aria-describedby="basic-addon1">
</div>
                  <input required type="file"accept="image/*" placeholder="Submit Picture..." name="adimgone"style="width: 100%;"><br><br>
                <button type="submit" class="btn btn-primary" name="savebtnadone" style="border-radius: 5%;width: 100%;">Upload</button>
              </form>
              <form action="" method="post" enctype="multipart/form-data"><br><br><label><b>Upload Second Advertiment </b></label>
              <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Enter Ad Link : </span>
  <input type="text" class="form-control" name="linkofadtwo" required  aria-label="Username" aria-describedby="basic-addon1">
</div>
                  <input required type="file"accept="image/*" placeholder="Submit Picture..." name="adimgtwo"style="width: 100%;"><br><br>
                <button type="submit" class="btn btn-primary" name="savebtnadtwo" style="border-radius: 5%;width: 100%;">Upload</button>
              </form>
              <form action="" method="post" enctype="multipart/form-data"><br><br><label><b>Upload Third Advertiment </b></label>
              <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Enter Ad Link : </span>
  <input type="text" class="form-control" name="linkofadthree" required aria-label="Username" aria-describedby="basic-addon1">
</div>
                  <input required type="file"accept="image/*" placeholder="Submit Picture..." name="adimgthree"style="width: 100%;"><br><br>
                <button type="submit" class="btn btn-primary" name="savebtnadthree" style="border-radius: 5%;width: 100%;">Upload</button>
              </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
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