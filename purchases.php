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
                $purchaseID = $_POST['purchaseID'];
                $date = $_POST['date'];
                $productID = $_POST['productID'];
                $quantitySold = $_POST['quantity'];
                $totalPrice = $_POST['total_price'];
                $paymentStatus = $_POST['payment_status'];

                // Insert data into the  table
                $query = "INSERT INTO purchase (purchaseID, date, productID, quantity, total_price, payment_status) 
                        VALUES ('$purchaseID', '$date', '$productID', '$quantitySold', '$totalPrice', '$paymentStatus')";

                if (mysqli_query($con, $query)) {
                    // Display success message using JavaScript
                    echo '<script>alert("Data inserted successfully.");</script>';
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }
            }

            // Display the sales table
            $result = mysqli_query($con, "SELECT * FROM purchase");
            echo "<div style='text-align: center;'>";
            echo "<h2>Products Table</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Purchase ID</th><th>Date</th><th>ProductID</th><th>Quantity </th><th>Total Price</th><th>Payment Status</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['purchaseID'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['productID'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
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
                    <label for="purchaseID">Purchase ID:</label>
                    <input type="text" name="customerID" required><br>

                    <label for="date">Date:</label>
                    <input type="date" name="date" required><br>
                
                    <label for="productID">Product ID:</label>
                    <input type="text" name="productID" required><br>
                
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantity" required><br>
                
                    <label for="total_Price">Total Price:</label>
                    <input type="text" name="total_Price" required><br>
                
                    <label for="payment_status">Payment Status:</label>
                    <input type="text" name="payment_status" required><br>
                 <button onclick="toggle()">Submit</button>
            </form> 
        </div>
    </main>
    <script src="index.js"></script>
</body>
</html>