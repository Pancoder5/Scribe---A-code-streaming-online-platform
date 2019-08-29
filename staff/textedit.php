<?php
  include("../conn.php");

  session_start();
  if (!isset($_SESSION['staffID'])){
    header("Location: ../index.php");
    exit();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>Scribe</title>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



    <style>

    #textEditor{
      height:300px;
      padding: 0px 20px 0px 20px;
      position: absolute;
      top: 120px;
      left:70px;
      right: 70px;
      width:90%;
      line-height: 20px;
      resize: none;
      white-space: nowrap;
      scroll-behavior: auto;
      line-height: normal;
      padding-top: 5px;
      padding-bottom: 0px;
      background-color: transparent;

      .backdrop {
    overflow: auto;
}

    .highlights {
    white-space: pre-wrap;
    word-wrap: break-word;
     color: transparent;
}

    mark {
  color: transparent;
  background-color: #d4e9ab;


    }


    </style>

</head>

    <body>
           <div class="container">
             <div class="backdrop">
               <div class="highlights">
                <div class="form-group">
                </div>
              </div>
                     <label>Enter Post Description</label>
                     <textarea name="textEditor" id="textEditor" rows="6" class="form-control" ></textarea>

                     <div id="lineNo" name="lineNo"></div>
                      <div id="lineText" name="lineText"></div>
                   <div id="c" name="c">Test</div>
                </div>
    <div class="form-group">
     <button type="button"  name="publish" class="btn btn-info">Publish</button>
    </div>
                <div class="form-group">
                     <input type="hidden" name="Streamid" id="Streamid" />
                     <div id="autoStream"></div>
                </div>
           </div>
      </body>
 </html>


 <script>
 var lineNo = 0;
 var lineText = "";
 var m = 5;
 let parameters = {
 "line_number": lineNo,
 "post_code" : lineText
 };
 var ta;
 var numOfSpaces;
//<!-- onkeyup="this, document.getElementById('lineNo')" onkeyup="this, document.getElementById('lineText')"--
 	 // $(function(){

	   function update(e) {
 				    //https://stackoverflow.com/questions/4069982/document-getelementbyid-vs-jquery
 			      ta = $("#textEditor")[0];
             lineNo = ta.value.substr(0, ta.selectionStart).split(/\r?\n|\r/).length;
 					 lineText = ta.value.split(/\r?\n|\r/)[lineNo - 1];
 					  numOfSpaces = lineText.split(/\s/).length - 1;
            parameters = {
            "line_number": ta.value.substr(0, ta.selectionStart).split(/\r?\n|\r/).length,
            "post_code" : ta.value.split(/\r?\n|\r/)[lineNo - 1]
            };
 					 console.log(" line num: " +lineNo+ " line data: " + lineText + " Number of spaces: "+ numOfSpaces);

         }
                $('#textEditor').keyup(update).mouseup(update);


      //   });

// console.log(dog1.toString());
 // expected output: "Gabby"


 $textarea.on({
    'input': handleInput,
    'scroll': handleScroll
});

function handleInput() {
    var text = $textarea.val();
    var highlightedText = applyHighlights(text);
    $highlights.html(highlightedText);
}

function applyHighlights(text) {
    return text
        .replace(/\n$/g, '\n\n')
        .replace(/[A-Z].*?\b/g, '<mark></mark>');
}

function handleScroll() {
    var scrollTop = $textarea.scrollTop();
    $backdrop.scrollTop(scrollTop);
}s



//function handleEnter(e) {
  //  if (e.keyCode == 13) {
    //  document.addEventListener('keydown', pasteIntoInput(this, "\n"));
    //    }
  //      e.preventDefault();
//    }


// Handle both keydown and keypress for Opera, which only allows default
// key action to be suppressed in keypress
//$("textEditor").keydown(handleEnter).keypress(handleEnter);


//let parameters = {
//    "line_number": $('#lineNo').val(),
//  "post_code" : '#lineText',
//  "post_id" : $('#Streamid').val()
//};

//var lineNo = $('#someVariable').val();
//var lineText = 'lineText';

//console.log(parameters.post_code)
//stream(parameters);

  //  function stream(parameters)
  //  {

      //  var line_Number = $('#lineNo').val();
      //  var post_code = '#lineText';
      //  var post_id = $('#Streamid').val();
      //  if (post_code != ''){

    //  console.log(parameters.post_code);
    //    if (parameters.post_code != ''){



      //  $.ajax({
      //    url: "post-code.php",
      //    method: "POST",
      //    data: parameters,
          //data: {lineText: lineText, lineNo: lineNo},
      //    dataType: "text",
      //    success: function(data){
      //      if(data != ''){
      //        $('#Streamid').val(data);
      //      }
      //      $('#autoStream').text("Code is streaming");
      //        setInterval(function(){
        //        $('#autoStream').text('');
        //      }, 100);
        //  }
    //    });
  //    }
//    }




console.log(parameters.post_code)
stream(parameters);
  function stream(parameters){

    //var lineNo4 = $('#lineNo').val()
  //  var lineText4 = $('#lineText')

    $.ajax({

      url: "post-code.php",
      method: "POST",
      data: parameters, m,
      //data: {lineText: lineText4, lineNo: lineNo4},
      dataType: "text",
      success: function(data){
        if(data != ''){
          $('#Streamid').val(data);
        }
        $('#autoStream').text("Code is streaming");
          setInterval(function(){
            $('#autoStream').text('');
          }, 100);
      }
    });
  }
//}



//  $("#textEditor").mouseup(function (e) {
//      lineNum0 = this.value.substr(0, textEditor.selectionStart).split("\n").length;

     //current = getLineNumber();
    // console.log(lineNum0+" mouse click");

  //  });

$("#textEditor").keydown(function (e) {

    if (e.keyCode == 13) {
    document.addEventListener('keydown', newLine(this, "\n"));
    e.preventDefault();


    update();
    stream(parameters);



    //console.log("code posted");


  //    });




    //lineNum0 = this.value.substr(0, textEditor.selectionStart).split("\n").length;

    //var caretPos = lineNum0 ,start, end;

  //  for (start = caretPos; start >= 0 && this[start] != "\n";
    //     --start
    //   );

  //  for (end = caretPos; end < this.length && this[end] != "\n"; ++end);

  //    var line = this.value.substring()


    //var line = this.value.substring(start + 10000 end - 10000)

  //  ArrayA = [lineNum0];

    //for(var i = 0; i<ArrayA.length; i++){
    //    console.log( + i + line);
    //  }
//    console.log(lineNum0+"  "+line);



    //var line_data = [];

    //line_data[0] = [lineNum0];

    //line_data[1] = [line];
    //console.log(lineNum0+"  "+line);

   //current = getLineNumber();
//   console.log(lineNum0+" return pressed");
  // e.preventDefault();
//stream();
 //}else{

   //lineNum0 = this.value.substr(0, textEditor.selectionStart).split("\n").length;

  //current = getLineNumber();

//  var caretPos = lineNum0 ,start, end;

//  for (start = caretPos; start >= 0 && this[start] != "\n";
  //     --start
  //   );

  //for (end = caretPos; end < this.length && this[end] != "\n"; ++end);

//  var line = this.value.substring(start + 1, end - 1);

//  console.log(lineNum0+"  "+line);
}
//})
})


//lineNum0+"  "+
//+"  "+line
//})




    </script>
    <script>
  //document.getElementById('textEditor').addEventListener('keyup', e => {
  //  console.log('Caret at: ', e.target.selectionStart)

//})
//CODE
    function newLine(el, text) {
    el.focus();
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

//document.getElementById('textEditor').addEventListener('keyup', function(e) {
  //  var key = e.which || e.keyCode;
  //  var lineNumArray = [];
  //  for(var i=1; i<8; i++){
  //    if(key === 13){
    //   console.log('Line Number: ', lineNumArray[i]);
  //  } else{
    //  console.log('Line Number: ', lineNumArray[i]);
  //  }

//}
//})

//$(function  linenNumber() {
  //  $('#textEditor').keyup(function() {
    //    var pos = 0;
      //  if (this.selectionStart) {
        //    pos = this.selectionStart;
    //    } else if (document.selection) {              //have a look at this, perhaps alter
      //      this.focus();

        //    var r = document.selection.createRange();
          //  if (r == null) {
          //      pos = 0;
          //  } else {

            //    var re = this.createTextRange(),
            //    rc = re.duplicate();
            //    re.moveToBookmark(r.getBookmark());
            //    rc.setEndPoint('EndToStart', re);

              //  pos = rc.text.length;


        //    }
        //    console.log('pos', pos);
      //  }
      //  $('#c').html(this.value.substr(0, pos).split("\n").length);
//    });
//});



    function getLineNumber(textEditor,xfgfsdg ) {

        lineNum0 = textarea.value.substr(0, textarea.selectionStart).split("\n").length;
    //    console.log(lineNum0);
        //return lineNum0;
    }

    //console.log('#lineNo');

</script>

<script>
//  $(document).ready(function(){
  // var lineheight = parseInt($('#textEditor').css('lineHeight'),10);
  // var padding = parseInt($('#textEditor').css('paddingTop'),10) + (parseInt($('#textEditor').css('paddingBottom'),10))
  // var lines = parseInt($('#textEditor').prop('scrollHeight')) - (padding / lineheight);
  // console.log(lines);

  //})


  </script>

  </script>

  <script>

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
        this.focus();
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
        this.focus();
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


  //   $('textEditor').highlightTextarea({
  //     words: [{
  //       color: '#FF0000',
  //       words: ['html', 'head', 'body', 'meta', '/head', '/body', ']
  //     }, {
  //       color: '#FFFF00',
  //       words: ['Donec']
  //     }]
  //   });


   </script>
