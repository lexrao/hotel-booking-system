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
            <img src="https://media.karousell.com/media/photos/products/2022/6/17/hotel_sogo_regency_room_stay_f_1655441620_3d552553" alt="Single Room" class="room-image">
            <h2>Suite Classic</h2>
            <p class="room-description">A cozy room with a single bed.</p>
            <p class="room-price">#001</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
        <li class="room-item">
            <img src="https://th.bing.com/th/id/OIP.R7OWaA4M8ivUBfzoYQiOJAHaE8?rs=1&pid=ImgDetMain" alt="Double Room" class="room-image">
            <h2>Suite Double </h2>
            <p class="room-description">A spacious room with a double bed.</p>
            <p class="room-price">#003</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
        <li class="room-item">
            <img src="https://th.bing.com/th/id/R.fa4826c27adbdd9c6ba12d7201c6df55?rik=U2NMPMtBxT8Ldg&riu=http%3a%2f%2fpagesleepinn.com%2fwp-content%2fuploads%2f2015%2f07%2fAZ377SNKQ1.jpg&ehk=p04Fg%2fCXQKiSl6fhwmxl5YxxOVmpDLyjx4Q6%2brglRII%3d&risl=&pid=ImgRaw&r=0" alt="Deluxe Suite" class="room-image">
            <h2>Deluxe Suite</h2>
            <p class="room-description">Luxurious suite with a king-sized bed and a jacuzzi.</p>
            <p class="room-price">#005</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
        <li class="room-item">
            <img src="https://th.bing.com/th/id/OIP.Po0g0OI0TrfhASyOBdv2uQAAAA?rs=1&pid=ImgDetMain" alt="Family Room" class="room-image">
            <h2>Family Suite</h2>
            <p class="room-description">Spacious room suitable for a family with children.</p>
            <p class="room-price">#007</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
        <li class="room-item">
            <img src="https://806d2bf04cf5fa54997a-e7c5344b3b84eec5da7b51276407b19c.ssl.cf1.rackcdn.com/responsive/1536/806d2bf04cf5fa54997a-e7c5344b3b84eec5da7b51276407b19c.ssl.cf1.rackcdn.com/u/conservatorium/rooms/penthouse/Penthouse-Suite---900--1-.jpg" alt="Penthouse Suite" class="room-image">
            <h2>Penthouse Suite</h2>
            <p class="room-description">Luxurious penthouse with panoramic views of the city.</p>
            <p class="room-price">#009</p>
            <a href="room_availability.php" class="book-button">Book Now</a>
        </li>
    </ul>
</div>

</body>
</html>
