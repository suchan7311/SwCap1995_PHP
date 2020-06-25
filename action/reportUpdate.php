<?php
$auth_id=$_POST['auth_id'];
$id=$_POST['id'];
$status=$_POST['status'];

include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
$sql = "UPDATE report_judges SET result='$status'WHERE id='$id'";            
$result = mysqli_query($conn,$sql);
if($status=="done"){
    $sql = "UPDATE daily_authentications SET status='$status'WHERE id='$auth_id'";            
    $result = mysqli_query($conn,$sql);
}
mysqli_close($conn);
?>