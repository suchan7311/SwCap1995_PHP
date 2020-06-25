<?php
$answer=$_POST['answer'];
$id=$_POST['id'];


include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM customer_messages WHERE id='$id'";            
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$row['message'];
$id=$row['id'];
$title = $row['title'];
$content = $row['message'];
$email=$row['email'];
    
$sql = "UPDATE customer_messages SET answer='$answer'WHERE id='$id'";            
$result = mysqli_query($conn,$sql);

mysqli_close($conn);
?>