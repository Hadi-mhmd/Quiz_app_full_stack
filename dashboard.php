<?php
 include "header.php" ;
?>
    <main class="main">
      <div class="content-box">
    <div class="col-lg-2 col-lg-push-10">
        <div id="current_que" style="float:left">0</div>
        <div style="float:left">/</div>
        <div id="total_que" style="float:left">0</div>
    </div>
    <!-- <div class="breadcrumb" id="countdowntimer" style="font-size: 20px; font-weight: bold; color: red;">
    Loading timer...
    </div> -->

    <div class="row" style="margin-top: 30px">
    <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color: white" id="load_questions">
        <!-- Questions will be loaded here -->
    </div>
    </div>

    <div class="row" style="margin-top: 10px">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 50px">
        <div class="col-lg-12 text-center">
            <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
            <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
        </div>
    </div>
    </div>
      </div>
    </main>

  </div>

</body>

</html>


<script type="text/javascript">
// function load_total_que() {
//   var xmlhttp = new XMLHttpRequest();
//   xmlhttp.onreadystatechange = function() {
//     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//       document.getElementById("total_que").innerHTML = xmlhttp.responseText;
//     }
//   };
//   xmlhttp.open("GET", "forajax/load_total_que.php", true);
//   xmlhttp.send(null);
// }

// var questionno = "1";
// load_questions(questionno);

// function load_questions(questionno) {
//   document.getElementById("current_que").innerHTML = questionno;
//   var xmlhttp = new XMLHttpRequest();
//   xmlhttp.onreadystatechange = function() {
//     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//       if(xmlhttp.responseText == "over") {
//         //window.location = "result.php";
//       } else {
//         document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
//         load_total_que();
//       }
//     }
//   };
//   xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
//   xmlhttp.send(null);
// }

// function load_previous(questionno) {
//   if(questionno == "1") {
//     load_questions(questionno);
//   } else {
//     questionno = eval(questionno) - 1; // Changed eval() to parseInt()
//     load_questions(questionno);
//   }
// }

// function load_next(questionno) {
//   questionno = eval(questionno) + 1; // Changed eval() to parseInt()
//   load_questions(questionno);
// }
var questionno = 1; // Start from question 1

// Load the first question
load_questions(questionno);

// Function to load the total questions (it’s already correct)
function load_total_que() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("total_que").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "forajax/load_total_que.php", true);
  xmlhttp.send(null);
}

// Function to load the questions dynamically
function load_questions(questionno) {
  document.getElementById("current_que").innerHTML = questionno;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      if (xmlhttp.responseText == "over") {
        // Optionally redirect to result page when quiz is over
        // window.location = "result.php";
      } else {
        document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
        load_total_que();
      }
    }
  };
  xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
  xmlhttp.send(null);
}

// Function to load the previous question
function load_previous() {
  // Ensure the question number is updated correctly
  if (questionno > 1) {
    questionno--; // Decrement the question number
    load_questions(questionno); // Load the previous question
  }
}

// Function to load the next question
// function load_next() {

//   questionno++; // Increment the question number
//   load_questions(questionno); // Load the next question
// }
function load_next() {
  var totalQuestions = parseInt(document.getElementById("total_que").innerHTML);
  
  // Check if this is the last question
  if (questionno >= totalQuestions) {
    // Redirect to result page
    window.location = "result.php";
  } else {
    questionno++; // Increment the question number
    load_questions(questionno); // Load the next question
  }
}

function radioclick(radiovalue,questionno){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    }
  };
  xmlhttp.open("GET", "forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+radiovalue, true);
  xmlhttp.send(null);
}
</script>


