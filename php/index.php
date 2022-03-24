<?php

/**
 * Kinda messy code here. This is just an example.
 * I'm sure you can redo it better and nicer. But for testing it has done its job. That's what it was meant for.
 */

// DB Connection
$mysqli = require('YOUR_SQL_CONFIGURATION_HERE');

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_STRICT);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Check for general UPDATE request
if(isset($_GET['site']) && isset($_GET['count'])) {

    // Collect Information
    $site = $mysqli->real_escape_string($_GET['site']);
    $count = ($_GET['count'] == 'true') ? true : false;
    $timestamp = time();
    $id = uniqid();
    
    if(!$count) die("blob");

    // Prepare Statement
    $stmt = $mysqli->prepare("INSERT INTO tracking_general (unix_timestamp, page, id) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $timestamp, $site, $id);
    
    // Execute Statement
    $stmt->execute();

    echo "ok";

} else {

    // If it isn't UPDATE, try GET
    if(isset($_GET['fetch']) && isset($_GET['site']) && isset($_GET['location'])) {

        // Collect Information
        $site = $mysqli->real_escape_string($_GET['site']);
        $location = $mysqli->real_escape_string($_GET['location']);

        // Prepare Statement
        if($location === "exact_loc") {
            $stmt = $mysqli->prepare("SELECT * FROM tracking_general WHERE page = ?");      
        } elseif($location === 'host_only') {
            $site = $site . "%";
            $stmt = $mysqli->prepare("SELECT * FROM tracking_general WHERE page LIKE ?");
        } else {
            echo "invalid location";
            exit();
        }
        $stmt->bind_param("s", $site);
        
        // Execute Statement
        $stmt->execute();
        $result = $stmt->get_result();
        echo $result->num_rows;

    } else {
        echo "invalid request";
    }

}
