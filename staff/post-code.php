
<script>

var myJsonString = JSON.stringify(parameters);


</script>


<?php



// this page takes the parameters passed through the AJAX function
//(line number and line text) and using php inserts them into the SQLiteDatabase
//The problem at the minute is that postman (the console.log plugin for php)
// is saying that the JSON data being received is in the form of an array
//I need to put this in the form of a string
        $host = "sgrant22.lampt.eeecs.qub.ac.uk";
        $user = "sgrant22";
        $pw = "yNXHylXTQCMkYDj6";
        $db = "sgrant22";
        # Get JSON as a string

          $json = json_decode();
          echo $json;

          $object = JSON.stringify('parameters');

        echo "above";
        echo $_POST;

        echo array_values($_POST);
        echo "below";
        $json_str = file_get_contents('php://input');
        # Get as an object
        //$json = json_decode($_POST);
        $conn = new mysqli($host, $user, $pw, $db);
        //echo $json;
        //echo "<---json";
        if($conn->connect_error) {
          echo $conn->connect_error;
        }

        echo $json_str;

      //  if(isset($_POST["lineText"])){


    //$post_code = $json->post_code;

    //$lineNumber = $json->line_number;

  //  echo("<script>console.log('PHP: ".$json."');</script>");
  //  $insert = "INSERT INTO Code_Stream1 (LineNumber, Projectid, Line_Code, User ) VALUES ('".$lineNumber."', '1', '".$post_code."', '1'  )";

     $resultinsert = $conn->query($insert);

        if(!$resultinsert){
          echo $conn->error;
        }



        //echo $data->post_code;


  //  if($_POST["postId"] != '') {

  //    $update = "UPDATE Code_Stream1 SET Line_Code = '".$post_code."'  WHERE id = '".$_POST["postId"]."' AND LineNumber = '".$LineNumber."' ";

  //    $resultupdate = $conn->query($update);

  //    if(!$resultupdate){
  //      echo $conn->error;
  //    }
  //    } else {



    //  $insert = "INSERT INTO Code_Stream1 (LineNumber, Projectid, Line_Code, User ) VALUES ('".$LineNumber."', '1', '".$post_code."', '1'  )";
//      $insert = "INSERT INTO Code_Stream1 (LineNumber, Projectid, Line_Code, User) VALUES ('".$LineNumber."', '2', '".$post_code."', '3') ";

        //    $resultinsert = $conn->query($insert);

          //  if(!$resultinsert){
          //    echo $conn->error;
        //    }
      //      }
    //}

    ?>
