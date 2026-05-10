<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'hotel');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if ID parameter is provided
if (isset($_GET['id'])) {
    $name = $_GET['id'];

    // Retrieve guest information based on ID
    $sql = "SELECT * FROM `guest` WHERE `NAME`='$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display update form
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Guest</title>
            <link rel="stylesheet" href="sars.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        </head>

        <body>
            <div class="container">
                <h2>Update Guest Information</h2>
                <form action="update.php" method="POST">
                    <input type="hidden" name="name" value="<?php echo $row['NAME']; ?>">
                    <label for="address">Address:</label><br>
                    <input type="text" id="address" name="address" value="<?php echo $row['ADDRESS']; ?>"><br>
                    <label for="contact">Contact Number:</label><br>
                    <input type="text" id="contact" name="contact" value="<?php echo $row['CONTACT']; ?>"><br>
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" value="<?php echo $row['EMAIL']; ?>"><br>
                    <label for="gender">Gender:</label><br>
                    <input type="text" id="gender" name="gender" value="<?php echo $row['GENDER']; ?>"><br><br>
                    <input type="submit" value="Update">
                </form>
            </div>
        </body>

        </html>
        <?php
    } else {
        echo "No guest found with that name.";
    }
} else {
    echo "No guest ID provided.";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // Update query
    $sql = "UPDATE `guest` SET `ADDRESS`='$address', `CONTACT`='$contact', `EMAIL`='$email', `GENDER`='$gender' WHERE `NAME`='$name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
