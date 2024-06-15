<?php
    include("connection.php");
    $sql = "SELECT years, data FROM barcharts";
    $result = $con->query($sql);

    // Create CSV file
    $fp = fopen('bar_charts.csv', 'w');
    while($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }
    fclose($fp);

    // // Execute Python script
    exec('bars.py');
    
    $sql = "SELECT * FROM datascience_images WHERE id = 1 LIMIT 1";
            $res = mysqli_query($con, $sql);

            // Check for errors
            if($res === false) {
                echo "Error: " . mysqli_error($con);
            } else {
                // Fetch data
                $data = mysqli_fetch_assoc($res);
                if($data){
                    // Display the image
                    echo "<img src='charts/".$data['images']."' width='100%' height='100%'>";
                } else {
                    // If no image found, display a default image
                    echo "<img src='de.jpg'>";
                }
            }

    $con->close();
    
?>