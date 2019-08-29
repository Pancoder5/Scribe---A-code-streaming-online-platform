<?php
//logout pages which destroys the sessions
session_start();
session_unset();
session_destroy();

header("Location:../index.php")

 ?>
