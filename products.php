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
         
         include("config.php");
         // Check if the form is submitted
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $productID = $_POST['productid'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            

            // Insert data into the 'sales' table
            $query = "INSERT INTO products (productid, name, category, price,stock) 
                    VALUES ('$productID', '$name', '$category', '$price', '$stock')";

            if (mysqli_query($con, $query)) {
                // Display success message using JavaScript
                echo '<script>alert("Data inserted successfully.");</script>';
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
            }
        }

        // Display the sales table
        $result = mysqli_query($con, "SELECT * FROM Products");
        echo "<div style='text-align: center;'>";
        echo "<h2>Products Table</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Product ID</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['productid'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['stock'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
        </table>
        </div>
       <button onclick="toggle()">Add Product</button>
  
       <div id="popup">
        <form method="post" action="">
            <label for="productid">ProductId:</label><br>
            <input type="text" name="productid"><br>
            
            <label for="name">product Name:</label><br>
            <input type="text"  name="name"><br>
            
            <label for="category">Category:</label><br>
            <input type="text"  name="category"><br>
            
            <label for="price">Price:</label><br>
            <input type="text"  name="price"><br>
            
            <label for="stock">Stock:</label><br>
            <input type="text"  name="stock">
        <button onclick="toggle()">Submit</button>
        </form>
    </div>
    </main>
    <script src="index.js"></script>
</body>
</html>