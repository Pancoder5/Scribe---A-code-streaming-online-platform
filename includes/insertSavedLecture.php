<?php
session_start();

include("../conn.php");

if(isset($_POST['Lecture_Submit'])){


$Title = $conn->real_escape_string($_POST['Lecture_Name']);
$Description = $conn->real_escape_string($_POST['Lecture_Description']);
$Date = $conn->real_escape_string($_POST['Lecture_Date']);
//$Projectid = $conn->real_escape_string($_POST['Projectid']);


if(empty($Title)){
  header("Location: ../staff/store-streams.php?error=emptytitle");
  //exit method to prevent further script running if they made the above mistake
  exit();

} else if(empty($Description)){
    header("Location: ../staff/store-streams.php?error=emptydescription");
    //exit method to prevent further script running if they made the above mistake
    exit();


}    else if(empty($Date)){
       header("Location: ../staff/store-streams.php?error=emptydate");
       //exit method to prevent further script running if they made the above mistake
       exit();

     }  else{
          $database = "INSERT INTO Code_Stream_SavedLectures (Lecture_Name, Lecture_Description, Date1) VALUES (?, ?, ?)";
            $PreSt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($PreSt, $database)){
              header("Location: ../staff/store-streams.php?error=sqlprob2");
              exit();
            }

            else{

              mysqli_stmt_bind_param($PreSt, "sss", $Title, $Description, $Date);
              mysqli_stmt_execute($PreSt);
              header("Location: ../staff/textedit2.php");
              exit();

            }
      }



      mysqli_stmt_close($PreSt);
      mysqli_close($conn);


    }  else{
      header("Location: ../staff/store-streams.php");
      exit();

      }

      ?>





 
