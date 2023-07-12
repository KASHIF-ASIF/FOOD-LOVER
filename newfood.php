<?php
include'header.php';
?>
<?php
include'connection.php';
?>

<?php
  if(isset($_POST['savebtnofnewfood']))
   {
    $foodn=$_POST['foodname'];
    $foodn=str_replace("'","","$foodn");
    $foodn=str_replace('"',"","$foodn");
    $foodp=$_POST['foodprice'];
    $foodd=$_POST['fooddes'];
    $foodd=str_replace("'","","$foodd");
    $foodd=str_replace('"',"","$foodd");
    $foodq=$_POST['foodquan'];
    $foodcid=$_POST['foodcatid'];
    $df=md5(time());
    $foodpic=$_FILES['foodimg']['name'];
    $dst="./FILES/".$df.$foodpic;
     if(move_uploaded_file($_FILES['foodimg']['tmp_name'],$dst)){
    $query="insert into food(food_name,food_price,food_description,food_quantity,food_image,cat_id) values ('$foodn','$foodp','$foodd','$foodq','$dst','$foodcid');";
     try {
     $data=mysqli_query($conn,$query); 
     }
     catch(Exception $e) {
      echo"<script type='text/javascript'>
      alert('Image Not Uploaded');
      </script>";
    }
       
   }
    echo'<script>
            window.location.href = "allfood.php";
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

    <title>New Food</title>
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
            <img src="https://img.freepik.com/premium-vector/food-lover-logo-design-template-inspiration_340145-142.jpg?w=2000" class="card-img" alt="..." style="height: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">FOOD...</h5><hr>
              <div class="card-text"><b style="color: crimson;">Create</b> New Food Menu here...</div>
              <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                  <input  required type="text" placeholder="Enter Food Name..." name="foodname"style="width: 100%;"><br><br>
                  <input  required type="number"  min="1" placeholder="Enter Food Price..." name="foodprice"style="width: 100%;"><br><br>
                  <input  required type="text" placeholder="Enter Food Description..." name="fooddes"style="width: 100%;"><br><br>   <input  required type="number" min="1" placeholder="Enter Food Quantity..." name="foodquan"style="width: 100%;"><br><br><select class="form-select" aria-label="Default select example" required name="foodcatid" style="width: 100%;">
  <option selected>Select Category</option>
                  <?php
                  $query="select cat_id,cat_name from category;";
                  $fdata=mysqli_query($conn,$query);
                   while ($row = mysqli_fetch_assoc($fdata))
                   { 
                         echo"<option value='$row[cat_id]'>$row[cat_name]</option>";
                   }
                  ?>
                  </select>
                  <br><br><label><b>Upload Food Image</b></label>
                  <input required type="file"accept="image/*" placeholder="Submit Picture..." name="foodimg"style="width: 100%;"><br><br>
                <button type="submit" class="btn btn-primary" name="savebtnofnewfood" style="border-radius: 5%;width: 100%;">Add in Food Menu</button>
              </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include'footer.php';
?>