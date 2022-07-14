<?php
header('refresh:5');
$conn = mysqli_connect("localhost","root","","mca");
// if(!$conn){
//     echo "Failed connection";
// }else{
//     echo "Connection done"."<br>";

$temp = "SELECT excellent FROM feedback";
$result = mysqli_query($conn, $temp);
$row = mysqli_fetch_assoc($result);
$a = $row['excellent'];
// echo $row['excellent']."<br>";

$temp = "SELECT good FROM feedback";
$result = mysqli_query($conn, $temp);
$row = mysqli_fetch_assoc($result);
$b = $row['good'];
// echo $row['good']."<br>";

$temp = "SELECT poor FROM feedback";
$result = mysqli_query($conn, $temp);
$row = mysqli_fetch_assoc($result);
$c = $row['poor'];
// echo $row['poor']."<br>";
mysqli_close($conn);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([

        ['Feedback', 'MRIIRS'],
        ['Excellent', <?php echo $a ?>],        
        ['Good',      <?php echo $b ?>],
        ['Poor',      <?php echo $c ?>],
         
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
