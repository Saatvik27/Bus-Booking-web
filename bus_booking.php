<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bus Booking System</title>
    <style>
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: linear-gradient(139.06deg, #2b3693 1.86%, #0a0e30 56.22%);
            font-family: Arial, sans-serif;
            color: white;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            text-align: center;
        }

        .navbar a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 16px 30px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            text-align: center;
        }

        h1,
        h3 {
            font-family: Arial, sans-serif;
            color: white;
        }

        .seat {
            width: 50px;
            height: 50px;
            background-color: #ccc;
            margin: 5px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            display: inline-block;
            color: #333;
        }

        .row {
            margin-bottom: 10px;
        }

        .selected {
            background-color: #00ff00;
        }

        .content {
            padding: 20px;
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="home_page.php">HOME</a>
        <a href="routes.php">ROUTES</a>
        <a href="bus_booking.php">BOOK</a>
        <a href="bookings.php">BOOKINGS</a>
        <a href="help.php">HELP</a>
        <a href="profile.php">PROFILE</a>
    </div>
    <div class="container">
        <h1>Select Seats</h1>
        <form method="post">
            <label for="route">
                <h3>Select Route:</h3>
            </label>
            <select id="route" name="route">
                <option value="Route A">Route A</option>
                <option value="Route B">Route B</option>
            </select>
            <br><br><br>

            <div id="seat-container">
                <!-- Seat elements will be generated here using JavaScript -->
            </div>
            <br>

            <input type="submit" name="book" value="Book Seats">
        </form>

        <script>
            // Example JavaScript for generating and selecting seats
            var seatContainer = document.getElementById("seat-container");
            var numSeats = 30;
            var seatsPerRow = 5;

            for (var i = 1; i <= numSeats; i++) {
                if (i % seatsPerRow === 1) {
                    var row = document.createElement("div");
                    row.className = "row";
                    seatContainer.appendChild(row);
                }

                var seat = document.createElement("div");
                seat.className = "seat";
                seat.textContent = i;

                seat.addEventListener("click", function () {
                    if (this.classList.contains("selected")) {
                        this.classList.remove("selected");
                    } else {
                        this.classList.add("selected");
                    }
                });

                row.appendChild(seat);
            }
            
        </script>

<?php
        $con = mysqli_connect("localhost", "root", "", "ids");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book"])) {
            $route = $_POST["route"];
            $selectedSeats = isset($_POST["seats"]) ? $_POST["seats"] : '';

            // Store selected seats in the bookings table
            if (!empty($selectedSeats)) {
                $query = "INSERT INTO bookings (RouteNo, seat) VALUES ('$route', '$selectedSeats')";
                mysqli_query($con, $query);
            }

            echo "You have successfully booked the following seats on $route: " . $selectedSeats;
        }
        ?>
    </div>
</body>

</html>
