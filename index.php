<?php

$con= mysqli_connect('localhost','root','' ); 
$selectdb= mysqli_select_db($con,'pgrun');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG_Run_Data</title>
    <link rel="stylesheet" href="pgrun.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="menubar">
        <ul>
            <li><a href="Home">Home</a></li>
            <li><a href="Home">Site</a></li>
            <li><a href="Home">PG_Run_Data</a></li>
            <li><a href="Home">PG_No</a></li>
        </ul>
    </div>
    <div> <br><br>
    <div>
        <h2><b>PG Run  Data Update Form</b></h2>
    </div>

    <!-- PHP code for file sending to database -->

    <?php
    $con= mysqli_connect('localhost','root','' ); 
    $selectdb= mysqli_select_db($con,'pgrun');
    
if(isset($_POST['date']) && isset($_POST['siteName']) && isset($_POST['startTime']) && isset($_POST['stopTime']) ){
    $date= $_POST['date'];
    $siteName= $_POST['siteName'];
    $startTime=$_POST['startTime'];
    $stopTime=$_POST['stopTime'];
   if(!empty($date) && !empty($siteName) && !empty($startTime) && !empty($stopTime)) {
   
   $sqlinsert= " INSERT INTO pgrundata VALUES ( '', '$date','$siteName','$startTime','$stopTime','') ";
   $sql_quary= mysqli_query($con,$sqlinsert);
   } else
   { echo ' please fill up all fields';}
   }
    ?>

    <!-- HP code for file sending to database  End -->

        <form action="index.php" method="post" id="inputform">
            <label for="Date">Date:</label>
            <input type="Date" name="date"><br><br>
            <label for="site Name">Site Name:</label>
            <input type="siteName" name="siteName" required ><br><br>
            <label for="starttime">Start Time:</label>
            <input type="time" name="startTime" required><br><br>
            <label for="stoptime">Stop Time:</label>
            <input type="time" name="stopTime"><br><br>
            <input type="submit" name="submit">
        </form>
    </div>

    <br><br>
    <div>

    <!-- PHP code for file display from database  -->
<?php

$con= mysqli_connect('localhost','root','' ); 
$selectdb= mysqli_select_db($con,'pgrun');

$selectpg= "SELECT * FROM pgrundata";
$quarypg= mysqli_query($con,$selectpg);
?>
<!-- <?php echo "<h2> PG Run Record Table</h2>" ?>; -->

<div>
    <h2>PG Run Record Table</h2>
</div>
<?php
echo "<table id= 'tablepgrun'>
<tr>
<th>SN</th>
<th>Date</th>
<th>Date</th>
<th>Pg Start Time</th>
<th>Pg Stop Time</th>
<th>Remarks</th>
</tr>";

while($data= mysqli_fetch_array($quarypg)){
echo "<tr>";
    echo "<td>".$data['SN no']."</td>";
    echo "<td>".$data['Date']."</td>";
    echo "<td>".$data['Site ID']."</td>";
    echo "<td>".$data['Pg Start Time']."</td>";
    echo "<td>".$data['Pg Stop Time']."</td>";
    echo "<td>".$data['Remarks']."</td>";
    
    echo "</tr>";


}
echo "</table>";
 ?>

 <!-- PHP code for file display from database  -->

    </div>
    
</body>
</html>