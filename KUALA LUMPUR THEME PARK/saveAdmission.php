<html>
    <head>
        <title>TICKET ADMISSION</title>
    </head>
    <body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        b {
            color: #0066cc;
        }
    </style>
        

        <?php
            $date = date("d-m-Y");

            extract($_POST);

            $malaysianPrice = 70;
            $nonMalaysianPrice = 100;

            if ($ticket === "Malaysian") {
                $totalprice = $malaysianPrice * $quantity;
            } 
            else {
                $totalprice = $nonMalaysianPrice * $quantity;
            }
        ?>

            <h4 style="text-align: center;">THANK YOU FOR PURCHASING WITH US!</h4>
            <h3 style="text-align: center;">KUALA LUMPUR THEME PARK</h3>
            <table>
        <tr>
            <th>Field</th>
            <th></th>
            <th>Details</th>
        </tr>
        <tr>
            <td>NAME</td>
            <td>:</td>
            <td><b><?php echo $cusName; ?></b></td>
        </tr>
        <tr>
            <td>CONTACT</td>
            <td>:</td>
            <td><b><?php echo $cusContact; ?></b></td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td>:</td>
            <td><b><?php echo $cusEmail; ?></b></td>
        </tr>
        <tr>
            <td>TICKET TYPE</td>
            <td>:</td>
            <td><b><?php echo $ticket; ?></b></td>
        </tr> 
        <tr>
            <td>QUANTITY</td>
            <td>:</td>
            <td><b><?php echo $quantity; ?></b></td>
        </tr>
        <tr>
            <td>BOOKING DATE</td>
            <td>:</td>
            <td><b><?php echo $bookingdate; ?></b></td>
        </tr>
        <tr>
            <td>TOTAL</td>
            <td>:</td>
            <td><b><?php echo "RM" . $totalprice; ?></b></td>
        </tr>
    </table>

    <div class="center-button">
    <a href="index.html"><button class="custom-button">Return to home page</button></a>
    </div>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kuala lumpur theme park";

        //create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //check connection
        if ($conn->connect_error) {
            die("Connection Failed: ".$conn->connect_error);
        }

        //create query
        $sql = "INSERT INTO customers (customerName,customerContact,customerEmail,ticketType,ticketQuantity,bookingdate,totalPrice) VALUES ('$cusName', '$cusContact', '$cusEmail', '$ticket', '$quantity','$bookingdate', '$totalprice')";

        if ($conn->query($sql) === TRUE) {
            echo "TICKET HAS BEEN BOUGHT SUCCESFULLY";
        }
        else {
            echo "Error: ".$sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
    </body>
</html>