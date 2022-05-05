<?php
require_once 'connection.php';
$result = mysqli_query($conn, "SELECT * FROM entries")

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

    <?php
    if (mysqli_num_rows($result)>0){
        ?>
  
    <div>
        <div class="card text-center">
            <h1>Master list of the participants</h1>
        </div>

    </div>

    <?php
    while($row = mysqli_fetch_array($result)){
        ?>
    
    <div class="list-group">
      


        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $row["first_name"]. " ".$row["last_name"]?></h5>
               
            </div>
            <p class="mb-1"><?php echo $row["address"]?></p>
           
        </a>
     
    </div>
    <?php
    }?>
<?php
  }else{
      echo "No Result";
  }
?>



</body>

</html>