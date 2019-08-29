
<?php
session_start();

if (!isset($_SESSION['staffID'])){
	header("Location: ../index.php");
	exit();
}

include("../conn.php");

$read = "SELECT * FROM Code_Stream_SavedLectures;";

$result = $conn->query($read);

if(!$result) {
  echo $conn->error;
}


				$linec = $_POST['lineT'];
        $linenumber = $_POST['lineN'];
			//	$Projectid =  $_SESSION['Projectid'];
			  while($row = $result->fetch_assoc() ){

					$Projectid = $row['Projectid'];

        }

        $_SESSION['Projectid'] = $Projectid;




		$delete = "DELETE FROM Code_Stream1 WHERE LineNumber='$linenumber' AND Projectid = '$Projectid' ";

		$resultinsert = $conn->query($delete);

		echo $delete;


    ?>
