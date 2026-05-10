<?php
// Function to check room availability
function checkRoomAvailability($check_in_date, $check_out_date) {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch booked rooms for the selected dates
    $sql = "SELECT roomnumb FROM guest WHERE check_out_date > ? AND check_in_date < ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $check_in_date, $check_out_date);
    $stmt->execute();
    $result = $stmt->get_result();

    $booked_rooms = array();
    while ($row = $result->fetch_assoc()) {
        $booked_rooms[] = $row['roomnumb'];
    }

    // Close statement
    $stmt->close();

    // Close database connection
    $conn->close();

    // Initialize array to store available rooms
    $available_rooms = array();

    // Generate available rooms
    for ($i = 1; $i <= 10; $i++) {
        if (!in_array((string)$i, $booked_rooms)) {
            $available_rooms[] = array(
                "room_number" => $i,
                "room_type" => ($i % 2 == 0) ? "Deluxe" : "Suite"
            );
        }
    }

    return $available_rooms;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["check_availability"])) {
    // Retrieve check-in and check-out dates from form
    $check_in_date = $_POST["check_in_date"];
    $check_out_date = $_POST["check_out_date"];

    // Check if selected dates are on weekends
    $is_weekend = (date('N', strtotime($check_in_date)) >= 6) || (date('N', strtotime($check_out_date)) >= 6);

    // Check room availability only if not on weekends
    if (!$is_weekend) {
        $available_rooms = checkRoomAvailability($check_in_date, $check_out_date);
    }
}

// Insert booking into the database
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $room_number = $_GET['room_number'];
    $check_in_date = $_GET['check_in_date'];
    $check_out_date = $_GET['check_out_date'];
    $room_type = $_GET['room_type'];
    $name = $_GET['name'];
    $address = $_GET['address'];
    $contact = $_GET['contact'];
    $email = $_GET['email'];
    $gender = $_GET['gender'];

    // Prepare and bind the insert statement
    $stmt = $conn->prepare("INSERT INTO guest (roomnumb, roomtype, check_in_date, check_out_date, name, address, contact, email, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssss", $room_number, $room_type, $check_in_date, $check_out_date, $name, $address, $contact, $email, $gender);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Booking successful!'); window.location.href = 'Home.html';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Close database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Availability</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="date"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .rooms {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .room {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f8f9fa;
        }
        .room h3 {
            margin-top: 0;
            color: #007bff;
        }
        .room ul {
            list-style: none;
            padding: 0;
        }
        .room ul li {
            margin-bottom: 10px;
        }
        .room a {
            color: #007bff;
            text-decoration: none;
        }
        .room a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Room Availability</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="check_in_date">Check-in Date:</label>
            <input type="date" id="check_in_date" name="check_in_date" value="<?php echo isset($check_in_date) ? $check_in_date : ''; ?>" required>
            <br>
            <label for="check_out_date">Check-out Date:</label>
            <input type="date" id="check_out_date" name="check_out_date" value="<?php echo isset($check_out_date) ? $check_out_date : ''; ?>" required>
            <br>
            <input type="submit" name="check_availability" value="Check Availability">
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
            <?php if ($is_weekend) : ?>
                <h3>Warning: No available rooms on this date.</h3>
            <?php elseif (isset($available_rooms)) : ?>
                <?php if (count($available_rooms) > 0) : ?>
                    <h3>Available Rooms:</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Room Number</th>
                                <th>Room Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($available_rooms as $room) : ?>
                                <tr>
                                    <td><?php echo $room['room_number']; ?></td>
                                    <td><?php echo $room['room_type']; ?></td>
                                    <td><a href='form1.php?room_number=<?php echo $room['room_number']; ?>&check_in_date=<?php echo $check_in_date; ?>&check_out_date=<?php echo $check_out_date; ?>&room_type=<?php echo $room['room_type']; ?>'>Book Now</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h3>No Available Rooms for the selected dates.</h3>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
