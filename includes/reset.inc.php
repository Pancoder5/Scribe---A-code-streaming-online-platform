<?php
include("../conn.php");

if(isset($_POST["reset-submit"])){
  //if(isset($_POST["reenter-submit"])){

$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

$url = "sgrant22.lampt.eeecs.qub.ac.uk/Scribe/create-new-password.php?selector=" . $selector . "&validator=" .bin2hex($token);

$expires = date("U") + 900;



$userEmail = $conn->real_escape_string($_POST["postemail"]);

$sql = "DELETE FROM CodeStream_PassReset WHERE PassResetEmail = ?";

$PreSt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($PreSt, $sql)){
  echo "Oops something went wrong";
  exit();
} else{
  mysqli_stmt_bind_param($PreSt, "s", $userEmail);
  mysqli_stmt_execute($PreSt);
}

  $sql = "INSERT INTO CodeStream_PassReset (PassResetEmail, PassResetSelector, PassResetToken, PassResetExpire) VALUES (?, ?, ?, ?) ";
  $PreSt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($PreSt, $sql)){
    echo "Oops something went wrong";
    exit();
  } else{

    $hashedToken = password_hash($token, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($PreSt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($PreSt);
  }

  mysqli_stmt_close($PreSt);
  mysqli_close();

  $recipient = $userEmail;
  $subject = "Reset your password for Scribe";

  $message = 'We recieved a request for a rest password for this email address. If this was not you, contact your school administrator
              Otherwise, follow the link to reset your password';
  $message .= 'ere is your password reset link: ';
  $message .= '<a href="' . $url . '">' .$url . '</a></p>';

  $headers = "From: Scribe <sgrant22@qub.ac.uk>\r\n ";
  $headers .= "Reply-To: sgrant22@qub.ac.uk\r\n";
  $headers .= "Content_type: text/html\r\n ";

  mail($recipient, $subject, $message, $headers);

  header("Location: ../forgotpass.php?reset=success");

} else {
  header("Location: ../index.php");
}



 ?>
