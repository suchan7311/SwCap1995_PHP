<?php
$topCategoryNum=$_POST['topCategoryNum'];
echo $topCategoryNum;
$detailedCategory=$_POST['detailedCategory'];
$main_rule=$_POST['main_rule'];
$sub_rule_1=$_POST['sub_rule_1'];
$sub_rule_2=$_POST['sub_rule_2'];
$authentication_way=$_POST['authentication_way'];
echo $detailedCategory;
echo $main_rule;
echo $sub_rule_1;
echo $sub_rule_2;
echo $authentication_way;
include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM detailedCategories WHERE detailedCategory='".$detailedCategory."'";             
$result = mysqli_query($conn,$sql);
if($result){
    echo "첫번째쿼리성공";
  }else{
    echo "첫번째쿼리실패";
  }
$row = mysqli_fetch_array($result);
$date=date('Y-m-d H:i:s');
$timestamp=strtotime($date);
if ($row[0] == "") {
    $sql = "INSERT INTO  detailedCategories  (topCategoryNum,detailedCategory,createdAt,updatedAt) VALUES($topCategoryNum,'".$detailedCategory."','".$date."','".$date."')";
$result = mysqli_query($conn,$sql);
if($result){
    echo "두번째쿼리성공";
  }else{
    echo "두번째쿼리실패";
    $error = mysqli_error($conn);
    echo "$error";
  }
} 
$sql =  "INSERT INTO  plan_templates  (detailedCategory,main_rule,sub_rule_1,sub_rule_2,authentication_way,createdAt,updatedAt) VALUES('".$detailedCategory."','".$main_rule."','".$sub_rule_1."','".$sub_rule_2."',$authentication_way,'".$date."','".$date."')";        
$result = mysqli_query($conn,$sql);
if($result){
    echo "세번째쿼리성공";
  }else{
    echo "세번째쿼리실패";
    $error = mysqli_error($conn);
    echo "$error";
  }
mysqli_close($conn);
?>