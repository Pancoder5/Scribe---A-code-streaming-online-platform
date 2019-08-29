<?php
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>Scribe</title>


      <!-- Compiled and minified CSS -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

          <!-- Compiled and minified JavaScript -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

           <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



          <style>

          #col1{
            padding: 20px 20px 20px 0px;
          }

          #nav-wrapper{
            position: relative;
          }
          #t1{
            position: relative;
          }
          #t2{
            position: relative;
          }
          #t3{
            position: relative;
          }
          #Scribe{
            position: relative;
            float: none;
          }
          #RS{
            height: 1000px;
            widht: 500px;
          }

          </style>
        </head>

        <script>
        $(document).ready(function(){
         $('.sidenav').sidenav();
       });
             </script>


    <body>
      <div class="container">
        <nav>
    <div class="nav-wrapper" id="nav-wrapper">
      <a href="index.php" class="brand-logo" id="Scribe">Scribe</a>
    </nav>

      <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="images/rosetta_stone.jpg" id="RS">
      </div>
      <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
    </div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="student-login.php">Student Login</a></li>
    <li><a class="waves-effect" href="stafflogin.php">Staff Login</a></li>
    <li><a class="waves-effect" href="#!">Forgotten Password</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

  <?php
if(isset($_SESSION['id'])){
  echo "<p>You are Logged In</p>";
}else{
  echo "<p>You are not logged in</p>";
}


   ?>

    <h4>Welcome to Scribe</h4>
    <p>Scribe allows a user to stream in realtime to an unlimited number of devices for teaching purposes</p>

</body>
</html>
