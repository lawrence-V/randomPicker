<?php require 'connection.php'; ?>

function get_all_data()
{

    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM entry_list");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
          
        

            <ul class="list-group list-group-horizontal">
            <li class="list-group-item">Title: ' . htmlspecialchars_decode($row['Firstname']) . '</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
        </ul>
     
        

         ';
        }
    } else {
        "<h3> databese is not working</h3>";
    }
}