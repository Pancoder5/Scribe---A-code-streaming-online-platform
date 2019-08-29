
<?php
session_start();
  include("../conn.php");
$getProject = $conn->real_escape_string($_GET['filter']);

if (!isset($_SESSION['staffID'])){
	header("Location: ../index.php");
	exit();
}

$Delete = "DELETE FROM Code_Stream_SavedLectures WHERE Projectid =?";
$PreSt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($PreSt, $Delete)){
  header("Location: saved-lectures.php?error=sql");
  exit();


}else{

    mysqli_stmt_bind_param($PreSt, "i", $getProject);
    mysqli_stmt_execute($PreSt);
    header("Location: saved-lectures.php?success=lecture-deleted");
    exit();
}
		//$delete = "DELETE FROM Code_Stream_SavedLectures WHERE Projectid='$getProject' ";

		//$resultinsert = $conn->query($delete);

		//echo $delete;


    ?>
