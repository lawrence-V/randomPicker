
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
   $sql= "DELETE FROM entry1 WHERE id = 'id'";
   
   
   $result = mysqli_query($connect, $query);
   
   mysqli_close($connect);
}

?>
<?php
$conn = mysqli_connect("localhost", "root", "root", "random") or die("Connection Error: " . mysqli_error($conn));
mysqli_query($conn, "INSERT INTO winners (id, name, location, status, date) VALUES ('".$_POST["id"]."', '".$_POST["name"]."', '".$_POST["location"]."','".$_POST["status"]."','".$_POST["date"]."')");

?>

<!--//Random picker//-->

    <?php
        $random_name = "";
        $conn = mysqli_connect("localhost","root","root","random");
        if(!$conn)
        {
            die("Connection Error!");
        }
        $query_random = "SELECT * FROM entry1 WHERE location='VISAYAS' AND status<>'Winner' ORDER BY RAND() LIMIT 1";

        $result = mysqli_query($conn,$query_random);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
				$random_name = $row["name"];
				$random_status = $row["status"];
				$random_id = $row["id"];
				$random_location = $row["location"];
            }
        }
		
        mysqli_close($conn);
		
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
	<title>Text Animation</title>
	

<body style="background-color:#FFFF00;">

<div class="topnav" id="myTopnav">
  <a href="masterlist.php" >Master List</a>
  <a href="winner.php" >List of Winners</a>
  <a href="index.php" class="active">Generate Winner</a>
  <a href="home.php?logout='1'">Logout</a>
<a><span id='ct5' style="color:white" ></span></a>
</div>
		
<body>

	<!---- <center><img src="kopiko.jpg" alt="Kopiko" width="1390" height="180"></center> --->
		<div class="container">
		<div class="row"><br><br><br><br><br><br><br><br><br><br><br>
			<span class="text1">Congratulations to</span>
			<span class="text2" id="blink"><p><b><?php if(!empty($random_name)){echo $random_name;} ?></p></span>
			<span class="text3"><br>From</span>
			<span class="text2"><?php if(!empty($random_name)){echo $random_location;} ?></span>
						<span class="text3"></span>
							</div>
	        <div><form id="formid" action="index.php" method="post">
			 
            <input type="submit" name="update" id="save" value="Generate Again"> <span id='ct5' style="color:black" ></span>

			</form>
		</div>
		</div>

</body>
		    <script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 850);
    </script>
</html>
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
