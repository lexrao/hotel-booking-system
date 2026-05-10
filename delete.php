<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'hotel');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if ID parameter is provided
if (isset($_GET['id'])) {
    $name = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM `guest` WHERE `NAME`='$name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
