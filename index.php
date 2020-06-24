<?php

 session_start();
if(!isset($_SESSION['userID'])){
  header("Location: /phpcapdi/view/login.php");
}else{
} 
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/> 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<!DOCTYPE html>
<html lang="en">
<title>planA admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1">admin page</a>
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b>Menu</b></h4>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">신고함</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#" onclick=menuClick(2)>문의함</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#" onclick=menuClick(3)>유저관리</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#" onclick=menuClick(4)>플랜 생성</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">
<div style="margin-top:100px">
<img src="./imgs/planA.png" width="1000" height="400">
</div>
<!-- END MAIN -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}
function menuClick(pageNumber){
  if(pageNumber==2){
  $.ajax({
        type : "GET",
        url : "/phpcapdi/view/question.php",
        dataType : "text",
        error : function() {
            alert('통신실패!!');
        },
        success : function(data) {
            $('.w3-main').html(data);
        }
 
    });
  }
  else if(pageNumber==3){
  $.ajax({
        type : "GET",
        url : "/phpcapdi/view/user.php",
        dataType : "text",
        error : function() {
            alert('통신실패!!');
        },
        success : function(data) {
            $('.w3-main').html(data);
        }
 
    });
  }
  
  else if(pageNumber==4){
  $.ajax({
        type : "GET",
        url : "/phpcapdi/view/plan.php",
        dataType : "text",
        error : function() {
            alert('통신실패!!');
        },
        success : function(data) {
            $('.w3-main').html(data);
        }
 
    });
  }
}
// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
