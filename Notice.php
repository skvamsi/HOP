<?php
include("connection.php");
// Fetch data from the database
$sql = "SELECT * FROM emergency";
$result = $con->query($sql);

// Store the data in an array
$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
// Close the connection


// Convert the data to JSON format
$json_data = json_encode($data);
?>