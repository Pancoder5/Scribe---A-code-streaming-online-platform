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



         </head>

         <script>
         //side nav insantiation
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
        <li><a class="waves-effect" href="staff-login.php">Staff Login</a></li>
        <li><a class="waves-effect" href="#!">Forgotten Password</a></li>
        </ul>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>


          <?php
          $selector = $_GET["selector"];
          $validator = $_GET["validator"];

          if(empty($selector) || empty($validator)){
            echo "Could not vlidate the request";
          }else{
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){


              echo  "<form action='includes/Reset-Password.inc.php' method='post'>
                 <input name='selector' id='select' type='hidden' class='validate' value=<?php echo $selector ?>'>;
                  <input name='validator' id='validatore' type='hidden' class='validate' value='<?php echo $validator ?>'>;
                     <input placeholder='Enter your new Password' name='password1' id='pass1' type='password'>
                     <input placeholder='Re-enter new Password' name='password2' id='pass2' type='password'>
                      <button class='btn waves-effect waves-light' type='submit' name='reenter-submit'>Reset Password></button>
                </form>";


            }
          }

          ?>
</body>
</html>
