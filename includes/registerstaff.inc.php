<?php

if(isset($_POST['registerst-submit'])){

  include("../conn.php");


$Lecturer = $conn->real_escape_string($_POST['userpostst']);

$Password = $conn->real_escape_string($_POST['userpass1st']);

$Email = $conn->real_escape_string($_POST['useremailst']);

$confirmPass = $conn->real_escape_string($_POST['userpass2st']);

$Username = $conn->real_escape_string($_POST['userNamest']);

if(empty($Lecturer) || empty($Password) || empty($confirmPass) || empty($Email) || empty($Username)){
  header("Location: ../registerstaff.php?error=fieldsempty");
  //exit method to prevent further script running if they made the above mistake
  exit();

}  else if (!filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $Username)){
  //validating email format and keeping special characters out of username
    header("Location: ../registerstaff.php?error=invalidusernameandemail");
    exit();

}  else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../registerstaff.php?error=invalidemail");
    exit();

  }  else if (!preg_match("/^[a-zA-Z0-9]*$/", $Username)){
      header("Location: ../registerstaff.php?error=invalidusername");
      exit();

    } else if($Password!==$confirmPass){
      header("Location: ../registerstaff.php?error=passwordsdontmatch");
      exit();
    }
    else{
      $database = "SELECT Username FROM CodeStream_Staff WHERE Username = ? ";
      //checking to see if username already exists
      $PreSt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($PreSt, $database)){
        header("Location: ../registerstaff.php?error=sqlprob");
        exit();
      }
      else{
        mysqli_stmt_bind_param($PreSt, "s", $Username);
        mysqli_stmt_execute($PreSt);
        mysqli_stmt_store_result($PreSt);
        $resultCheck = mysqli_stmt_num_rows($PreSt);
        if($resultCheck>0){
          header("Location: ../registerstaff.php?error=usernametaken");
          exit();
        }
        else{
            $database = "INSERT INTO CodeStream_Staff (Lecturer, Email, Username, Password) VALUES (?, ?, ?, ?)";
              $PreSt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($PreSt, $database)){
                header("Location: ../registerstaff.php?error=sqlprob2");
                exit();
              }
              else{

                $HashedPass = password_hash($Password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($PreSt, "ssss", $Lecturer, $Email, $Username, $HashedPass);
                mysqli_stmt_execute($PreSt);
                header("Location: ../registerstaff.php?success=signedup");
                exit();

              }
      }
    }

  }
  mysqli_stmt_close($PreSt);
  mysqli_close($conn);

}
else{
  header("Location: ../registerstaff.php");
  exit();

}
