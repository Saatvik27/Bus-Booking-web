<!DOCTYPE html>
<html>
<head>
    <title>Bus Booking System</title>
    <style>
        body {
            background: linear-gradient(139.06deg, #2b3693 1.86%, #0a0e30 56.22%);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
        }
        div.navbar {
            background-color: #333;
            overflow: hidden;
            text-align: center; /* Center-align the navigation bar */
        }
        div.navbar a {
            display: inline-block; /* Display links as inline-block to control spacing */
            color: white;
            text-align: center;
            padding: 16px 30px;
            text-decoration: none;
        }
        div.navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        .content {
            padding: 20px;
            text-align: center; /* Center-align the content */
        }
        h2 {
            color: #ddd;
            padding: 10px;
        }
        form {
            margin-top: 20px;
        }
        select {
            padding: 8px;
        }
        .routes-table {
            width: 80%;
            margin: 20px auto; /* Adjusted margin to include space between the form and table */
            color: #ddd;
            border-collapse: collapse;
        }
        .routes-table th,
        .routes-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .routes th {
            background-color: #333;
            color: white;
            padding: 10px;
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
        <div class="content routes">
            <h2>Welcome To Our Website!</h2>
            <h2>Your Bookings</h2>
            <table class="routes-table">
                <tbody>
                <?php
// Connect to your database
$con = mysqli_connect("localhost", "root", "", "ids");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Start the session
session_start();

// Check if the account name is set
if (isset($_SESSION['accountName'])) {
    $accountName = $_SESSION['accountName'];

    // Perform the query to fetch bookings for the specified account name
    mysqli_query($con, "use ids");
    $query = "SELECT bookingacc, RouteNo, BusNo, source, destination, Duration, Fare
              FROM bookings
              WHERE bookingacc = '$accountName'"; // Assuming 'username' is the correct column name
    
    // Execute the query
    $result = mysqli_query($con, $query);

    // Check for errors
    if (!$result) {
        die('Query failed: ' . mysqli_error($con));
    }

    // Check if there are any bookings
    if (mysqli_num_rows($result) > 0) {
        // Build the HTML table header
        echo "<table class='routes-table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>BookingAcc</th>";
        echo "<th>RouteNo</th>";
        echo "<th>BusNo</th>";
        echo "<th>Source</th>";
        echo "<th>Destination</th>";
        echo "<th>Duration(hr)</th>";
        echo "<th>Fare(Rs)</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Build the HTML table rows based on the query result
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['bookingacc']}</td>";
            echo "<td>{$row['RouteNo']}</td>";
            echo "<td>{$row['BusNo']}</td>";
            echo "<td>{$row['source']}</td>";
            echo "<td>{$row['destination']}</td>";
            echo "<td>{$row['Duration']}</td>";
            echo "<td>{$row['Fare']}</td>";
            echo "</tr>";
        }

        // Close the table
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No bookings found.</p>";
    }
} else {
    // Redirect to the login page if the account name is not set
    header("Location: login.php");
    exit(); // Make sure to exit after a header redirect
}

// Close the database connection
mysqli_close($con);

?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Your JavaScript Code -->



</body>
</html>
