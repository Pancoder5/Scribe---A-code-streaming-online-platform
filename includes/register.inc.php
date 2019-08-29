<?php

if(isset($_POST['register-submit'])){

  include("../conn.php");


$Username = $conn->real_escape_string($_POST['userpost']);

$Password = $conn->real_escape_string($_POST['userpass1']);

$Email = $conn->real_escape_string($_POST['useremail']);

$confirmPass = $conn->real_escape_string($_POST['userpass2']);

if(empty($Username) || empty($Password) || empty($confirmPass) || empty($Email)){
  header("Location: ../register.php?error=fieldsempty");
  //exit method to prevent further script running if they made the above mistake
  exit();

}  else if (!filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $Username)){
  //ensure email is in valid format
    header("Location: ../register.php?error=invalidusernameandemail");
    exit();

}  else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../register.php?error=invalidemail");
    exit();

  }  else if (!preg_match("/^[a-zA-Z0-9]*$/", $Username)){
      header("Location: ../register.php?error=invalidusername");
      exit();

    } else if($Password!==$confirmPass){
      //checking to see if passwords match
      header("Location: ../register.php?error=passwordsdontmatch");
      exit();
    }
    else{
      $database = "SELECT Username FROM CodeStream_StudentPass WHERE Username = ? ";
      $PreSt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($PreSt, $database)){
        header("Location: ../register.php?error=sqlprob");
        exit();
      }
      else{
        mysqli_stmt_bind_param($PreSt, "s", $Username);
        mysqli_stmt_execute($PreSt);
        mysqli_stmt_store_result($PreSt);
        $resultCheck = mysqli_stmt_num_rows($PreSt);
        if($resultCheck>0){
          header("Location: ../register.php?error=usernametaken");
          exit();
        }
        else{
            $database = "INSERT INTO CodeStream_StudentPass (Username, Password, Email) VALUES (?, ?, ?)";
              $PreSt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($PreSt, $database)){
                header("Location: ../register.php?error=sqlprob");
                exit();
              }
              else{

                $HashedPass = password_hash($Password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($PreSt, "sss", $Username, $HashedPass, $Email);
                mysqli_stmt_execute($PreSt);
                header("Location: ../register.php?success=signedup");
                exit();

              }
      }
    }

  }
  mysqli_stmt_close($PreSt);
  mysqli_close($conn);

}
else{
  header("Location: ../register.php");
  exit();

}
