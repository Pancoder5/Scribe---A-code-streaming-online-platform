<?php
session_start();
  include("../conn.php");
  //getting the filter value from line 115 of saved-lectures.php
$getProject = $conn->real_escape_string($_GET['filter']);

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


    <style>
    #textcode{
	     	list-style:none ;
	}


    #textEditor{
      height:300px;
      padding: 0px 20px 0px 20px;
      position: relative;
      top: 120px;
      left:70px;
      right: 70px;
      width:90%;
      line-height: 20px;
      resize: none;
    /*  white-space: nowrap;
      scroll-behavior: auto; */
      line-height: normal;
      padding-top: 5px;
      padding-bottom: 0px;
      background: url(http://i.imgur.com/2cOaJ.png);
      background-attachment: local;
      background-repeat: no-repeat;
      padding-left: 35px;
      padding-top: 10px;
      border-color:#ccc;
      overflow: scroll;

    }



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
    #message-box{
      float: left;
    }

    #slide-out{
      width:205px;
    }

    .statement {
    color: orange;
}

    </style>
</head>

<script>
$(document).ready(function(){
 $('.sidenav').sidenav();
});

     </script>

     <script>


   </script>

    <body>
      <div class="container">
        <nav>
      <div class="nav-wrapper" id="nav-wrapper">
      <a href="index.php" class="brand-logo" id="Scribe">Scribe</a>
      </nav>
      <div class="form-group">
         <input type="hidden" name="Streamid" id="Streamid" />
         <div id="autoStream"></div>

         <ul id="slide-out" class="sidenav">
       <li><div class="user-view">
         <div class="background">
           <img src="images/rosetta_stone.jpg" id="RS">
         </div>
         <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
       </div></li>
       <li><a class="subheader">Subheader</a></li>
       <li><a class="waves-effect" href="student-login.php">Student Login</a></li>
       <li><a class="waves-effect" href="#!">Staff Login</a></li>
       <li><a class="waves-effect" href="#!">Forgotten Password</a></li>
       <li><a class="waves-effect" href="logout.php">Logout</a></li>

     </ul>
     <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>


        </div>
            <div class="form-group">
              <!-- php code is wtieen within the textarea HTML in order]
              to display that code within the textarea-->
                <textarea name="textEditor" id="textEditor" rows="6" class="form-control" readonly> <?php
                $getProject = $conn->real_escape_string($_GET['filter']);

                 $sql = "SELECT Line_Code FROM Code_Stream1 WHERE Projectid = '$getProject' ORDER BY LineNumber";
                 $result = mysqli_query($conn, $sql);
                 if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){

                       printf("%s \n", htmlentities($row['Line_Code']));
                       //htmlentities to prevent code being rendered
               }

               }else{
               echo "No code";
               }
               ?></textarea>


            </script>        

                </div>

                </div>
           </div>





</body>
</html>
