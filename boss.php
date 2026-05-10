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
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            margin: 20px auto;
            max-width: 500px;
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
        input[type="number"],
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

        .required::after {
            content: "*";
            color: red;
            margin-left: 3px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="Home.html">Home</a>
    <a href="reserve.html">Reservation</a>
    <a href="Admin.php">records</a>
</div>

<div class="content">
    <div class="form-container">
        <h1>BOOKING FORM</h1>
        <form action="insert1.php" method="POST" enctype="multipart/form-data" onsubmit="showConfirmation(event)">
            <label for="roomtype" class="required">Room Type</label>
            <select id="roomtype" name="roomtype" required>
                <option value="deluxe">Deluxe</option>
                <option value="suite">Suite</option>
            </select>

            <label for="roomnumb" class="required">Room Number</label>
            <input type="number" id="roomnumb" name="roomnumb" required>

            <label for="name" class="required">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="address" class="required">Address</label>
            <input type="text" id="address" name="address" required>

            <label for="contact" class="required">Contact Number</label>
            <input type="text" id="contact" name="contact" required>

            <label for="email" class="required">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="gender" class="required">Gender</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

</body>
</html>
