<!DOCTYPE html>
<html>
<head>
    <title>Bus Booking System</title>
    <style>
        /* Add your CSS styles for seats here */
        body {
            background: linear-gradient(139.06deg, #2b3693 1.86%, #0a0e30 56.22%);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height:100%;
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
        }
        .row {
            margin-bottom: 10px;
        }
        .selected {
            background-color: #00ff00;
        }
        .content {
            padding: 20px;
            text-align: center; /* Center-align the content */
            color: #333;
        }
        .fontcolor{
            color:#ddd;
        }
    </style>
</head>
<body class="content">
    <h1 class="fontcolor">Select Seats</h1>
    <br>
    <form method="post">
        <label for="route" class="fontcolor">Select Route:</label>
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

        // Get the seat container
        var seatContainer = document.getElementById("seat-container");

        // Number of seats
        var numSeats = 30;

        // Number of seats per row
        var seatsPerRow = 5;

        // Generate and add seat elements to the container
        for (var i = 1; i <= numSeats; i++) {
            if (i % seatsPerRow === 1) {
                // Create a new row for every 'seatsPerRow' seats
                var row = document.createElement("div");
                row.className = "row";
                seatContainer.appendChild(row);
            }

            var seat = document.createElement("div");
            seat.className = "seat";
            seat.textContent = i;

            // Add a click event listener to toggle seat selection
            seat.addEventListener("click", function () {
                if (this.classList.contains("selected")) {
                    this.classList.remove("selected");
                } else {
                    this.classList.add("selected");
                }
            });

            // Append the seat to the current row
            row.appendChild(seat);
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book"])) {
        $route = $_POST["route"];
        $selectedSeats = $_POST["seats"];

        // Add code here to process the selected seats and book them in your system
        // This example does not include a database or actual booking functionality
        // You would typically store booking information in a database and handle payments.

        echo "You have successfully booked the following seats on $route: " . implode(", ", $selectedSeats);
    }
    ?>
</body>
</html>
