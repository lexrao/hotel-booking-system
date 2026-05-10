<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .room-list {
            list-style: none;
            padding: 0;
        }

        .room-item {
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .room-item h2 {
            margin-top: 0;
        }

        .room-description {
            color: #666;
        }

        .room-price {
            font-weight: bold;
            color: #333;
        }

        .book-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .book-button:hover {
            background-color: #555;
        }

        /* Adjust image size */
        .room-image {
            width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Room Menu</h1>
    <ul class="room-list">
        <li class="room-item">
            <img src="https://th.bing.com/th/id/OIP.KW6xLZGZcpwJjQgXnkI35QHaFD?rs=1&pid=ImgDetMain" alt="Single Room" class="room-image">
            <h2>Deluxe single</h2>
            <p class="room-description">A cozy room with a single bed.</p>
            <p class="room-price">#008</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
        <li class="room-item">
            <img src="https://th.bing.com/th/id/R.3b7fb9edcad2f008ece408f74bd0d642?rik=Mtl1BwrBsduthg&riu=http%3a%2f%2fwww.swisshotelkb.com%2fimg%2froom_family_room_ori.jpg&ehk=kvU7FPLBJPqnYnln435pbZdj5rPH3IkfcvsPOxa5o%2fw%3d&risl=&pid=ImgRaw&r=0" alt="Double Room" class="room-image">
            <h2>Deluxe twin</h2>
            <p class="room-description">A spacious room with a double bed.</p>
            <p class="room-price">#002</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
        <li class="room-item">
            <img src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg?width=2119&height=1195&fit=crop&format=pjpg&auto=webp" alt="Deluxe Suite" class="room-image">
            <h2>Deluxe </h2>
            <p class="room-description">Luxurious suite with a king-sized bed and a jacuzzi.</p>
            <p class="room-price">#004</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
        <li class="room-item">
            <img src="https://wallpapercave.com/wp/wp6957266.jpg" alt="Family Room" class="room-image">
            <h2>Deluxe Family</h2>
            <p class="room-description">Spacious room suitable for a family with children.</p>
            <p class="room-price">#006</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
        <li class="room-item">
            <img src="https://th.bing.com/th/id/OIP.eHxX9xeMuM2_sldczGNumAHaE8?rs=1&pid=ImgDetMain" alt="Penthouse Suite" class="room-image">
            <h2>Super Deluxe </h2>
            <p class="room-description">Luxurious penthouse with panoramic views of the city.</p>
            <p class="room-price">#010</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
    </ul>
</div>

</body>
</html>

