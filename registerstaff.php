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
         //sidenav insantiation
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

        <div class="row">
             <!-- Login field-->
               <h2>Register Staff</h2>

             <form action="includes/registerstaff.inc.php" method="post">
                  <input placeholder="Email" name='useremailst' id="email" type="text" class="validate" required>
                    <input placeholder="Lecturer" name='userpostst' id="user_name" type="text" class="validate" required>
                    <input placeholder="Username" name='userNamest' id="email" type="text" class="validate" required>
                      <input placeholder="Password" name='userpass1st' id="first_name1" type="password" class="validate" required>
                      <input placeholder="Confirm Password" name='userpass2st' id="first_name2" type="password" class="validate" required>


                   <button class="btn waves-effect waves-light" type="submit" name="registerst-submit">Register></button>
                 </form>
