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
            <input type="hidden" id="selected-seat" name="seats" value="">
            <select id="route" name="route">
                <option value="Route 1">Route 1</option>
                <option value="Route 2">Route 2</option>
                <option value="Route 3">Route 3</option>
                <option value="Route 4">Route 4</option>
                <option value="Route 5">Route 5</option>
                <option value="Route 6">Route 6</option>
                <option value="Route 7">Route 7</option>
                <option value="Route 8">Route 8</option>
                <option value="Route 9">Route 9</option>
                <option value="Route 10">Route 10</option>
            </select>
            <br><br><br>

            <div id="seat-container">
                <!-- Seat elements will be generated here using JavaScript -->
            </div>
            <br>

            <input type="submit" name="book" value="Book Seat">
        </form>

        <script>
            // Example JavaScript for generating and selecting seats
            var seatContainer = document.getElementById("seat-container");
            var selectedSeat = null;

            for (var i = 1; i <= 30; i++) {
                if (i % 6 === 1) {
                    var row = document.createElement("div");
                    row.className = "row";
                    seatContainer.appendChild(row);
                }

                var seat = document.createElement("div");
                seat.className = "seat";
                seat.textContent = i;

                seat.addEventListener("click", function () {
                if (selectedSeat !== null) {
                    selectedSeat.classList.remove("selected");
                }
            
                this.classList.add("selected");
                selectedSeat = this;
            
                // Set the selected seat value in a hidden input field
                document.getElementById("selected-seat").value = this.innerText;
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
            $route = isset($_POST["route"]) ? $_POST["route"] : '';
            $selectedSeat = isset($_POST["seats"]) ? $_POST["seats"] : '';

            if (!empty($selectedSeat)) {
                // Fetch additional details from the routes table
                $query = "SELECT * FROM routes WHERE RouteNo = '$route'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                // Extracting values from the fetched row
                $busNo = $row["BusNo"];
                $source = $row["source"];
                $destination = $row["destination"];
                $duration = $row["Duration"];
                $fare = $row["Fare"];

                // Insert booking information into the bookings table
                $bookingAcc = isset($_SESSION["accountName"]) ? $_SESSION["accountName"] : '';
                $query = "INSERT INTO bookings (bookingacc, RouteNo, BusNo, source, destination, Duration, Fare, seats) 
                          VALUES ('$bookingAcc', '$route', '$busNo', '$source', '$destination', '$duration', '$fare', '$selectedSeat')";
                mysqli_query($con, $query);

                echo "You have successfully booked seat $selectedSeat on $route.";
            }
        }
        ?>
    </div>
</body>

</html>
