<?php
include('./database/db_conn.php');

if (isset($_SESSION['registration_success'])) {
    echo $_SESSION['registration_success'];
    unset($_SESSION['registration_success']);
}

if (isset($_SESSION['registration_error'])) {
    echo $_SESSION['registration_error'];
    unset($_SESSION['registration_error']);
}

if (isset($_POST['register'])) {
    
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        $_SESSION['registration_error'] = '<div  style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:120px;border-radius:10px; ">All fields are required. Please fill in all the fields.</div>';
        header('location: user-registration.php');
        exit();
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    
    $username_exists = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($username_exists) > 0) {
        $_SESSION['registration_error'] = '<div  style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:120px;border-radius:10px; ">Username already exists. Please choose a different username.</div>';
        header('location: user-registration.php');
        exit();
    }

   
    $email_exists = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($email_exists) > 0) {
        $_SESSION['registration_error'] = '<div  style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:120px;border-radius:10px; ">Email already exists. Please use a different email.</div>';
        header('location: user-registration.php');
        exit();
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registration_error'] = '<div  style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:120px;border-radius:10px; ">Invalid email address. Please enter a valid email.</div>';
        header('location: user-registration.php');
        exit();
    }

    
    $min_password_length = 8; 
    if (strlen($_POST['password']) < $min_password_length) {
        $_SESSION['registration_error'] = '<div  style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:120px;border-radius:10px; ">Password should be at least ' . $min_password_length . ' characters long.</div>';
        header('location: user-registration.php');
        exit();
    }

    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['registration_success'] = '<div style="background-color:green; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:120px;border-radius:10px; ">Registration successful! You can now login.</div>';
        header('location: user-registration.php');
        exit();
    } else {
        $_SESSION['registration_error'] = '<div  style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:120px;border-radius:10px; ">Registration failed. Please try again.</div>';
        header('location: user-registration.php');
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
   
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
        }

        button {
            padding: 0.5rem;
            background-color:#E32636;
            color: whitesmoke;
            font-size: 1rem;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="registration">
        <h2 style="color:Grey;text-align:center;font-size:2.5rem;">Registration</h2>

        <div class="container">
            <form action="" method="post">
                <input style="width: 270px; " type="text" name="username" placeholder="Username" >
                <input style="width: 270px; " type="text" name="email" placeholder="Email" >
                <div style="position: relative;">
                    <input style="width: 270px;"  type="password" name="password" id="password" placeholder="Password" >
                    <span style="cursor:pointer;position: absolute; bottom:5px;left:240px" class="toggle-password" onclick="togglePasswordVisibility('password')"><img style="width: 20px; height: 20px;" src="images/143034.png" alt=""></span>
                </div>
                <button  style="text-align: center; margin-top:1rem;"type="submit" name="register">Register</button>
                <p style="text-align: center; margin-top:1rem; ">Already have an account? <a style="color: red; width: 270px;"  href="user-login.php">Login here</a></p>
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
                top: 530px;
                left: 610px;
                transform: rotate(-10deg);
                height: 250px;
                width: 250px;
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
                /* transform: rotate(-70deg); */
                width: 250px;
       }
    </style>

    <div class="image-png png-1">
        <img src="images/pngwing.com (10).png" alt="">
    </div>
   
    <div class="image-png png-4">
        <img src="images/pngwing.com (7).png" alt="">
    </div>
  
</body>

<script>
    function togglePasswordVisibility(passwordFieldId) {
        const passwordField = document.getElementById(passwordFieldId);
        passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
    }
</script>

</html>
