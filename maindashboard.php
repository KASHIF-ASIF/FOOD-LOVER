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

    <title>DASHBOARD!</title>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            background-image: url("https://img.freepik.com/premium-photo/flat-lay-arrangement-with-burgers-pizza_23-2148308817.jpg?w=2000");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        </style>
  </head>
  <body>
  <div class="container-fluid"
    style="display: flex; flex-wrap: wrap; row-gap: 3vh;  justify-content:space-between;width: 96%;margin-right: 3vw; margin-left: 5vh;">
    <div class="card" style="width: 18rem;">
      <img style="height: 200px;" src="https://imageio.forbes.com/specials-images/imageserve/668087702/0x0.jpg?format=jpg&width=1200"
        class="card-img-top" alt="Ad Logo">
      <div class="card-body">
        <h5 class="card-title">Manage Advertisment</h5>
        <hr>
        <p class="card-text">Here you can manage all ads, by uploading ad so that they can display on main page.</p>
        <hr><br>
        <a href="admanager.php" class="btn btn-primary" style="width: 100%;">Manage AD</a>
      </div>
    </div>
    <?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(isset($_SESSION['user_type'])){
    if($_SESSION['user_type']=="Admin" )
    {
    echo'<div class="card" style="width: 18rem;">
      <img style="height: 200px;"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABIFBMVEX///9rgJv/zrVPYHQAAADo6OgAvNXTqpYCq8JieZbm6u1BVWvh5Of/0Lbp6+xNXnFRXHD/1btecYkAutRfd5T/y7HkuKHRpY8Ap8BnfJZUZnvx8fFndIVido9abINSY3icnJzyxKzWs6Lw6+re3t7BwcF4eHgTExNdXV3Pz8+IiIilpaVMTEwfGRa4uLhPQDjEnovjy7//28n/7eSaoqzfz8jCx81vfIvX3eSGk6KRoLOCk6q3wc10iKGlsMG4vMLW8fZ31OQ0jKKaqLonJyc7OzsyMjJvb29RUVFfX19BNC5xW1Cjg3QsIx7Hx8eWeWuFbF9fTUMdDQD/49Xm0MW+zs3C3OF8xtOp1NtIuMpuwdCs5e7w/P3a9PdYzN655/AVtPAEAAAKsElEQVR4nO2cfVvbthqH4zjGhJCkgTQhMQ2koaXQF9K1S1kLtFu7rStwKGecdqw9Z9//WxzJL4ktPZJlyyD5unT/1SVg685P0iPJYZWKwWAwGAwGg8FgMBgMBoPBYDAYDIY8eM4OpqW6HTeB82D74ZPdWsTux/1njuo2FYfz+NHTGsCHh/9S3bQicLZ/heyiLPd3VDdQkr1HHL2AR3uqGynBHi++BR/LOiKd9Pwi9lW3NRePhf0QH0o4HMUDDHisusEZ8X7LKFirPVTd5kzsfcgsiCZV1a0Wx3mSww/xRHXDRck0xST4qLrpYuznFqzVflfdeBG2JQRrtW3VzU9nT0qwVtN/CfdB0nDXU22QwjNJQf2HYs46EUfvPaMnL1irqZbg4hRhuK3agkchGWq9Bpep9hFaL2x2ChD8TbUElyIi3FYtwSX7ppDmD9USXBbtvMxtuKtagseiVrgd91NeRdUWPOar7mmn2mxODzKJzU/FdT5ajAxPO1VEs+OeCvud9saRos67iwdhG8fNajVwHJ+dC+idn407zc40/C+d16XhxuKiU41odjq9C/6IPDjrdfxf6IQ/p/OSJjQcV+MgyfH0MzwmLy/caqcTJR6GuK1ag0NgeNqpkiDLZm969vn08uDT+fn5p4PL04upO27O7YKfCgx1PuEPDKdNyhA3v4l8kFGzWY3+Rf5I57P2hg+ATgqoMt8JuqnOZ99+tTinO6kozXIYfs5v2LksheGZRIZnuhvu4Aa6zHGWbtjT3dBfeffyG1Y7TzU39HdP+f2Q4anm1QIbfso/DMOBqLXhLriiyWDY03zVVvlVairFPNV75V35XWoqRXTQCv2Zagse+6lrtjTDC713wJVtmTUbBi9Ntf5mzTO5iQYZjms1rR8gPqidSQ3DKp5qVEtwmUqtaDCdg3+/UG3B4Wq6K5kg2gVf3letwcF1L+WGIV7VnPYnqj2YTPoufIKRxdA9c5+rFmFy1XflqqHP1HVVizC57xZh6Lr6dtN+UYY/qjZhgIah2yvEUNeB+AIbSs80Y9fVdqopxLCKDXWtiNhQbu+E6WlsiMehKyvY7GncSyuFGKJr9K9Um7BA9VC+XLg618OrIsqFxsOwglfe0pPpWOcIg9lUThBNNNrWex+89pYKsen2Ne6jmKu+5EDUXRAVRbmBONa2UMSQEbyr8xnNnB9kFFU3XogXd/ML/qC68WLkNyxHJ5XppndVN12Q/N20JJ00/2xalk5aqfyZN0TVDRcnn+HdP1W3W5x8c01Z5hlMvrmmNPMMJs/zmfLMM5g8IZYqwkol+wajXBHmCbFkEWYfiWWaSAMyhlimWhiRsSaqbm4eMoVYsmkmIMuBzVjXZ6I8vH6GA35tn/rymPSFD4ebPX2fxXBAhoL9tDnW+GkTh4nwE+Gxxk/uefjPS4WO+F2dn4ly8J95iyi65TZMV/R/Sv+nFQCt54Eidyz63y3Bz0Qdrb82C+I4c0URQad0ii1nocjqqU3/myWhoKPz36gDeH6b54o9wHHuFwqWS9EL2zxXRI74z2QXVMeR31ywTIrevM0LRWy5YPFiTNApz/8h2nFgRYiYYHlmm3ibndaPXMWEYFkUk23mKxKC5VBskY1mK/YpwTLMNh7daJYiJKi/4s4e0GhYERbc0/ov1yqzzcYrIERQsX+f6s8I71Vjc6Zag8Xqy3ajbTdmUMNpRViwNWvY6CovV1XLAMxeNRo2og2GSCnCgijCNr5Io/FKsyC9l3bDbxpuHRgioQiPQT/CgHbDfqlR5Tj8KWoYbtsmGGJCkSHoeJvtxYUaPx2qFvPxZq/r9ZEdgxFiTJHRRWMR+ozq9dczxUF6R2+69YFlDeMNY4U4V2QJJiO07aFlDerdN0fKJL0Z0rN8EoYoRFggVGQKOskIsSEGSSpJ8hB1Tisi0TAUIksBK7IFW8kIbXt+fdRdb3lMekfH3YG1gGhZ4y3DASs+Zwk6b5MR2u3YHQbd41vsrd7JoG7FGRCG7BCdyX9Y79ARtgeJu9QHJ7fj6J10k36WdY9oGjvEyZeNrxPBCO32PeI+9e5tOB7VST/LWiMN25sMwcPlZaYiGaHdXqPuVK8f3bDfoUX7WdbIJmm8Bfvp6jJi4y9IsUVFiAoicK+6daNzzvsucE+yWHBG4rLPxhdAkRqF9rxcEHTf35jfyjEUIGKLahsc4vVyCK0IRWhvwberH6/cjOAhw48sh0GII8pw8vdGZLi8ShmO6AhjBZF0vJGeegT3UAsXC6B1VIiTrwtBShGMsE2Ui3hPvYEJhy2IFNe2aMmhxxFcvk4aetRQbre31piCN6HIEwwkh4RkMsTJXwnB5Y3r+FAkI2y3hzy9m1CcpQj6rCWDGMYNvyQFkeLfMcUW8Zt0IQQUCz0FWBERtIiyEQ9xcr1MsvGFFSFcJGjFImfUY7F7Jldv7eEipMp3yvA6drQ6TP4iuVpjcFyc4AmzTiQh6uIiRHSNf4huuvFufnpMTaSMOkhSPylKULSPUsvT4UKwUvlKRliZPwEgJ1JgQQpSWD99nTKthQxskjDE4Crf1pdirP/sv8iqhYJ3fF2M4KFghPT6Owgx3PD8nDBcWqrMFellLbjmBugWs7YRjZCxsIl2dEtLkGGFsZy5zRBXBKcZIAkcYiT4nRBc/x4pwr8odtN6ESPxSMyQ2ueHIUaXeUd00vX/hm9AEQpXjEI2xIK1EEwCTfzRZb6Rhv+Eb8C/JxpiATVRtFTAGS5CJCea9W/B63CEwlW/gIIh2EmZIdrhdZZIw6BcSEZYRDcVnEnhuXQR4ndCcGnpf/7rrAiF7yo/m4pGCNZDTDASyYkGReq/DhyAYATrIaIuK+gJDkMrJURyokGK+GXZCNFAlD1BZR/O0PBCJCeasCBKRyh/ZDPLYMgLkfRDhu+KiNCqy26ERTdOPuB5me1Pp1SEfkGEf7ydIUL5LdRJho+Tega1CJGaaPxywYowyy0HsobCxcKH2iFGIdITDTZkRCi4OwwNZcvFmyx3A8+G/RDpiQYVREaEzHNgmDe3a8gI8Q7th7hTQITyhvx194Dqw3Aqd34BBH+BDakI6ZskkF17869+j1ofMxbgUIiMCOlL8hfhA0lD/pJmje5RcA0HQmRESJ+zATeJ05UTTFm0jejKxQqRWpeKRgjdJGEot2xrpRgCmxx4F0WFyIgQumCKodw3/Ff5hkNgZmeEaCdDXId/CNr4puwVu3Lf1Ew5SdyCVpBCIYpHOGjzj8AlTxRTthbgZ85YgCdCZEUIfGCoT3DbILm54BsO4PIsEKJ4hHgRwS1Zkob8zRNKC5oFGCHGplPWRAqpjFI2U5LbJ/45FOpA4BiBt8KxEBkRgpPmVsq5m+RZFN8QdSBwp5MWYpYI0Y6Mv1KVNORvgEesVqWEmCVC/GlxC6LkFpi/AR6xTm7pB23xEBkRwhPKvTRDyS3we67hkPXBM84zwhDhCBlnF7g7cEv+QO5LYPwtvs2+OydEVoTwhYbst0JDuU1+uiHj7vBW2A+RESFjOuHcoxBD7hbfH22sYyNmiNkiDA63uJ+z3Cafa+ivsVnFihlitgi59yjC8LhbZzNqYEaMdxswG4zXc90D05U7xljhsurDfVOYPLcIkTI0GAwGg8FgMBgMBoPBYDAYDAaDoTT8H5+darupIhTDAAAAAElFTkSuQmCC"
        class="card-img-top" alt="Ad Logo">
      <div class="card-body">
        <h5 class="card-title">Manage User</h5>
        <hr>
        <p class="card-text">Here you can see/manage all users, you can create new admins, managers and can also delete existing user.</p>
        <hr>
        <a href="alluser.php" class="btn btn-primary" style="width: 100%;">Manage User</a>
      </div>
    </div>';}}
    ?>
    <div class="card" style="width: 18rem;">
      <img style="height: 200px;" src="https://www.guidingtech.com/wp-content/uploads/HD-Mouth-Watering-Food-Wallpapers-for-Desktop-12_4d470f76dc99e18ad75087b1b8410ea9.jpg"
        class="card-img-top" alt="Ad Logo">
      <div class="card-body">
        <h5 class="card-title">Manage Food</h5>
        <hr>
        <p class="card-text">Here you can see all menu, and you can able to create new food menu and also able to delete existing one.</p>
        <hr>
        <a href="allfood.php" class="btn btn-primary" style="width: 100%;">Manage Food Menu</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img style="height: 200px;" src="https://previews.123rf.com/images/ionutparvu/ionutparvu1612/ionutparvu161200410/67602131-categories-stamp-sign-text-word-logo-red-.jpg"
        class="card-img-top" alt="Ad Logo">
      <div class="card-body">
        <h5 class="card-title">Manage Category</h5>
        <hr>
        <p class="card-text">Here you can view all category, Moreover you can delete an existing category.</p>
        <hr><br>
        <a href="allcategory.php" class="btn btn-primary" style="width: 100%;">Manage Categories</a>
      </div>
    </div>
    <?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(isset($_SESSION['user_type'])){
    if($_SESSION['user_type']=="Admin" )
    {
    echo'
    <div class="card" style="width: 18rem;">
      <img style="height: 200px;" src="https://www.pngitem.com/pimgs/m/254-2549458_circle-png-download-transparent-revenue-logo-png-download.png"
        class="card-img-top" alt="Ad Logo">
      <div class="card-body">
        <h5 class="card-title">Revenue Generated</h5>
        <hr>
        <p class="card-text">Total Revenue is calculated by RS 10 per order, according to our policies..</p>
        <hr>
        <a  class="btn btn-primary" style="width: 100%;color: white;font-weight: bold;">Total Revenue: Rs
        ';
    }}?>
        <?php
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        if(isset($_SESSION['user_type'])){
        if($_SESSION['user_type']=="Admin" )
        {
          $query="select order_id from order_info where order_status!='Cancel';";
          try {
          $result=mysqli_query($conn,$query);
          $rowcount = mysqli_num_rows( $result );
          echo $rowcount*10; 
          }
          catch(Exception $e) {
           echo" So Much";
         }}}
          ?>
          <?php
          if(session_status() !== PHP_SESSION_ACTIVE) session_start();
          if(isset($_SESSION['user_type'])){
          if($_SESSION['user_type']=="Admin" )
          {
      echo'</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img style="height: 200px;" src="https://thumbs.dreamstime.com/b/online-order-linear-icon-modern-outline-logo-conce-concept-white-background-e-commerce-payment-collection-suitable-133517807.jpg"
        class="card-img-top" alt="Ad Logo">
      <div class="card-body">
        <h5 class="card-title">Total Online Order</h5>
        <hr>
        <p class="card-text">Total numbers of order from Food Lover Website is ';
      
    
          $query="select order_id from order_info;";
          try {
          $result=mysqli_query($conn,$query);
          $rowcount = mysqli_num_rows( $result );
          echo $rowcount; 
          }
          catch(Exception $e) {
           echo" So Many";
         }
          echo'
        </p>
        <hr><br>
        <a href="allorder.php" class="btn btn-primary" style="width: 100%;color: white;font-weight: bold;">View All Order</a>
      </div>
    </div>';
  }}
  ?>
    
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