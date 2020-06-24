<?php
$weight=$_POST['weight'];
$changeId=$_POST['changeId'];


include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);    
$sql = "UPDATE users SET weight='$weight' WHERE id='$changeId'";            
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
?>