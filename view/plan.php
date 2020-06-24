<?php
//     $id=$_POST['Id'];
    
// include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
// $conn = mysqli_connect($servername,$username,$password,$dbname);
// $sql = "SELECT * FROM customer_messages WHERE id='$id'";            
// $result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_array($result);
//     echo $row['message'];
//     $title = $row['title'];
//     $content = $row['message'];
//     $email=$row['email'];

//   mysqli_close($conn);

?>

<script>
    $('#submit').click(function () {
        $.ajax({
            type: "POST",
            url: "./action/createPlan.php",
            data: {
                topCategoryNum: $("#topCategoryNum option:selected").val(),
                detailedCategory: $('#detailedCategory').val(),
                main_rule: $('#main_rule').val(),
                sub_rule_1: $('#sub_rule_1').val(),
                sub_rule_2: $('#sub_rule_2').val(),
                authentication_way: $("#authentication_way option:selected").val(),
            }
        });
    });
</script>
<div style='margin:50'>


    <div>
        <text>카테고리</text>
    </div>
    <div>
        <select id="topCategoryNum">
            <option value="1">건강/운동</option>
            <option value="2">생활습관</option>
            <option value="3">자기계발</option>
            <option value="4">감정관리</option>
            <option value="5">기타</option>
        </select>
    </div>
    <div>
        <text>플랜제목</text>
    </div>
    <textarea id="detailedCategory" rows="2" cols="45">
</textarea>
    <div style="margin-top:10">
        <text>메인룰</text>
    </div>
    <textarea id="main_rule" rows="6" cols="45">
</textarea>
    <div style="margin-top:10">
        <text>서브룰1</text>
    </div>
    <textarea id="sub_rule_1" rows="6" cols="45">
</textarea>


    <div style="margin-top:10">

        <text>서브룰2</text>
    </div>
    <textarea id="sub_rule_2" rows="6" cols="45">
</textarea>
    <div>
        <text>인증수단</text>
    </div>
    <div>
        <select id="authentication_way">
            <option value="0">갤러리</option>
            <option value="1">카메라</option>
        </select>
    </div>

    <input style="margin-top:10" type="button" id='submit' value="생성">

</div>
</div>