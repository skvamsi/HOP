<?php

    include("connection.php"); // Assuming this file includes your database connection

    // Check if the session variable 'id' is set
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    if(isset($_POST['z-btn'])) {
        // Retrieve form data
        $c1 = $_POST['y1'] ?? null;
        $c2 = $_POST['y2'] ?? null;
        $c3 = $_POST['y3'] ?? null;
        $c4 = $_POST['y4'] ?? null;
        $c5 = $_POST['y5'] ?? null;
        $c6 = $_POST['y6'] ?? null;
            
            $query = "SELECT * FROM barcharts";
            $res = $con->query($query);
            $rows = mysqli_num_rows($res);
            if($rows >= 3) {
                $sql1 = "TRUNCATE barcharts";
                $rd = mysqli_query($con, $sql1);
                if($rd){
                    $sql = "INSERT INTO barcharts (years, data, admin_id) VALUES($c1, $c4, $id)";
                    mysqli_query($con, $sql);
                    $sql = "INSERT INTO barcharts (years, data, admin_id) VALUES($c2, $c5, $id)";
                    mysqli_query($con, $sql);
                    $sql = "INSERT INTO barcharts (years, data, admin_id) VALUES($c3, $c6, $id)";
                    mysqli_query($con, $sql);
                }
            }else{
            	$sql = "INSERT INTO barcharts (years, data, admin_id) VALUES($c1, $c4, $id)";
            	mysqli_query($con, $sql);
            	$sql = "INSERT INTO barcharts (years, data, admin_id) VALUES($c2, $c5, $id)";
            	mysqli_query($con, $sql);
            	$sql = "INSERT INTO barcharts (years, data, admin_id) VALUES($c3, $c6, $id)";
            	mysqli_query($con, $sql);
            }
	}
}



 // pie charts data entry


    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        
        if(isset($_POST['p-btn'])) {
            // Retrieve form data
            $c1 = $_POST['p1'] ?? null;
            $c2 = $_POST['p2'] ?? null;
            $c3 = $_POST['p3'] ?? null;
            $c4 = $_POST['p4'] ?? null;
            $c5 = $_POST['p5'] ?? null;
            $c6 = $_POST['p6'] ?? null;
            
            $query = "SELECT * FROM piecharts";
            $res = $con->query($query);
            $rows = mysqli_num_rows($res);
            if($rows >= 3) {
                $sql1 = "TRUNCATE piecharts";
                $rd = mysqli_query($con, $sql1);
                if($rd){
                    $sql = "INSERT INTO piecharts (years, data, admin_id) VALUES($c1, $c4, $id)";
                    mysqli_query($con, $sql);
                    $sql = "INSERT INTO piecharts (years, data, admin_id) VALUES($c2, $c5, $id)";
                    mysqli_query($con, $sql);
                    $sql = "INSERT INTO piecharts (years, data, admin_id) VALUES($c3, $c6, $id)";
                    mysqli_query($con, $sql);
                }
            }else{
                $sql = "INSERT INTO piecharts (years, data, admin_id) VALUES($c1, $c4, $id)";
                mysqli_query($con, $sql);
                $sql = "INSERT INTO piecharts (years, data, admin_id) VALUES($c2, $c5, $id)";
                mysqli_query($con, $sql);
                $sql = "INSERT INTO piecharts (years, data, admin_id) VALUES($c3, $c6, $id)";
                mysqli_query($con, $sql);
            }
    }
}
?>
