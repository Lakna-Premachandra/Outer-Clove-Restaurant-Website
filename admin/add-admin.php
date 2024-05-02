<?php
include('../database/db_conn.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = 'admin'; 

    $sql = "INSERT INTO users (email, username, password, user_type) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ssss", $email, $username, $password, $user_type);

    // Execute the statement
    $res = mysqli_stmt_execute($stmt);

    if ($res == TRUE) {
        $_SESSION['add'] = "<div style='background-color:green; position:absolute;top:80px;color:whitesmoke;padding:1rem 2rem;font-size:1.3rem;border-radius:10px;' class='msg'>New Administrator Added Successfully</div>";
    } else {
        $_SESSION['add'] = "<div style='background-color:red; position:absolute;top:200px;color:whitesmoke;padding:1rem 2rem;font-size:1.3rem;border-radius:10px;' class='msg'>Failed to Add Administrator..!!</div>";
    }
    header("location:" . URL . 'admin/add-admin.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

* {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}
body{

display: flex;
justify-content: center;
height: 100vh;


}


form{

display: flex;
flex-direction: column;
margin-top: 10rem;
background-color: lightgray;
padding: 2rem;
border-radius: 10px;


}

input{

padding: 0.7rem;
margin: 0 0 1.2rem 0 ;
}
h1{

margin-bottom: 1rem;
}

.btn{

background-color: RED;
color: whitesmoke;
border: none;
padding: 1rem;
font-size: 1.3rem;
}


    </style>
</head>
<body>
    <div class="add-admins">
      <?php
      if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
      ?>
        <form action="" method="post">
            <h1 style="margin-bottom: 2rem;" >Add New Addministrator</h1>
            <label for="email">Enter E-mail</label>
            <input type="email" name="email" placeholder="email">
            <label for="username">Enter Username</label>
            <input type="text" name="username" placeholder="username"> 
            <label for="password">Enter Password</label>
            <input type="password" name="password" placeholder="password">
            <input style="margin: 1rem 0; border-radius:5px;" type="submit" name="submit" value="Add " class="btn">
        </form>
    </div>
</body>
</html>
