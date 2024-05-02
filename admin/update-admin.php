<?php
include('../database/db_conn.php');

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE user_id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result === false) {
    header("location:". URL .'admin/manage-admin.php');
    exit();
}

$count = mysqli_num_rows($result);

if ($count == 1) {
    $row = mysqli_fetch_assoc($result);

    $email = $row['email'];
    $username = $row['username'];
} else {
    header("location:". URL .'admin/manage-admin.php');
    exit();
}

// Initialize variables for password update
$old_password = $new_password = $confirm_password = '';

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

*{

margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}

        body {
            display: flex;
            justify-content: center;
            height: 100vh;
            background-color:whitesmoke;
        }
        a{
  margin: 1rem;
  color: red;
  padding: 1rem;
  border-radius: 40px;
  text-decoration: none ;
}
        form {
            display: flex;
            flex-direction: column;
            margin-top: 10rem;
            background-color: lightgray;
padding: 2rem;
border-radius: 10px;
        }

        input {
            padding: 0.7rem;
margin: 0 0 1.2rem 0 ;

        }

        h1 {
            margin-bottom: 1rem;
        }

        .btn {
            background-color: #E32636;
            color: whitesmoke;
            border: none;
            padding: 1rem;
            font-size: 1.3rem;
        }
    </style>
</head>
<body>
    <div class="add-admins">
        <form action="" method="post">
            <h1>Update Administrator</h1>
            
            <!-- General Information Update Section -->
            <label for="email">Enter E-mail</label>
            <input type="email" name="email" placeholder="email" value="<?php echo $email; ?>">
            <label for="username">Enter Username</label>
            <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>">
            
            <!-- Password Update Section -->
            <label for="old_password">Enter Old Password</label>
            <input type="password" name="old_password" placeholder="Old Password" value="<?php echo $old_password; ?>">
            <label for="new_password">Enter New Password</label>
            <input type="password" name="new_password" placeholder="New Password" value="<?php echo $new_password; ?>">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
            
            <input style="margin: 1rem 0; border-radius:5px;" type="submit" name="submit" value="Update" class="btn">
        </form>
    </div>

<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // General Information Update
    $sql_general = "UPDATE users SET email=?, username=? WHERE user_id=? ";
    $stmt_general = mysqli_prepare($conn, $sql_general);
    mysqli_stmt_bind_param($stmt_general, "ssi", $email, $username, $id);
    $res_general = mysqli_stmt_execute($stmt_general);

    // Password Update
    if (!empty($new_password) && $new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql_password = "UPDATE users SET password=? WHERE user_id=? AND password=?";
        $stmt_password = mysqli_prepare($conn, $sql_password);
        mysqli_stmt_bind_param($stmt_password, "sis", $hashed_password, $id, $old_password);
        $res_password = mysqli_stmt_execute($stmt_password);
    } else {
        $res_password = false;
    }

    if($res_general && $res_password){
        echo "<div style='background-color:green; position:absolute;top:70px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Administrator Updated Successfully</div>";
    } else {
        echo "<div style='background-color:red; position:absolute;top:70px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Failed to Update Administrator..!!</div>";
    }
}
?>
</body>
</html>
