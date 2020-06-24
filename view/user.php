<?php
$n=0;
  
session_start();     

include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM users";            
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

  while($row[$n] = mysqli_fetch_array($result)){
    $id[$n]=$row[$n]['id'];
    $email[$n] = $row[$n]['email'];
    $nickname[$n] = $row[$n]['nickname'];
    $age[$n] = $row[$n]['age'];
    $weight[$n] = $row[$n]['weight'];
    $sex[$n] = $row[$n]['sex'];
    $join[$n] = $row[$n]['createdAt'];
    $n++;
  }


  mysqli_close($conn);
?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
function changeWeight(){
    $.ajax({
            type: "POST",
            url: "./action/changeWeight.php",
            data: {
                changeId: $('#changeId').val(),
                weight: $('#weight').val()
            }
        }).then(function(){
            
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
        });
}
</script>
<!-- record -->
<div id="memberView">

<div class="modal fade" id="mySmallModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="margin-left:200px">
  <div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content" >
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
        <h4 class="modal-title" id="myModalLabel">작은 Modal 제목</h4>
      </div>
      <div class="modal-body">
      <label for="fname">아이디:</label>
  <input type="text" id="changeId" name="weight">
  <br>
  <label for="fname">가중치:</label>
  <input type="text" id="weight" name="weight">

      </div>
      <div class="modal-footer">
        <button type="button" onclick="changeWeight()" class="btn btn-default" data-dismiss="modal">변경</button>
      </div>
    </div>
  </div>
</div>

    <!-- Panel Table Add Row -->
    <div class="panel" >
        <header class="panel-heading ">
            <h3 class="panel-title">회원 리스트</h3>
        </header>
        <div class="panel-body" id="table_panel">
            <div id="result">
                <table class="dataTables_wrapper" id="exampleAddRow">
                    <thead>
                        <tr align='center'>
                            <th>아이디</th>
                            <th>이메일</th>
                            <th>닉네임</th>
                            <th>나이</th>
                            <th>성별</th>
                            <th>가중치</th>
                            <th>가입일</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
              for($i=0;$i<$n;$i++){
                echo "<tr class='gradeA' align='center'>";
                echo "<td>".$id[$i]."</td>";
                echo "<td>".$email[$i]."</td>";
                echo "<td>".$nickname[$i]."</td>";
                echo "<td>".$age[$i]."</td>";
                echo "<td>".$sex[$i]."</td>";
                echo "<td>".$weight[$i]."
                </td>";
                echo "<td>".$join[$i]."</td>";
                echo "</tr>";
              }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#mySmallModal'>
  가중치변경
</button>


<script>

    function setTable() {
        $('#exampleAddRow').DataTable();
    }
    $(document).ready(function(){
        setTable();
        
    });
</script>