<?php
// Simulated user data
$userData = [
    'username' => 'john_doe',
    'email' => 'john.doe@example.com',
    'bookingHistory' => [
        ['bus_number' => 'BUS123', 'departure' => 'City A', 'destination' => 'City B', 'date' => '2023-12-01'],
        ['bus_number' => 'BUS456', 'departure' => 'City B', 'destination' => 'City C', 'date' => '2023-12-15'],
        // Add more booking history as needed
    ],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            background: linear-gradient(139.06deg, #2b3693 1.86%, #0a0e30 56.22%);
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
            text-align: justify;
        }

        h1, h2 {
            color: #333;
        }

        h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-top: 20px;
        }

        p {
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome, <?php echo $userData['username']; ?>!</h1>

    <h2>Your Profile</h2>
    <p>Email: <?php echo $userData['email']; ?></p>

    <h2>Booking History</h2>
    <table>
        <thead>
        <tr>
            <th>Bus Number</th>
            <th>Departure</th>
            <th>Destination</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($userData['bookingHistory'] as $booking): ?>
            <tr>
                <td><?php echo $booking['bus_number']; ?></td>
                <td><?php echo $booking['departure']; ?></td>
                <td><?php echo $booking['destination']; ?></td>
                <td><?php echo $booking['date']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Update Profile</h2>
    <form action="#" method="post">
        <label for="newEmail">New Email:</label>
        <input type="text" id="newEmail" name="newEmail" required>
        <button type="submit">Update Email</button>
    </form>
</div>

</body>
</html>
