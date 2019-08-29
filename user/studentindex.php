<?php
  include("../conn.php");

session_start();
if (!isset($_SESSION['userName'])){
  header("Location: ../index.php");
  exit();
}

//selecting certain information from the message table
$read = "SELECT User, Message, Time1 FROM Code_Stream_Messages";

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
      <div class="form-group">
         <input type="hidden" name="Streamid" id="Streamid" />
         <div id="autoStream"></div>


         <!-- form that sends message input to includes/studentmessage-->
      <ul id="slide-out" class="sidenav sidenav-fixed">
      <li><div class="user-view">
      <form action="../includes/studentmessage.inc.php" method="post">
       <input type="text" name='studentmessage' placeholder="Message">
         <button class="btn waves-effect waves-light" type="submit" name="Student-message-send">Send></button>
      </form>
      </div></li>
            <?php
            //echoes messages within sidenav
              while($row = $result->fetch_assoc() ){

                $Message = $row['Message'] ;
                $User = $row['User'];
                $Time = $row['Time1'];

              echo  "<div class='col s1 m8 offset-m2 2 offset-5' id='message-box'>
              <div class='card-panel grey lighten-5 z-depth-1'>
                <div class='row right-align'>
                  <div class='col 1'>
                    <img src='../images/qublogo.jpg' alt='' class='circle responsive-img' id='imagequb'>
                  </div>
                  <div class='col s12'>
                    <span class='black-text' class style='font-weight:600;'>
                      $Message
                   </span>
                    <p>$User</p>
                      <p>$Time</p>
                 </div>
                </div>
              </div>
            </div>";


                    }

                  ?>

          </ul>
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">chat</i></a>
        </div>
            <div class="form-group">
                <textarea name="textEditor" id="textEditor" rows="6" class="form-control" readonly contenteditable="true"></textarea>



                </div>

                </div>
           </div>

 <div id="code">

   <script>



   $(function(){

     passLine();

     });

     function passLine(){

    $("#textEditor").focus();

     $.ajax({

       url: "load-code2.php",
       method: "POST",
       data: {},
       dataType: 'text',
       success: function(data){

          console.log(data);
       }
     });
   }


   function StringSearch() {
     var SearchTerm = document.getElementById("text_box_1").value;
     var TextSearch = document.getElementById("text_area_3").value;

  if (SearchTerm.length > 0 && TextSearch.indexOf(SearchTerm) > -1) {
    alert("String Found. Search Complete");
  } else {
    alert("No Data found in Text Area");
  }
}





   </script>

</div>

<script>

setInterval(function(){

    
	$("#textEditor").load("load-code2.php");
}, 500);


$.ajax({
    type: "GET",
    url: "load-messages.php",
    success: function(data) {
        $('.slide-out').html(data);
    }
});

  </script>

</body>
</html>
