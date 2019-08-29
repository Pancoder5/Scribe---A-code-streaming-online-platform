<?php
  include("../conn.php");

if(isset($_POST['Staff-message-send'])){


  $message = $conn->real_escape_string($_POST['staffmessage']);

  $User = "Staff";

  $Time = date('Y-m-d H:i:s');

  if(empty($message)){
    header("Location: ../staff/textedit2.php?error=emptymessage");
    //exit method to prevent further script running if they made the above mistake
    exit();


//maybe put in the function to prevent insertion of certain characters

        }else{
              $database = "INSERT INTO Code_Stream_Messages (Projectid, User, Message, Time1) VALUES ('1',?, ?, ?)";
                $PreSt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($PreSt, $database)){
                  header("Location: ../staff/textedit2.php?error=sqlprob2");
                  exit();
                }

                else{

                  mysqli_stmt_bind_param($PreSt, "sss", $User, $message, $Time);
                  mysqli_stmt_execute($PreSt);
                  header("Location: ../staff/textedit2.php?success=message-sent");
                  exit();

                }
          }



          mysqli_stmt_close($PreSt);
          mysqli_close($conn);


        }  else{
          header("Location: ../staff/textedit2.php");
          exit();

          }

          ?>
