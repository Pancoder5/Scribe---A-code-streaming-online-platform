<?php

if(isset($_POST['login-submitst'])){

  include("../conn.php");

  $Username = $conn->real_escape_string($_POST['staffuser']);

  $Password = $conn->real_escape_string($_POST['staffpass']);

  if(empty($Username) || empty($Password)){
    header("Location: ../stafflogin.php?error=emptyfields");
    //exit method to prevent further script running if they made the above mistake
    exit();
  }
  else{
    $SQL = "SELECT * FROM CodeStream_Staff WHERE Username =?";
    $PreSt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($PreSt, $SQL)){
      header("Location: ../stafflogin.php?error=sql");
      exit();
  }
    else{
      mysqli_stmt_bind_param($PreSt, "s", $Username);
      mysqli_stmt_execute($PreSt);
      $result = mysqli_stmt_get_result($PreSt);
      if($row = mysqli_fetch_assoc($result)){

      $PasswordCheck = password_verify($Password, $row['Password']);
      if($PasswordCheck == false){
        header("Location: ../stafflogin.php?error=wrongpassword");
        exit();
      }
      else if($PasswordCheck == true){
        session_start();
        $_SESSION['staffID'] = $row['id'];
        $_SESSION['staffName'] = $row['Username'];
        //session variables created. Can be used to protect against non-logged in staff memebers accessing certain pages
        header("Location: ../staff/menu.php?successfullogin");
        exit();
      }

      }
      else{
        header("Location: ../stafflogin.php?error=nousername");
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
