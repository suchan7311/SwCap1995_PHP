<?php
    $id=$_POST['Id'];
    
include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";


$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM report_judges WHERE id='$id'";            
$result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_array($result);
    $plan_id = $row['plan_id'];
    $auth_id = $row['daily_auth_id'];
    
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM daily_authentications WHERE id='$auth_id'";            
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$image_url=$row['image_url'];
$sql = "SELECT * FROM plans WHERE id='$plan_id'";            
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$is_custom = $row['is_custom'];
    if($is_custom==0){
        $rule1=$row['picture_rule_1'];
        $rule2=$row['picture_rule_2'];
        $rule3=$row['picture_rule_3'];
    }else{
        $rule1=$row['custom_picture_rule_1'];
        $rule2=$row['custom_picture_rule_2'];
        $rule3=$row['custom_picture_rule_3'];
    }
  mysqli_close($conn);

?>
<div style='margin:100'>
    <div style='margin-bottom:50px'>
    <text style="font-size:300%;"   >신고 게시물 정보</text>
    </div>
    <div>
        <text>룰1</text>

        <text id="rule1"></text>
    </div>
    <div style="margin-top:10">

        <text>룰2</text>
        <text id="rule2"></text>
    </div>
    <div style="margin-top:10">

        <text>룰3</text>
        <text id="rule3"></text>
    </div>
    
    <div style="margin-top:10">
    <text>인증사진</text>
    </div>
    <div style="margin-top:10">
        <img src="" id="auth_img" style="width:500px;height:500px">
    </div>
    
    <div style='margin-top:50px'>
    <input type="button" class="btn btn-primary" id='done' value="인증처리">
    &nbsp;&nbsp;   
    <input type="button" class="btn btn-primary" id='reject' value="반려">
    </div>
</div>

<script>
    $('#done').click(function () {
        $.ajax({
            type: "POST",
            url: "./action/reportUpdate.php",
            data: {
                id: <?=$id?> ,
                auth_id: <?=$auth_id?>,
                status:"done"
            }
        }).then(function(){
            $.ajax({
        type : "GET",
        url : "/phpcapdi/view/report.php",
        dataType : "text",
        error : function() {
            alert('통신실패!!');
        },
        success : function(data) {
            $('.w3-main').html(data);
        }
 
    });
        });
    });


    $('#reject').click(function () {
        $.ajax({
            type: "POST",
            url: "./action/reportUpdate.php",
            data: {
                id: <?= $id ?> ,
                auth_id: <?=$auth_id?>,
                status:"reject"
            }
        }).then(function(){
            $.ajax({
        type : "GET",
        url : "/phpcapdi/view/report.php",
        dataType : "text",
        error : function() {
            alert('통신실패!!');
        },
        success : function(data) {
            $('.w3-main').html(data);
        }
 
    });
        });
    });


    $(document).ready(function () {
        $('#rule1').text('<?php echo $rule1 ?>');
        $('#rule2').text('<?php echo $rule2 ?>');

        $('#rule3').text('<?php echo $rule3 ?>');
        $('#auth_img').attr('src', '<?php echo $image_url?>');

    });
</script>