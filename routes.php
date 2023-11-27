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
            font-size:14px;
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

        h1 {
            
            color: #ddd;
            text-align:center;
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
    <div class="container">
        <div class="content routes">
            <h1>Routes<h1>
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
