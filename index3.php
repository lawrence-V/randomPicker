
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Raffle Draw</title>
    <meta name="description" content="Php Name Generator - Project 1">
    <meta name="author" content="MyCatGray">
    <link rel="stylesheet" href="cssrandom/styles.css?v=1.0">
    <?php
        $random_name = "";
        $conn = mysqli_connect("localhost","root","root","random");
        if(!$conn)
        {
            die("Connection Error!");
        }
        $query_random = "SELECT name FROM entry1 WHERE location='VISAYAS' AND status<>'Winner' ORDER BY RAND() LIMIT 1";

        $result = mysqli_query($conn,$query_random);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
				$random_name = $row["id"];
				$random_name = $row["name"];
            }
        }
		
        mysqli_close($conn);
		
    ?>
		<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "root";
   $databaseName = "random";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   // get values form input text and number
   
   $id = $_POST['id'];
   $name = $_POST['name'];
   $location = $_POST['location'];
   $status = $_POST['status'];
           
   // mysql query to Update data
   $query = "UPDATE `entry1` SET `name`='".$name."',`location`='".$location."',`status`='".$status."' WHERE `id` = $id";
   
   $result = mysqli_query($connect, $query);
   
   mysqli_close($connect);
}

?>


</head>

<body>
<div class="topnav" id="myTopnav">
  <a href="masterlist.php" >Master List</a>
  <a href="index.php" class="active">Generate Winner</a>
  <a href="winnerbackup.php">Generate Backup Winner</a>
  <a href="bulk.php">Generate Minor Prices</a>
  <a href="home.php?logout='1'">Logout</a>
<a><span id='ct5' ></span></a>
</div>

<!----- <center><img src="../admin/kopiko.jpg" alt="Kopiko" width="1390" height="250"></center> --->
    <div id="container"><br><br><br><br><br><br><br><br>
        <p style="font-size:60px">Generate the Winner</p>
						<!--- index11 --->		
        <div><form action="index2.php"><input type="submit" value="Click me" size="50"></form></div>
    </div>
</body>
	<script>
function display_ct5() {
var x = new Date()
var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';

var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
document.getElementById('ct5').innerHTML = x1;
display_c5();
 }
 function display_c5(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct5()',refresh)
}
display_c5()
</script>
</html>


<!----------------
https://kodesmart.com/kode/php-name-generator/#google_vignette