<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./products.css">
</head>
<body>
<header>
        <div class="head">
            <a href="index.html">
                <section id="transactions">
                    <h3>Home</h3>
                </section>
            </a>
            <a href="purchases.php">
                <section id="transactions">
                    <h3>Purchases</h3>
                </section>
            <a href="products.php">
                <section id="products">
                    <h3>Products</h3>
                </section>
            </a>
           
            <a href="./sales.php">
                <section id="transactions">
                    <h3>Sales</h3>
                </section>
            </a>
            <a href="./expenses.php">
                <section id="transactions">
                    <h3>Expenses</h3>
                </section>
            </a>
            <a href="payments.php">
                <section id="transactions">
                    <h3>Payments</h3>
                </section>
            </a>
            <a href="./analysis.html">
                <section id="transactions">
                    <h3>Analysis</h3>
                </section>
            </a>
            <button onclick="callNow()">Call Now</button>
        </div>
    </header>
    <main>
       <div class="container" id="blur">
            <table class="table">
            <?php
            // Include your database connection file
            include 'config.php';

            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get form data
                $date = $_POST['date'];
                $customerID = $_POST['customerID'];
                $productID = $_POST['productID'];
                $quantitySold = $_POST['quantitySold'];
                $totalPrice = $_POST['totalPrice'];
                $paymentStatus = $_POST['paymentStatus'];

                // Insert data into the 'sales' table
                $query = "INSERT INTO sales (date, customerID, productID, quantity_sold, total_price, payment_status) 
                        VALUES ('$date', '$customerID', '$productID', '$quantitySold', '$totalPrice', '$paymentStatus')";

                if (mysqli_query($con, $query)) {
                    // Display success message using JavaScript
                    echo '<script>alert("Data inserted successfully.");</script>';
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }
            }

            // Display the sales table
            $result = mysqli_query($con, "SELECT * FROM sales");
            echo "<div style='text-align: center;'>";
            echo "<h2>Sales Table</h2>";
            echo "<table border='1'>";
            echo "<tr><th>SalesID</th><th>Date</th><th>CustomerID</th><th>ProductID</th><th>Quantity Sold</th><th>Total Price</th><th>Payment Status</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['salesID'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['customerID'] . "</td>";
                echo "<td>" . $row['productID'] . "</td>";
                echo "<td>" . $row['quantity_sold'] . "</td>";
                echo "<td>" . $row['total_price'] . "</td>";
                echo "<td>" . $row['payment_status'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            ?>

           <button onclick="toggle()">Add Product</button>
        </div>
        <div id="popup">
             <form method="post" action="">
                    <label for="date">Date:</label>
                    <input type="date" name="date" required><br>
                
                    <label for="customerID">Customer ID:</label>
                    <input type="text" name="customerID" required><br>
                
                    <label for="productID">Product ID:</label>
                    <input type="text" name="productID" required><br>
                
                    <label for="quantitySold">Quantity Sold:</label>
                    <input type="text" name="quantitySold" required><br>
                
                    <label for="totalPrice">Total Price:</label>
                    <input type="text" name="totalPrice" required><br>
                
                    <label for="paymentStatus">Payment Status:</label>
                    <input type="text" name="paymentStatus" required><br>
                 <button onclick="toggle()">Submit</button>
            </form> 
        </div>
    </main>
    <script src="index.js"></script>
</body>
</html>