<?php
        $host = "sgrant22.lampt.eeecs.qub.ac.uk";
        $user = "sgrant22";
        $pw = "yNXHylXTQCMkYDj6";
        $db = "sgrant22";

        $conn = new mysqli($host, $user, $pw, $db);

        if($conn->connect_error) {
          echo $conn->connect_error;
        }

        if(isset($_POST["postCode"])){


    $post_code = $conn->real_escape_string($_POST["postCode"]);

    $LineNumber = $conn->real_escape_string($_POST["lineNum"]);

    if($_POST["postId"] != '') {

        $update = "UPDATE Code_Stream1 SET Line_Code = '".$post_code."'  WHERE id = '".$_POST["postId"]."' AND LineNumber = '".$LineNumber."' ";

        $resultupdate = $conn->query($update);

       if(!$resultupdate){
          echo $conn->error;
      }

    ?>
