<?php require 'connection.php'; 

if(isset($_POST['id'])){
    global $conn;
    $winnerID = $_POST['id'];
    $date = $_POST['datetime'];
    echo $date;
    $return_arr = array();
    $result = mysqli_query($conn, "SELECT * FROM entries WHERE id='$winnerID'");
    if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    //echo $result;
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $address = $row['address'];

                    $return_arr[] = array("id" => $id,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "address" => $address);
                //   echo $row['first_name'];
                }
                // Encoding array in JSON format
                    echo json_encode($return_arr);
            } else {
                "<h3> databese is not working</h3>";
            }
            
   
}

?>