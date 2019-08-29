<?php

  //$linenumber = $_POST['lineN'];

  $host = "sgrant22.lampt.eeecs.qub.ac.uk";
  $user = "sgrant22";
  $pw = "yNXHylXTQCMkYDj6";
  $db = "sgrant22";
$conn = new mysqli($host, $user, $pw, $db);


$sql = "SELECT Line_Code FROM Code_Stream1";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
      //echo $row['Line_Code'];
      printf("%s \n", htmlentities($row['Line_Code']));

    }
}else{
  echo "Oh shit boii no code";
}
?>
