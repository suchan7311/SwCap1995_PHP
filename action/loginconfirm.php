<?php
  session_start();            
  $userID = $_POST["id"];
   $pw = $_POST["pw"];
  
  include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
  $sql = "SELECT * FROM adminUsers WHERE user_id = '$userID' ";      

   $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  if(password_verify($pw,$row['password'])){
      $_SESSION['userID']=$userID;
      echo 1;
  }else{
        echo 2;
      
    }
    mysqli_close($conn);

?>