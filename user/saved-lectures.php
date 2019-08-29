<?php
session_start();

if (!isset($_SESSION['userID'])){
  header("Location: ../index.php");
  exit();
}

  include("../conn.php");

//retrieving all saved lectures
$read = "SELECT * FROM Code_Stream_SavedLectures";

$result = $conn->query($read);

if(!$result) {
  echo $conn->error;
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

        <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->



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

    .card {
 display: inline-block;
 width: 300px;
 height:300px;
}





    </style>

</head>

<body>

       <div class="container">
         <nav>
     <div class="nav-wrapper" id="nav-wrapper">
       <a href="index.php" class="brand-logo" id="Scribe">Scribe</a>
     </nav>


      <?php
//echoing all saved lectures
//lectures presented in 'cards'- refer to materialize
      while($row = $result->fetch_assoc() ){

      $Title = $row['Lecture_Name'];
      $Description = $row['Lecture_Description'];
      $Date = $row['Date1'];
      $Projectid = $row['Projectid'];

    echo  "<div class='card'>
    <div class='card-image waves-effect waves-block waves-light'>
      <img class='activator' src='../images/codingImage.jpg'>
    </div>
    <div class='card-content'>
      <span class='card-title activator grey-text text-darken-4'>$Title<i class='material-icons right'>more_vert</i></span>
      <p><a href='view-lectures.php?filter=$Projectid'>View this Lecture</a></p>
    </div>
    <div class='card-reveal'>
      <span class='card-title grey-text text-darken-4'>$Title<i class='material-icons right'>close</i></span>
      <p>$Description</p>
      <p>Date:
      $Date</p>

    </div>
  </div>";

}

       ?>

</body>
</html>
