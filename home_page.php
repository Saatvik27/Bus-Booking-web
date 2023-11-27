<!DOCTYPE html>
<html>

<head>
    <title>Bus Booking System</title>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            background: linear-gradient(139.06deg, #2b3693 1.86%, #0a0e30 56.22%);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

        div.content {
            padding: 20px;
            text-align: center; /* Center-align the content */
        }

        h1 {
            color: white;
            font-family: monospace;

        }

        form {
            margin-top: 20px;
        }

        select {
            padding: 8px;
        }
        .container{
            display : flex;
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
    <div class="content">
        <br>
        <h1>Welcome To Our Website!</h1>
        <br>
        <form>
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
            <input type="button" value="SEARCH">
        </form>
    </div>
    
    <script type="text/javascript">

    </script>
    <?php
    $con = mysqli_connect("localhost", "root");
    if (mysqli_connect_errno()) {
        echo "" . mysqli_connect_error();
    }
    mysqli_query($con, "create database if not exists Booking");
    if (mysqli_errno($con)) {
        echo "";
    }
    ?>
</body>

</html>
