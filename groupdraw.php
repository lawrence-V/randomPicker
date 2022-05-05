<?php require 'connection.php'; 

if(isset($_POST['groupid']) and isset($_POST['groupdatetime']) and isset($_POST['pl'])){
    $data = json_decode(stripslashes($_POST['groupid']));

    // here i would like use foreach:
        global $conn;
        $return_arr = array();
        // echo count($data);
    foreach($data as $d){
// echo $d;

    $winnerID = $d;
    $date = $_POST['groupdatetime'];
    $place = $_POST['pl'];

  

    mysqli_query($conn, "INSERT INTO groupwinner SET winner_id='$winnerID',date='$date', place='$place'");



    $result = mysqli_query($conn, "SELECT * FROM entries WHERE id='$winnerID'");
            if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            // echo $result;
                            $id = $row['id'];
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $address = $row['address'];
                        $status = $row['status'];

                            $return_arr[] = array("id" => $id,
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "address" => $address);
                        //   echo $row['first_name'];
                       
                        }
                        // Encoding array in JSON format 
                           
                        
                    } else {
                        "<h3> databese is not working</h3>";
                    }
                  
    } //end of foreach

    echo json_encode($return_arr); 
    global $conn;
    $winnerID = $d;
    $date = $_POST['groupdatetime'];

    $return_arr = array();

    mysqli_query($conn, "INSERT INTO groupwinner SET winner_id='$winnerID',datePicked='$date'");

    


    
   
            
        
}

?>