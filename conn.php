<?php
// database connection
        $host = "sgrant22.lampt.eeecs.qub.ac.uk";
        $user = "sgrant22";
        $pw = "yNXHylXTQCMkYDj6";
        $db = "sgrant22";

        $conn = new mysqli($host, $user, $pw, $db);

        if($conn->connect_error) {
          echo $conn->connect_error;
        }
        ?>
