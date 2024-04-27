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
                $result = mysqli_query($con, "SELECT ID, name,contact,payment_terms,credit_limit FROM customer ");
                echo "<div style='text-align: center;'>";
                echo "<h2>Our customers</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Customer ID</th><th>Name</th><th>Contact</th><th>Payment_terms</th><th>Credit limit</th></tr>";
        
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td>" . $row['payment_terms'] . "</td>";
                    echo "<td>" . $row['credit_limit'] . "</td>";
                    echo "</tr>";
                }
        
                echo "</table>";
             ?>
        </table>
       </div>
      
    </main>
</body>
</html>