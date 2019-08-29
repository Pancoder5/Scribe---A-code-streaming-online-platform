<?php

include("../conn.php");

if(isset($_POST["reenter-submit"])){

  $selector = $conn->real_escape_string($_POST["selector"]);
  $validator = $conn->real_escape_string($_POST["validator"]);
  $password = $conn->real_escape_string($_POST["password1"]);
  $password_repeat = $conn->real_escape_string($_POST["password2"]);

  if(empty($password) || empty($password_repeat)){
    header("Location: ../create-new-password.php?newpwd=empty");
    exit();
  }else if ($password != $password_repeat){
    header("Location: ../create-new-password.php?passwordsnotsame");
    exit();
  }

  $currentdate = date("U");

  include("../conn.php");

  $sql = "SELECT * FROM CodeStream_PassReset WHERE PassResetSelector =? AND PassResetExpire >=?";
  $PreSt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($PreSt, $sql)){
    echo "Oops something went wrong";
    exit();
  } else{
    mysqli_stmt_bind_param($PreSt, "ss", $selector, $currentdate);
    mysqli_stmt_execute($PreSt);

    $result = mysqli_stmt_get_result($PreSt);
    if(!$row = mysqli_fetch_assoc($result)){
      echo "Something went wrong. Resubmit your password reset request";
      exit();
    }else{
      $tokenbin = hex2bin($validator);
      $tokencheck = password_verify($tokenbin, $row["PassResetToken"]);

      if($tokencheck === false){
        echo "tokencheck problem";
        exit();
      } else if($tokencheck === true){

        $tokenemail = $row['PassResetEmail'];

        $sql = "SELECT * FROM CodeStream_StudentPass WHERE Email=?";
        $PreSt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($PreSt, $sql)){
          echo "Oops something went wrong";
          exit();
        } else{
          mysqli_stmt_bind_param($PreSt, "s", $tokenemail);
          mysqli_stmt_execute($PreSt);
          $result = mysqli_stmt_get_result($PreSt);
          if(!$row = mysqli_fetch_assoc($result)){
            echo "Something went wrong";
            exit();
          }else{

            $sql = "UPDATE CodeStream_StudentPass SET Password=? WHERE Email=?";
            $PreSt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($PreSt, $sql)){
              echo "Oops something went wrong";
              exit();
            } else{

              $newPasswordHash = password_hash($password, PASSWORD_DEFAULT);

              mysqli_stmt_bind_param($PreSt, "ss", $newPasswordHash, $tokenemail);
              mysqli_stmt_execute($PreSt);


              $sql = "DELETE FROM CodeStream_PassReset WHERE PassResetEmail = ?";
              $PreSt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($PreSt, $sql)){
                echo "Oops something went wrong";
                exit();
              } else{
                mysqli_stmt_bind_param($PreSt, "s", $tokenemail);
                mysqli_stmt_execute($PreSt);
                header("Location: ../student-login.php?newpwd=updated");
              }

            }

          }
    }



    }


  }

  }

} else{
  header("Location: ../index.php");
}



 ?>
