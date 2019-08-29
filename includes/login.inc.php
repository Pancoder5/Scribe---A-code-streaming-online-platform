<?php

if(isset($_POST['login-submit'])){

  include("../conn.php");

  $Username = $conn->real_escape_string($_POST['postuser']);

  $Password = $conn->real_escape_string($_POST['postpass']);

  if(empty($Username) || empty($Password)){
    header("Location: ../student-login.php?error=emptyfields");
    exit();
  }
  else{
    $SQL = "SELECT * FROM CodeStream_StudentPass WHERE Username =?";
    $PreSt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($PreSt, $SQL)){
      header("Location: ../student-login.php?error=sql");
      //exit method to prevent further script running if they made the above mistake
      exit();
  }
    else{
      mysqli_stmt_bind_param($PreSt, "s", $Username);
      mysqli_stmt_execute($PreSt);
      $result = mysqli_stmt_get_result($PreSt);
      if($row = mysqli_fetch_assoc($result)){

      $PasswordCheck = password_verify($Password, $row['Password']);
      if($PasswordCheck == false){
        header("Location: ../student-login.php?error=wrongpassword");
        exit();
      }
      else if($PasswordCheck == true){
        session_start();
        $_SESSION['userID'] = $row['id'];
        $_SESSION['userName'] = $row['Username'];
        //session variables created. Can be used to prevent non-logged in users accessing certain pages
        header("Location: ../user/menu.php?successfullogin");
        exit();
      }

      }
      else{
        header("Location: ../student-login.php?error=nousername");
        exit();

      }
    }
  }
}
else{
  header("Location: ../index.php?error=nousername");
  exit();
}

?>
