<?php
session_start();
  include("../conn.php");


  if (!isset($_SESSION['staffID'])){
    header("Location: ../index.php");
    exit();
  }

 
//retrieving messages from the message table
  $read = "SELECT User, Message, Time1 FROM Code_Stream_Messages";

  $result = $conn->query($read);

  if(!$result) {
    echo $conn->error;
  }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>Scribe</title>




      <!-- Compiled and minified CSS -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

          <!-- Compiled and minified JavaScript -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

           <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



    <style>

    #textEditor{
      height:300px;
      padding: 0px 20px 0px 20px;
      position: relative;
      top: 120px;
      left:70px;
      right: 70px;
      width:90%;
      line-height: 20px;
      resize: none;
      white-space: nowrap;
      line-height: normal;
      padding-top: 5px;
      padding-bottom: 0px;
      padding-left: 35px;
      padding-top: 10px;
      border-color:#ccc;


    }

    #nav-mobile{
      width: 250px;
    }

    #icon_prefix2{
      width:150px;
    }
    #message-boxes{
      height: 20px;
    }

    #message-row{
      height: 20px;
    }
    #imagequb{
      height:25px;
      float: left;
    }
    #slide-out{
      width:205px;
    }

    .statement {
    color: orange;
}










    </style>

</head>

<script>
//side nav instantiation
document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.sidenav');
   var instances = M.Sidenav.init(elems, {
      edge: 'left'
   });
 });
 </script>

<body>

       <div class="container">
         <nav>
     <div class="nav-wrapper" id="nav-wrapper">
       <a href="index.php" class="brand-logo" id="Scribe">Scribe</a>
     </nav>
     <div class="form-group">
          <input type="hidden" name="Streamid" id="Streamid" />
          <div id="autoStream"></div>

<!--form which takes sent message contents to includes/staffmessage.php page -->
      <ul id="slide-out" class="sidenav sidenav-fixed">
    <li><div class="user-view">
    <form action="../includes/staffmessage.inc.php" method="post">
        <input type="text" name='staffmessage' placeholder="Message">
          <button class="btn waves-effect waves-light" type="submit" name="Staff-message-send">Send></button>
      </form>
      </div></li>
      <?php
      //displays retrieved messages in side nav within 'cards' - see cards on materialize
        while($row = $result->fetch_assoc() ){

          $Message = $row['Message'] ;
          $User = $row['User'];
          $Time = $row['Time1'];

        echo  "<div class='col s1 m8 offset-m2 2 offset-5'>
        <div class='card-panel grey lighten-5 z-depth-1'>
          <div class='row right-align'>
            <div class='col 1'>
              <img src='../images/qublogo.jpg' alt='' class='circle responsive-img' id='imagequb'>  <!-- notice the 'circle' class -->
            </div>
            <div class='col s12'>
              <span class='black-text' class style='font-weight:600;'>
                $Message
              </span>
              <p>$User</p>
                <p>$Time</p>
            </div>
          </div>
        </div>
      </div>";
    }

  ?>
</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">chat</i></a>
</div>


<div class="form-group">
    <textarea name="textEditor" id="textEditor"  contenteditable="true"></textarea>

</div>



 <script>
 var lineNo = 0;
 var lineText = "";
 let parameters = {
 "line_number": lineNo,
 "post_code" : lineText
 };
 var ta;
 var numOfSpaces;


 				function update(e) {
 				    //function that updates the text at a certain line. For this to occur the insert must already exist in the database
 			      ta = $("#textEditor")[0];
					lineNo = ta.value.substr(0, ta.selectionStart).split(/\r?\n|\r/).length;
 					 lineText = ta.value.split(/\r?\n|\r/)[lineNo - 1];
 					  numOfSpaces = lineText.split(/\s/).length - 1;
            parameters = {
            "line_number": ta.value.substr(0, ta.selectionStart).split(/\r?\n|\r/).length,
            "post_code" : ta.value.split(/\r?\n|\r/)[lineNo - 1]
            };



 					 console.log(" line num: " +lineNo+ " line data: " + lineText + " Number of spaces: "+ numOfSpaces);


           //AJAX function which takes the text and the line number to the post_code3.php page
           //post-code3.php contains and update statement
					   $.ajax({

						  url: "post-code3.php",
						  method: "POST",
						  //data: parameters,
						  data: {lineN: lineNo, lineT: lineText},
						  dataType: 'text',
						  success: function(data){

							 console.log(data);
						  }
						});



         }

         //calls the update function on a mouseclick or keypress
       $('#textEditor').keydown(update).mousedown(update);



        //referring to below this function is called when the backspace (keycode 8) is pressed
                function delete1(e){
                lineNo = ta.value.substr(0, ta.selectionStart).split(/\r?\n|\r/).length;
                 lineText = ta.value.split(/\r?\n|\r/)[lineNo - 1];

                 //if the line is empty the AJAX code is executed
                 //the line number and line text is taken to delete-code3.php page
                 //delete-code3 contains a delete statement
                    if(lineText ===""){

                      	 $.ajax({

                    		  url: "delete-code3.php",
                    		  method: "POST",
            						  data: {lineN: lineNo, lineT: lineText},
            						  dataType: 'text',
            						  success: function(data){
          					      console.log(data);
                  				  }
                						});
                        }
                      }

                      //calls above function on pressing backspace
                      $("#textEditor").keydown(function (e) {
                        if (e.keyCode == 8) {
                          delete1();
                        }
                      })



//on load page or DOM
$(function(){

$("#textEditor").focus();

ta = $("#textEditor")[0];
lineNo = ta.value.substr(0, ta.selectionStart).split(/\r?\n|\r/).length;
lineText = ta.value.split(/\r?\n|\r/)[lineNo - 1];
numOfSpaces = lineText.split(/\s/).length - 1;


});


  function stream(lineNo, lineText){

    ta = $("#textEditor")[0];
    lineNo = ta.value.substr(0, ta.selectionStart).split(/\r?\n|\r/).length;
    lineText = ta.value.split(/\r?\n|\r/)[lineNo - 1];
    numOfSpaces = lineText.split(/\s/).length - 1;

   console.log(lineNo+"  "+lineText);




    $.ajax({

      url: "post-code2.php",
      method: "POST",
      data: {lineN: lineNo, lineT: lineText},
      dataType: 'text',
      success: function(data){

         console.log(data);
      }
    });
  }


$("#textEditor").keydown(function (e) {

    if (e.keyCode == 13) {
		stream();
	}else{

	update();
}

})

    </script>
    <script>

    function newLine(el, text) {
      if (typeof el.selectionStart == "number"
              && typeof el.selectionEnd == "number") {
          var val = el.value;
          var selStart = el.selectionStart;
          el.value = val.slice(0, selStart) + text + val.slice(el.selectionEnd);
          el.selectionEnd = el.selectionStart = selStart + text.length;
      } else if (typeof document.selection != "undefined") {
          var textRange = document.selection.createRange();
          textRange.text = text;
          textRange.collapse(false);
          textRange.select();
      }
  }



  function getCursorPos(textEditor) {
      if ("selectionStart" in input && document.activeElement == input) {
          return {
              start: input.selectionStart,
              end: input.selectionEnd
          };
      }
      else if (input.createTextRange) {
          var sel = document.selection.createRange();
          if (sel.parentElement() === input) {
              var rng = input.createTextRange();
              rng.moveToBookmark(sel.getBookmark());
              for (var len = 0;
                       rng.compareEndPoints("EndToStart", rng) > 0;
                       rng.moveEnd("character", -1)) {
                  len++;
              }
              rng.setEndPoint("StartToStart", input.createTextRange());
              for (var pos = { start: 0, end: len };
                       rng.compareEndPoints("EndToStart", rng) > 0;
                       rng.moveEnd("character", -1)) {
                  pos.start++;
                  pos.end++;
              }
              return pos;
          }
      }
      return -1;

  }

    </script>

    <script>

    HTMLTextAreaElement.prototype.insertAtCaret = function (text) {
  text = text || '';
  if (document.selection) {
    // IE
    this.focus();
    var sel = document.selection.createRange();
    sel.text = text;
  } else if (this.selectionStart || this.selectionStart === 0) {
    // Others
    var startPos = this.selectionStart;
    var endPos = this.selectionEnd;
    this.value = this.value.substring(0, startPos) +
      text +
      this.value.substring(endPos, this.value.length);
    this.selectionStart = startPos + text.length;
    this.selectionEnd = startPos + text.length;
  } else {
    this.value += text;
  }
};

    </script>


    <script>


    HTMLTextAreaElement.prototype.getCaretPosition = function () { //return the caret position of the textarea
        return this.selectionStart;
    };
    HTMLTextAreaElement.prototype.setCaretPosition = function (position) { //change the caret position of the textarea
        this.selectionStart = position;
        this.selectionEnd = position;
        //this.focus();
    };
    HTMLTextAreaElement.prototype.hasSelection = function () { //if the textarea has selection then return true
        if (this.selectionStart == this.selectionEnd) {
            return false;
        } else {
            return true;
        }
    };
    HTMLTextAreaElement.prototype.getSelectedText = function () { //return the selection text
        return this.value.substring(this.selectionStart, this.selectionEnd);
    };
    HTMLTextAreaElement.prototype.setSelection = function (start, end) { //change the selection area of the textarea
        this.selectionStart = start;
        this.selectionEnd = end;
        //this.focus();
    };




 var textarea = document.getElementsByTagName('textarea')[0];

 textarea.onkeydown = function(event) {

     //support tab on textarea
     if (event.keyCode == 9) { //tab was pressed
         var newCaretPosition;
         newCaretPosition = textarea.getCaretPosition() + "    ".length;
         textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "    " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
         textarea.setCaretPosition(newCaretPosition);
         return false;

       }
     }

   </script>
