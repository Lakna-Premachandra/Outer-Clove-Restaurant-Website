<?php
include('../database/db_conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">

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
            background-color:#fcae38;
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

            width: 420px;

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
            position: relative;
        }

        input {
            padding: 0.5rem;
            margin: 0.5rem;
        }

        button {
            padding: 0.5rem;
            background-color: red;
            color: whitesmoke;
            font-size: 1rem;
            border: none;

        }

      .failed{
        text-align: center;
        /* margin-top: 1.3rem; */
        background-color: red;
        position: absolute;
        top: 100Px;
        color: whitesmoke;
        border-radius: 10px;
        width: 200px;
        padding: 1rem;
        font-size: 1rem;

      }
      .success{
        text-align: center;
        /* margin-top: 1.3rem; */
        background-color: red;
        top: 900Px;
        color: whitesmoke;
        border-radius: 10px;
        position: absolute;
        width: 200px;
        padding: 1rem;
        font-size: 1rem;

      }
    </style>
</head>

<body>
    <div class="container">
        
    <?php
    if(isset($_SESSION['login'])){
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login'])){
      echo $_SESSION['no-login'];
      unset($_SESSION['no-login']);
    }

    ?>
      <form action="login.php" method="post">
        <h1 style="text-align: center;">Admin Login</h1>
        <div class="form-group">
            <input type="text" placeholder="Username:" name="username" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input style="  background-color:black; color:witesmoke;BORDER:NONE;width    :100%" type="submit" value="Login" name="submit" class="btn btn-success">
        </div>
      </form>
    </div>

</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] =  "<div style='background-color:green; position:absolute;top:200px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;text-align:center;' class='msg'>Login Successfull.</div>";
        $_SESSION['user'] = $username;
        header("location:" . URL . 'admin/');
    } else {
        $_SESSION['login'] = "<div style='background-color:red; position:absolute;top:200px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;text-align:center;' class='msg'>Login Unsuccessfull. Please Try Again..!!</div>";
        header("location:" . URL . 'admin/login.php');
    }
}
?>
