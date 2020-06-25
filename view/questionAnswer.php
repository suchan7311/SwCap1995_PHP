<?php
    $id=$_POST['Id'];
    
include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM customer_messages WHERE id='$id'";            
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
    echo $row['message'];
    $title = $row['title'];
    $content = $row['message'];
    $answer=$row['answer'];

  mysqli_close($conn);

?>
<div style='margin:50'>
    <div>
        <text>제목</text>
        <textarea id="title" rows="2" cols="45">
</textarea>
    </div>
    <div style="margin-top:10">

        <text>내용</text>
        <textarea id="content" rows="12" cols="45">
</textarea>
    </div>
</div>
<div style='margin:50'>
    <text>답변</text>
    <input type="hidden" id="id">
    <textarea id="answer" rows="12" cols="45">
</textarea>
    <input type="button" id='submit' value="제출">

</div>

<script>
    $('#submit').click(function () {
        $.ajax({
            type: "POST",
            url: "./action/questionAnswerSubmit.php",
            data: {
                id: <?=$id?>,
                answer: $('#answer').val()
            }
        });
    });


    $(document).ready(function () {
        $('#title').text('<?php echo $title ?>');
        $('#content').text('<?php echo $content ?>');
        $('#answer').text('<?php $answer ?>');
        $('#id').val('<?php echo $id ?>');

    });
    
</script>