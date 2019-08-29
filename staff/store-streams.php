<?php
session_start();
  include("../conn.php");


  if (!isset($_SESSION['staffID'])){
    header("Location: ../index.php");
    exit();
  }

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

           <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->



    <style>



    #nav-mobile{
      width: 250px;
    }

    #icon_prefix2{
      width:150px;
    }
    #message-boxes{
      height: 20px;
    }

    #message-row{
      height: 20px;
    }
    #imagequb{
      height:25px;
      float: left;
    }
    #slide-out{
      width:205px;
    }

    .card{
      width: 300px;
      height:300px;
    }

</style>

</head>

<script>
$(document).ready(function(){
 $('.sidenav').sidenav();
});

     </script>

    <script>

  //AJAX form which takes the data below to the insertSavedLecture.php page
    $.ajax({

      Name = 'Lecture_Name';
      Description = 'Lecture_Description';
      Date1 = 'Lecture_Date';
      ProjectID = 'Projectid';

      url: "insertSavedLecture.php",
      method: "POST",

      data: {Title: Name, Desc : Description, Time:Date1, Pro: ProjectID},
      dataType: 'text',
      success: function(data){

         console.log(data);
      }
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
       <img src="../images/rosetta_stone.jpg" id="RS">
     </div>
     <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
   </div></li>
   <li><a class="subheader">Subheader</a></li>
   <li><a class="waves-effect" href="menu.php?successfullogin">Main Menu</a></li>
   <li><a class="waves-effect" href="student-login.php">Student Login</a></li>
   <li><a class="waves-effect" href="#!">Staff Login</a></li>
   <li><a class="waves-effect" href="#!">Forgotten Password</a></li>
   <li><a class="waves-effect" href="logout.php">Logout</a></li>

 </ul>
 <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

     <div class="row">
          <!-- Login field-->
            <h2>Save Your Lesson</h2>

            <form  id="lecture-form" method="POST">
        <!--  <form action="../includes/insertSavedLecture.php" method="post">  -->
              <input type="text" name='Lecture_Name' id='Lecture_Name' placeholder="Name of Lecture">
              <input type="text" name='Lecture_Description' id='Lecture_Description' placeholder="Description">
              <input type="date" name='Lecture_Date' id='Lecture_Date' placeholder="Date">
            <!--  <input type="hidden" name='Projectid' id='Projectid' placeholder="Date" value=""> -->
                <button class="btn waves-effect waves-light" formaction="../includes/insertSavedLecture.php" type="submit" name="Lecture_Submit">Publish></button>

              </form>
              <script>
 //echo $_SESSION['Projectid'];?>
  </script>

</div>
</div>

</body>
</html>
