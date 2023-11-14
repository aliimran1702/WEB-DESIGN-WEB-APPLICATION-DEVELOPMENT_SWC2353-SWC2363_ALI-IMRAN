<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TICKET</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>TICKET INFORMATION</h1>
    <table>
        <tr>
            <th>CUSTOMER NAME</th>
            <th>CUSTOMER CONTACT</th>
            <th>CUSTOMER EMAIL</th>
            <th>TICKET TYPE</th>
            <th>QUANTITY</th>
            <th>BOOKING DATE</th>
            <th>TOTAL PRICE</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kuala lumpur theme park";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM customers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["customerName"] . "</td>
                        <td>" . $row["customerContact"] . "</td>
                        <td>" . $row["customerEmail"] . "</td>
                        <td>" . $row["ticketType"] . "</td>
                        <td>" . $row["ticketQuantity"] . "</td>
                        <td>" . $row["bookingdate"] . "</td>
                        <td>" . $row["totalPrice"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>0 results</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
