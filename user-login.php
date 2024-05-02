<?php
include('./database/db_conn.php');

if (isset($_SESSION['login_error'])) {
    echo $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}


if (isset($_POST['login'])) {
    
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['login_error'] = '<div class="error" style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:180px;border-radius:10px; ">Please enter both username and password.</div>';
        header('location: user-login.php');
        exit();
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        
        if (password_verify($_POST['password'], $row['password'])) {
         
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];

    
            if ($row['user_type'] === 'admin') {
                header('location: ./admin/index.php');
            } else {
                header('location: index.php');
            }
            exit();
        } else {
            $_SESSION['login_error'] = '<div class="error" style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:180px;border-radius:10px; ">Invalid username or password. Please try again.</div>';
            header('location: user-login.php');
            exit();
        }
    } else {
        
        $_SESSION['login_error'] = '<div class="error" style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:180px;border-radius:10px; ">Database error. Please try again later.</div>';
        header('location: user-login.php');
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login</title>
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

        * {
            margin: 0 0;
            padding: 0 0;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            list-style: none;
        }

        body {

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login {
            margin-bottom: 1rem;

        }

        .container {

            background-color: whitesmoke;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;

            width: 400px;

        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            height: 300px;
            justify-content: center;
            gap: 0.4rem;
            padding: 1rem;
            background-color: whitesmoke;
    
        }

        input {
            padding: 0.5rem;
            margin-bottom: 1rem;
        }

        button {
            padding: 0.5rem;
            background-color: #E32636;
            color: whitesmoke;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            margin-bottom:1rem;
        }

        .eye-icon {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>

    <section class="login">
        <h2 style="color:Grey;text-align:center;font-size:3rem;">Login </h2>

        <div class="container">

            <form action="" method="post">

                <input style="width: 290px;" type="text" placeholder="Username" name="username" required>

                <div style="position: relative;">
                    <input style="width: 290px;" type="password" name="password" id="password" placeholder="Password" required>

                    <span style="cursor:pointer;position: absolute; bottom:20px;left:247px" class="toggle-password" onclick="togglePasswordVisibility('password')"><img style="width: 20px; height: 20px;" src="images/143034.png" alt=""></span>
                </div>

                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a style="color: red; width: 270px;" href="user-registration.php">Register here</a></p>

            </form>

        </div>
    </section>

    <style>
       .image-png img{

                height: 400px;
                width: 300px;
                object-fit: contain;
               
                
       } 

       .png-1 img{
        position: absolute;
                top: 510px;
                left: 600px;
       }

       .png-2 img{
        position: absolute;
                top: 100px;
                left: 300px;
       }
       .png-3 img{
        position: absolute;
                top: 600px;
                left: 800px;
       }
       .png-4 img{
        position: absolute;
                top: 130px;
                left: 1060px;
                height: 300px;
                width: 250px;
       }
    </style>

    <div class="image-png png-1">
        <img src="images/pngwing.com (1).png" alt="">
    </div>

    <div class="image-png png-4">
        <img src="images/pngwing.com (5).png" alt="">
    </div>
   

</body>

<script>
    function togglePasswordVisibility(passwordFieldId) {
        const passwordField = document.getElementById(passwordFieldId);
        passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
    }
</script>

</html>