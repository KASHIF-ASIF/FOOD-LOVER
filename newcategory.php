<?php
include'header.php';
?>
<?php
include'connection.php';
?>

<?php
  if(isset($_POST['savebtnofnewcat']))
   {
    $catn=$_POST['catname'];
    $catn=str_replace("'","","$catn");
    $catn=str_replace('"',"","$catn");
    $df=md5(time());
    $catpic=$_FILES['catimg']['name'];
    $dst="./FILES/".$df.$catpic;
     if(move_uploaded_file($_FILES['catimg']['tmp_name'],$dst)){
     $query="insert into category(cat_name,cat_img) values ('$catn','$dst');";
     try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Image Not Uploaded');
      </script>";
    }}
    echo'<script>
            window.location.href = "allcategory.php";
          </script>';
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

    <title>New Category</title>
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
            <img src="https://images-platform.99static.com/HUa8xGbVgcEmleyeD6GABK1JEAo=/500x500/top/smart/99designs-contests-attachments/32/32875/attachment_32875211" class="card-img" alt="..." style="height: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">CATEGORY...</h5><hr>
              <div class="card-text"><b style="color: crimson;">Create</b> New Category here...</div>
              <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                  <input  required type="text" placeholder="Enter Category Name..." name="catname"style="width: 100%;"><br><br><label><b>Upload Category Image</b></label>
                  <input required type="file"accept="image/*" placeholder="Submit Picture..." name="catimg"style="width: 100%;"><br><br>
                <button type="submit" class="btn btn-primary" name="savebtnofnewcat" style="border-radius: 5%;width: 100%;">Create</button>
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