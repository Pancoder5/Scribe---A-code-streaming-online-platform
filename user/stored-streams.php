<?php
  include("../conn.php");

session_start();
if (!isset($_SESSION['userID'])){
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


           <body>
             <div class="container">
               <nav>
             <div class="nav-wrapper" id="nav-wrapper">
             <a href="index.php" class="brand-logo" id="Scribe">Scribe</a>
             </nav>
