<?php
session_start();

include("../conn.php");

  $read = "SELECT * FROM Code_Stream1";

  $result = $conn->query($read);

  if(!$result) {
    echo $conn->error;
  }

// selecting where projectid has its greatest array_count_values
//this will be either the most recent lecture or the current include_once
//if a lecture is under way its project id will be max(Projectid)
$sql = "SELECT Line_Code FROM Code_Stream1 WHERE Projectid = (SELECT max(Projectid) FROM Code_Stream1) ORDER BY LineNumber ASC";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){

      printf("%s \n", htmlentities($row['Line_Code']));
      //htmlentities to stop code being rendered


}
} else {
  echo "No lectures are underway, you can refer to the main menu for previously streamed lectures";
}

?>
