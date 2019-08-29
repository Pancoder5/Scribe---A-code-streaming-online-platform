<?php
include("../conn.php");
//$getProject = $conn->real_escape_string($_GET['filter']);

$Project = $_SESSION['Projectid'];

echo   $Project;

$sql = "SELECT Line_Code FROM Code_Stream1 WHERE Projectid = '$Project' ORDER BY LineNumber";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
      //echo $row['Line_Code'];
      printf("%s \n", htmlentities($row['Line_Code']));


}

}else{
echo "No code";
}

?>
