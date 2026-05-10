<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Booking and Reservation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }
        .navbar {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            position: fixed;
            height: 100%;
            padding-top: 20px;
            color: white;
            transition: width 0.3s;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: background-color 0.3s, padding 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
            padding-left: 30px;
        }
        .main-content {
            margin-left: 240px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .table-container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .table-container h2 {
            margin-top: 0;
            font-size: 28px;
            color: #333;
        }
        .search-form {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }
        .search-form input {
            padding: 10px;
            width: calc(100% - 120px);
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .search-form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-form button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9ecef;
        }
        .action-links a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .action-links .update {
            background-color: #28a745;
            border: 1px solid #28a745;
        }
        .action-links .update:hover {
            background-color: #218838;
        }
        .action-links .delete {
            background-color: #dc3545;
            border: 1px solid #dc3545;
        }
        .action-links .delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="navbar">
    ADMIN DASHBOARD
</div>

<div class="sidebar">
    <a href="Admin.php">Admin</a>
    <a href="form1.php">Logout</a>
</div>

<div class="main-content">
    <div class="table-container">
        <h2>Data Entries</h2>
        <form class="search-form" method="GET" action="">
            <input type="text" name="q" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>

        <table>
            <tr>
                <th>Room Type</th>
                <th>Room no.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Gender</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
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

            // Handle search query
            $search = isset($_GET['q']) ? $_GET['q'] : '';

            // Fetch data from the database
            if ($search) {
                $sql = "SELECT roomtype, roomnumb, name, address, contact, email, gender FROM guest WHERE name LIKE ?";
                $stmt = $conn->prepare($sql);
                $search_param = "%" . $search . "%";
                $stmt->bind_param("s", $search_param);
            } else {
                $sql = "SELECT roomtype, roomnumb, name, address, contact, email, gender FROM guest";
                $stmt = $conn->prepare($sql);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['roomtype'] . "</td>";
                    echo "<td>" . $row['roomnumb'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td class='action-links'><a class='update' href='update_delete.php?edit=" . $row['roomtype'] . "'>UPDATE</a></td>";
                    echo "<td class='action-links'><a class='delete' href='update_delete.php?delete=" . $row['roomtype'] . "'>DELETE</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No data found</td></tr>";
            }

            $stmt->close();
            $conn->close();
            ?>
        </table>
    </div>
</div>

</body>
</html>
