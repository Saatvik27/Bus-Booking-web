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
            justify-content: center;
            height: 100vh;
        }

        .content {
            padding: 20px;
            text-align: center; /* Center-align the content */
        }

        h2 {
            color: #ddd;
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

        .routes-table th, .routes-table td {
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
        <a href="#">HOME</a>
        <a href="routes.php">ROUTES</a>
        <a href="bus_booking.php">BOOK</a>
        <a href="bookings.php">BOOKINGS</a>
        <a href="#">HELP</a>
        <a href="#">PROFILE</a>
    </div>
    <div class="container">
        <div class="content">
            <h2>Welcome To Our Website!</h2>
            <form onsubmit="searchRoutes()">
                <select name="From">
                    <option type="disabled">From</option>
                    <option>Delhi</option>
                    <option>Mumbai</option>
                    <option>Banglore</option>
                    <option>Pune</option>
                    <option>Indore</option>
                </select>&emsp;&emsp;&emsp;
                <select name="To">
                    <option type="disabled">To</option>
                    <option>Nagpur</option>
                    <option>Manali</option>
                    <option>Vishakhapatnam</option>
                    <option>Pune</option>
                    <option>Jaipur</option>
                </select>&emsp;&emsp;&emsp;
                <input type="submit" value="SEARCH">
            </form>
        </div>
        <div class="content routes">
            <table class="routes-table">
                <tr>
                    <th>RouteNo</th>
                    <th>BusNo</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Duration(hr)</th>
                    <th>Fare(Rs)</th>
                </tr>
               <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Delhi</td>
                    <td>Manali</td>
                    <td>5</td>
                    <td>2300</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Delhi</td>
                    <td>Manali</td>
                    <td>5</td>
                    <td>2300</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Delhi</td>
                    <td>Manali</td>
                    <td>5</td>
                    <td>2300</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Delhi</td>
                    <td>Manali</td>
                    <td>5</td>
                    <td>2300</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Delhi</td>
                    <td>Manali</td>
                    <td>5</td>
                    <td>2300</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Delhi</td>
                    <td>Manali</td>
                    <td>5</td>
                    <td>2300</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Delhi</td>
                    <td>Manali</td>
                    <td>5</td>
                    <td>2300</td>
                </tr>

            </table>
        </div>
    </div>
    <script type="text/javascript">
    function searchRoutes() {
        var from = document.getElementsByName("From")[0].value;
        var to = document.getElementsByName("To")[0].value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update the routes table with the response from the server
                document.querySelector(".routes-table tbody").innerHTML = xhr.responseText;
            }
        };

        // Send a GET request to your PHP script with the selected "From" and "To" values
        xhr.open("GET", "search_routes.php?from=" + from + "&to=" + to, true);
        xhr.send();
        return false;
    }
</script>


    <?php
    // Connect to your database
    $con = mysqli_connect("localhost", "root", "", "Booking");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Get the values from the GET request
    $from = mysqli_real_escape_string($con, $_GET['from']);
    $to = mysqli_real_escape_string($con, $_GET['to']);

    // Perform the search query based on your database structure and conditions
    $query = "SELECT * FROM routes WHERE `From` = '$from' AND `To` = '$to'";
    $result = mysqli_query($con, $query);

    // Build the HTML table rows based on the search result
    $rows = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $rows .= "<tr>";
        $rows .= "<td>{$row['RouteNo']}</td>";
        $rows .= "<td>{$row['BusNo']}</td>";
        $rows .= "<td>{$row['source']}</td>";
        $rows .= "<td>{$row['destination']}</td>";
        $rows .= "<td>{$row['Duration']}</td>";
        $rows .= "<td>{$row['Fare']}</td>";
        $rows .= "</tr>";
    }

    echo $rows;

    // Close the database connection
    mysqli_close($con);
    ?>
</body>

</html>
