<?php
$n=0;
  
session_start();     

include $_SERVER["DOCUMENT_ROOT"]."/PMS/dbconnection.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM users";            
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

  while($row[$n] = mysqli_fetch_array($result)){
    $id[$n] = $row[$n]['email'];
    $nickname[$n] = $row[$n]['nickname'];
    $age[$n] = $row[$n]['age'];
    $weight[$n] = $row[$n]['weight'];
    $sex[$n] = $row[$n]['sex'];
    $join[$n] = $row[$n]['createdAt'];
    $n++;
  }


  mysqli_close($conn);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- record -->
<div id="memberView">
    <!-- Panel Table Add Row -->
    <div class="panel">
        <header class="panel-heading ">
            <h3 class="panel-title">회원 리스트</h3>
        </header>
        <div class="panel-body" id="table_panel">
            <div id="result">
                <table class="dataTables_wrapper" id="exampleAddRow">
                    <thead>
                        <tr align='center'>
                            <th>아이디</th>
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
                echo "<td>".$nickname[$i]."</td>";
                echo "<td>".$age[$i]."</td>";
                echo "<td>".$sex[$i]."</td>";
                echo "<td>".$weight[$i]."<button type='button' class='btn btn-primary' id='changeWeight'>가중치변경</button></td>";
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


<script>
    function setTable() {
        $('#exampleAddRow').DataTable();
    }
    $(document).ready(function(){
        setTable();
    });
</script>