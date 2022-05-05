<?php
require 'connection.php'; 
global $conn;
// SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
// FROM Orders
// INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
$single = mysqli_query($conn, "SELECT  entries.first_name, entries.last_name, entries.address, singlewinner.id,singlewinner.datePicked FROM entries INNER JOIN singlewinner ON entries.id=singlewinner.winner_id ORDER BY  singlewinner.id");
$group = mysqli_query($conn, "SELECT  entries.first_name, entries.last_name, entries.address, groupwinner.id ,groupwinner.place, groupwinner.date FROM entries INNER JOIN groupwinner ON entries.id=groupwinner.winner_id ORDER BY groupwinner.id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Winner Picker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./all_List.php">All list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./list_Winner.php">List Winner</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <div>
        <div class="card text-center">
            <h1>List of all Winners</h1>
        </div>

    </div>

    <div class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="card">
            <h5 class="card-header text-center">Single draw</h5>
            <?php
            if ($single->num_rows > 0) {
                ?>
            <ol class="list-group list-group-numbered" id="display">
            <?php  while($row = $single->fetch_assoc()) {?>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold"><?php echo $row['first_name']?></div>
                  <?php echo $row['address']?>
                
                </div>
                <span class="badge text-dark "><?php echo $row['datePicked']?></span>
              </li>
              <?php }?>
            </ol>
            <?php }?> 
          </div>
        </div>
        <div class="col-lg">
          <div class="card ">
            <h5 class="card-header text-center">Group draw</h5>
            <?php
            if ($group->num_rows > 0) {
                ?>
            <ol class="list-group " id="display">
            <?php  while($row = $group->fetch_assoc()) {?>
             
              <?php if($row['place'] % 2 == 0){?>
               <li class="list-group-item d-flex justify-content-between align-items-start">
              <span class="badge text-dark bg-warning"><?php echo $row['place']?></span>
                <div class="ms-2 me-auto">
                  <div class="fw-bold"><?php echo $row['first_name']?></div>
                  <?php echo $row['address']?>
                
                </div>
                <span class="badge text-dark "><?php echo $row['date']?></span>
              </li>
              <?php }?> 

              <?php if($row['place'] % 2 != 0){?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
              <span class="badge bg-success"><?php echo $row['place']?></span>
                <div class="ms-2 me-auto">
                  <div class="fw-bold"><?php echo $row['first_name']?></div>
                  <?php echo $row['address']?>
                
                </div>
                <span class="badge text-dark "><?php echo $row['date']?></span>
              </li>
              <?php }?> 
              <?php }?> 
           

              <?php }?>
            </ol>
          

          </div>
        </div>
      </div>
    </div>
  </div>





</body>

</html>