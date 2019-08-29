<?php
session_start();
  include("../conn.php");



    //$User = $_SESSION['userName'];

if(isset($_POST['Student-message-send'])){

  //$read = "SELECT max(Projectid) FROM Code_Stream1";

//  $result = $conn->query($read);

//  if(!$result) {
  //  echo $conn->error;
//  }

//  while($row = $result->fetch_assoc() ){

  //  $ProjectID = $row['Projectid'];
//}

  $message = $conn->real_escape_string($_POST['studentmessage']);

  $User = $conn->real_escape_string($_SESSION['userName']);

  $Time = date('Y-m-d H:i:s');

  if(empty($message)){
    header("Location: ../user/studentindex.php?error=emptymessage");
    //exit method to prevent further script running if they made the above mistake
    exit();


//maybe put in the function to prevent insertion of certain characters

        }else{
              $database = "INSERT INTO Code_Stream_Messages (User, Message, Time1) VALUES (?, ?, ?)";
                $PreSt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($PreSt, $database)){
                  header("Location: ../user/studentindex.php?error=sqlprob2");
                  exit();
                }

                else{

                  mysqli_stmt_bind_param($PreSt, "sss", $User, $message, $Time);
                  mysqli_stmt_execute($PreSt);
                  header("Location: ../user/studentindex.php?success=message-sent");
                  exit();

                }
          }



          mysqli_stmt_close($PreSt);
          mysqli_close($conn);


        }  else{
          header("Location: ../user/studentindex.php");
          exit();

          }

          ?>
