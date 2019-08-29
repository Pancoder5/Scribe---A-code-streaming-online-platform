
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
        //create a seesion variable from the projectid from the saved lecture table
        //which was created on naming the Code_Stream_SavedLectures
        //this gives a projectid value that can be inserted into Code_Stream1


		 //important
		 //this php does not prevent duplicate values for LineNumber being entered
		 //this was done on mySQL by setting LineNumber to unique

		// 	$result = "SELECT * FROM Code_Stream1 WHERE LineNumber = $linenumber";
		 //	$num_rows = $result;

		//	if ($num_rows > 0) {
		//		   echo "oops";
	//	}
//else {


  $update = "UPDATE Code_Stream1 SET LineNumber = LineNumber + '1' WHERE LineNumber >= $linenumber order by LineNumber DESC";
  //if an insert happens, with this update all entries above this will have line number increased by 1
  //to reflect change in text editor
  $resultupdate = $conn->query($update);

  if(!$resultupdate) {
    echo $conn->error;
  }

  echo $resultupdate;

$Insert = "INSERT INTO Code_Stream1 (LineNumber, Projectid, Line_Code, User ) VALUES (?, ?, ?, 'Staff')";
  $PreSt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($PreSt, $Insert)){
    header("Location: ../staff/textedit2.php?error=sqlprob2");
    exit();
  }

  else{

    mysqli_stmt_bind_param($PreSt, "iis", $linenumber, $Projectid, $linec);
    mysqli_stmt_execute($PreSt);
    header("Location: ../staff/textedit2.php?success=data-sent");
    exit();




mysqli_stmt_close($PreSt);
mysqli_close($conn);


}
?>
