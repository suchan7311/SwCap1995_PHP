<?php
  
session_start();     

include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM customer_messages";            
$result = mysqli_query($conn,$sql);

$n=0;
  while($row[$n] = mysqli_fetch_array($result)){
    $id[$n]=$row[$n]['id'];
    $title[$n] = $row[$n]['title'];
    $content[$n] = $row[$n]['message'];
    if(empty($row[$n]['answer'])){
        $answer[$n]="답변하지 않았습니다";
    }
        else{
            $answer[$n]=$row[$n]['answer'];
            
        }    
    $n++;
  }


  mysqli_close($conn);
?>

<!-- record -->
<div id="questionView">
    <!-- Panel Table Add Row -->
    <div class="panel">
        <header class="panel-heading ">
            <h3 class="panel-title">문의 리스트</h3>
        </header>
        <div class="panel-body" id="table_panel">
            <div id="result">
                <table class="dataTables_wrapper" id="questionRow">
                    <thead>
                        <tr align='center'>
                            <th>번호</th>
                            <th>제목</th>
                            <th>내용</th>
                            <th>답변</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              for($i=0;$i<$n;$i++){
                echo "<tr class='gradeA' align='center'>";
                echo "<td><a href='javascript:void(0)' class='text-decoration-none address' id='user'".$i." onclick='viewQuestion(this)' >".$id[$i]."</a></td>";
                echo "<td width='300'>".$title[$i]."</td>";
                echo "<td>".$content[$i]."</td>";
                echo "<td>".$answer[$i]."</td>";
                echo "</tr>";
              }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
  function viewQuestion(e){
    var Id = $(e).text();
    $.ajax({
      type : "POST",
      url : "./view/questionAnswer.php",
      data : {
         Id: Id
      }
    }).done(function(data){
        
        $('.w3-main').html(data);
    });
  }
    function setTable() {
        $('#questionRow').DataTable({
            columns: [
                //"dummy" configuration
                {
                    visible: true
                }, //col 1
                {
                    visible: true
                }, //col 2
                {
                    visible: true
                }, //col 3
                {
                    visible: true
                }, //col 3
            ]
        });
    }
        $(document).ready(function () {
            setTable();
        });
</script>