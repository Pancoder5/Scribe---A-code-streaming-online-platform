<?php
include("../conn.php");

$read = "SELECT User, Message, Time1 FROM Code_Stream_Messages";

$result = $conn->query($read);
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
      echo $row['Message'];


    }
}else{
  echo "no code";
}


 ?>
