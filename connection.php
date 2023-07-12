<?php
 $servername='localhost';
  $username='id20115803_kashif';
   $password='(=MKASHIF(046)ASiF)';
    $db='id20115803_food_lover';
     $conn=mysqli_connect($servername,$username,$password,$db);
      if(!$conn){ 
        die("Sorry we failed to connect: ".mysqli_connect_error());
         }
?>