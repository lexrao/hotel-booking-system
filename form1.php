<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking and Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #646456475;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidenav a:hover {
            background-color: #ddd;
            color: black;
        }

        .main {
            margin-left: 220px; /* Same as the width of the sidenav */
            padding: 20px;
            flex: 1;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #555;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="sidenav">
    <a href="Home.html">Home</a>
   
    <a href="login1.php" style="margin-top:auto;">ADMIN</a>
</div>

<div class="main">
    <div class="form-container">
        <h1>BOOKING FORM</h1>
        <form action="insert1.php" method="POST" enctype="multipart/form-data" onsubmit="showConfirmation(event)">
            <?php
            // Retrieve parameters from the URL
            $room_number = $_GET['room_number'];
            $check_in_date = $_GET['check_in_date'];
            $check_out_date = $_GET['check_out_date'];
            $room_type = $_GET['room_type'];
            ?>
            <input type="hidden" name="room_number" value="<?php echo $room_number; ?>">
            <input type="hidden" name="check_in_date" value="<?php echo $check_in_date; ?>">
            <input type="hidden" name="check_out_date" value="<?php echo $check_out_date; ?>">
            Room Type: <input type="text" name="room_type" value="<?php echo $room_type; ?>" readonly><br>
            Room Number: <input type="text" name="room_number" value="<?php echo $room_number; ?>" readonly><br>
            Check-in Date: <input type="text" name="check_in_date" value="<?php echo $check_in_date; ?>" readonly><br>
            Check-out Date: <input type="text" name="check_out_date" value="<?php echo $check_out_date; ?>" readonly><br>

            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>

            <label for="contact">Contact Number</label>
            <input type="text" id="contact" name="contact" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <input type="submit" name="submit" value="BOOK">
        </form>
    </div>
</div>

</body>
</html>
