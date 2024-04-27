<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="login.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        
            <?php 
             
              include("config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['Contact'] = $row['contact'];
                    $_SESSION['id'] = $row['id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
              }else{

            
            ?>
    <div class="main">
        <form method="post">
            <h1>Login</h1>
            <div class="input">
                <input type="text" placeholder="Username" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input">
                <input type="password" placeholder="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember">
                <label><input type="checkbox">Remember</label>
                <a href="#">Forget password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register">
                <p>Don't have an account?<a href="signup.html">Register</a></p>
            </div>
        </form>
    </div>
    <?php }?> 
              </div>
</body>
</html>