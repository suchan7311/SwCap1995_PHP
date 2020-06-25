<?php
  
session_start();     

include $_SERVER["DOCUMENT_ROOT"]."/phpcapdi/dbconnection.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM report_judges";            
$result = mysqli_query($conn,$sql);
$n=0;
  while($row[$n] = mysqli_fetch_array($result)){
    $id[$n]=$row[$n]['id'];
    $createdAt[$n] = $row[$n]['createdAt'];

    
    $stat[$n] = $row[$n]['result'];
    $n++;
  }
  mysqli_close($conn);
?>


<script>
  function viewReport(e){
    var Id = $(e).text();
    $.ajax({
      type : "POST",
      url : "./view/reportInfo.php",
      data : {
         Id: Id
      }
    }).done(function(data){
        
        $('.w3-main').html(data);
    });
  }
</script>
<!-- record -->
<div id="memberView">
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
                            <th>신고번호</th>
                            <th>신고일시</th>
                            <th>처리여부</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              for($i=0;$i<$n;$i++){
                echo "<tr class='gradeA' align='center'>";
                echo "<td><a href='javascript:void(0)' class='text-decoration-none address' id='user'".$i." onclick='viewReport(this)' >".$id[$i]."</a></td>";
                echo "<td>".$createdAt[$i]."</td>";
                echo "<td>".$stat[$i]."</td>";
                echo "</tr>";
              }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</button>


<script>

    function setTable() {
        $('#exampleAddRow').DataTable();
    }
    $(document).ready(function(){
        setTable();
        
    });
</script>