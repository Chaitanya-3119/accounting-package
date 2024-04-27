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
            <a href="./customers.php">
                <section id="customers">
                    <h3>Customers</h3>
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
         
         include("config.php");
         // Check if the form is submitted
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $productID = $_POST['paymentID'];
            $name = $_POST['date'];
            $category = $_POST['amount'];
            $price = $_POST['type'];
            $pric = $_POST['relatedID'];
            

            // Insert data into the 'sales' table
            $query = "INSERT INTO payments (paymentID, date, amount, type, relatedID) 
                    VALUES ('$productID', '$name', '$category', '$price',' $pric')";

            if (mysqli_query($con, $query)) {
                // Display success message using JavaScript
                echo '<script>alert("Data inserted successfully.");</script>';
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
            }
        }

        // Display the sales table
        $result = mysqli_query($con, "SELECT * FROM payments");
        echo "<div style='text-align: center;'>";
        echo "<h2>Products Table</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Payment ID</th><th>Date</th><th>Amount</th><th>Type</th><th>Related ID</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['paymentID'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['amount'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['relatedID'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
        </table>
        </div>
       <button onclick="toggle()">Add Product</button>
  
       <div id="popup">
        <form method="post" action="">
            <label for="paymentID">Payment Id:</label><br>
            <input type="text" name="paymentID"><br>
            
            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            
            <label for="amount">Amount:</label><br>
            <input type="text"  name="amount"><br>
            
            <label for="type">Type:</label><br>
            <input type="text"  name="type" placeholder="Cash or Credit, etc.."><br>

            <label for="relatedID">Related ID Id:</label><br>
            <input type="text" name="relatedID" placeholder="sales ID or Purchase ID"><br>
        
        <button onclick="toggle()">Submit</button>
        </form>
    </div>
    </main>
    <script src="index.js"></script>
</body>
</html>