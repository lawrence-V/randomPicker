
<?php
require_once "conn.php";
$result = mysqli_query($conn, "SELECT * FROM entry1");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select from Database Randomly (Random Query) using PHP/MySQLi</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script language="javascript" src="users.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<form name="frmUser" method="post" action="">
<div class="container">
	<div class="row" style="margin-top:30px;">
		<form method="POST">
			<input type="submit" name="refresh" value="Generate Winners" class="btn btn-primary">
		</form>
	</div>
	<div class="row" style="margin-top:10px;">
	<tr class="listheader">
<td colspan="4"><input type="button" name="update" value="Update" onClick="setUpdateAction();" /> <input type="button" name="delete" value="Delete"  onClick="setDeleteAction();" /></td>

		<table class="table table-bordered table-striped">
			<thead>
				<th>Select</th>
				<th>ID</th>
				<th>Name</th>
				<th>Location</th>
				<th>Status</th>
			</thead>
			<tbody>
				<?php
					//use this if you have small number of data
					include('conn.php');
					$query=mysqli_query($conn,"select * from entry1 WHERE status='' AND status<>'Winner' order by rand() limit 5");

					//for large volume of data
					//include('conn.php');
					//$q=mysqli_query($conn,"select * from tutorial");
					//$num=mysqli_num_rows($q);
					//$limit=10; //limit
					//$random=$limit/$num;
					//$query=mysqli_query($conn,"select * from tutorial order by rand()<=$random limit 5");

					while($row=mysqli_fetch_array($query)){
						?>

<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><input type="checkbox" name="users[]" value="<?php echo $row["id"]; ?>" checked></td>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["location"]; ?></td>
<td><?php echo $row["status"]; ?></td>
</tr>
<?php
$i++;
}
?>
<tr class="listheader">
<td colspan="4"><input type="button" name="update" value="Update" onClick="setUpdateAction();" /> <input type="button" name="delete" value="Delete"  onClick="setDeleteAction();" /></td>

			</tbody>
		</table>
		</form>
	</div>
</div>
</body>
</html>