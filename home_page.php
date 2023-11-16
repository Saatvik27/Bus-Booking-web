<!DOCTYPE html>
<html>

<head>
    <title>Bus Booking System</title>
    <style>
        body {
            background-color: #f2f2f2;
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

        h2 {
            color: #333;
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
        <a href="#">HOME</a>
        <a href="#">ROUTES</a>
        <a href="#">BOOK</a>
        <a href="#">BOOKINGS</a>
        <a href="#">HELP</a>
        <a href="#">PROFILE</a>
    </div>
    <div class="content">
        <br>
        <h2>Welcome To Our Website!</h2>
        <br>
        <form>
            <select name="From">
                <option type="disabled">From</option>
                <option>Delhi</option>
                <!-- Add more options here -->
            </select>&emsp;&emsp;&emsp;
            <select name="To">
                <option type="disabled">To</option>
                <option>Delhi</option>
                <!-- Add more options here -->
            </select>&emsp;&emsp;&emsp;
            <input type="button" value="SEARCH">
        </form>
    </div>
    <div class="container">
        <div></div>
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
