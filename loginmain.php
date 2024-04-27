<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <title>Login</title>
           <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');


        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        header{
            text-align: center;
        }
        body{
            background: #D2DAFF;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
        }
        .box{
            background: #B1B2FF;
            display: flex;
            
            flex-direction: column;
            padding: 25px 25px;
            border-radius: 20px;
            box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                        0 32px 64px -48px rgba(0,0,0,0.5);
            
        }
        .form-box{
            width: 450px;
            margin: 0px 10px;
        }
        .message{
            font-family: 'Poppins',sans-serif;
            text-align:center;  
        }
        .form-box header{
            font-size: 25px;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #e6e6e6;
            margin-bottom: 10px;
        }
        .form-box form .field{
            display: flex;
            margin-bottom: 10px;
            flex-direction: column;

        }
        .form-box form .input input{
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            background: #D2DAFF;
        }
        .btn{
            height: 35px;
            background: rgb(112, 113, 232);
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
            font-family: 'Poppins',sans-serif;
        }
        .btn:hover{
            opacity: 0.82;
        }
        .submit{
            width: 100%;
        }
        .links{
            margin-bottom: 15px;
        }


        </style>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM customer WHERE Email='$email' AND Password='$password' ") or die("Select Error");
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
                    header("Location: index.html");
                }
              }else{

            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"  placeholder="enter your email id" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="enter your password"autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="signup.html">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php }?>
      </div>
</body>
</html>