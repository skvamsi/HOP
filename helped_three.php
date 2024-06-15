<?php
session_start();

include("connection.php");

if(isset($_SESSION['id'])) {
    // Sanitize the input
    $id = $_SESSION['id'];

    if(isset($_POST['year'])){
        $dat = $_POST['year'];

        // Prepare SQL statements to avoid SQL injection
        $sql_total = "SELECT SUM(data) AS total_sum FROM piecharts";
        $sql_specific = "SELECT data FROM piecharts WHERE years = ? LIMIT 1";

        // Prepare and bind statement for specific year
        $stmt_specific = $con->prepare($sql_specific);
        $stmt_specific->bind_param("i", $dat);
        $stmt_specific->execute();
        $result_specific = $stmt_specific->get_result();

        // Prepare and execute statement for total sum
        $result_total = $con->query($sql_total);
        $row_total = $result_total->fetch_assoc();
        $total_sum = $row_total['total_sum'];

        // Create CSV file
        $fp = fopen('third_helped.csv', 'w');
        fputcsv($fp, array($total_sum));

        if ($result_specific && $row_specific = $result_specific->fetch_assoc()) {
            fputcsv($fp, array($row_specific['data']));
        } else {
            // Handle case when specific year data is not found
            fputcsv($fp, array('Specific Year Data', 'Not found'));
        }

        fclose($fp);
        exec('third_help.py');

         $sql = "SELECT * FROM datascience_images WHERE id = 7 LIMIT 1";
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
    }
}
?>
