<?php
session_start();
include('../database/db_conn.php');

if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];


    $update_sql = "UPDATE order_table SET status = '$new_status' WHERE id = $order_id";
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        $_SESSION['update'] = "<div style='background-color:green; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px; width:400px; position:absolute; top:280px; left:780px;' class='msg'>Order Status Updated Successfully.</div>";
    } else {
        $_SESSION['update'] = "<div style='background-color:red; position:absolute;top:200px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;position:absolute; top:280px;left:780px;' class='msg'>Failed to Update Order Status...!!</div>";
    }

   
    header('location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style> 
    
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

    a{
      margin: 1rem;
      color: red;
      padding: 1rem;
      border-radius: 40px;
      text-decoration: none ;
    }
*{

margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}
body{

display: flex;
justify-content: center;
height: 100vh;
background-color:whitesmoke;
}
.admin-page{

height: auto;
margin-top: 3rem;
text-align: center;

}

button{

padding: 1rem;
background-color: red;
color: whitesmoke;
}

#add{
  padding: 1rem;
background-color: red;
color: whitesmoke;
}
h1{

margin-bottom: 2rem;
}
table{

margin-top: 6rem;
background-color: lightgray;
width: 80%;
position: relative;
}
table th{
font-size: 1.3rem;
padding: 0.8rem;
background-color: black;
color: whitesmoke;

}
table td{
padding: 1.2rem;
font-size: 1.2rem;
}
#item{
 
  width: 100px;
  height: 100px;
}
.dash {
    display: flex;
    /* justify-content: center; */
    text-align: center;
    flex-direction: column;
    /* background-color: #2f3542; */
    /* background-color: grey; */
    /* padding: 1rem; */
    /* height: 1200px; */
    width: 100%;
    gap: 3rem;

  }

  .dash a {

    text-decoration: none;
    font-size: 1rem;
    color: whitesmoke;
    font-weight: 600;
    padding: 1rem;
    border-radius: 30px;
  }

  h1 {

    font-size: 2.5rem;
    padding: 1rem;
    margin: 1rem 0;
    color: whitesmoke;
    border-radius: 50px;
    text-align: center;
  }
  img{
   
    border-radius: 30px;
  }


  .div2{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #E32636;
 
    gap: 3rem;
  }
  .div3{
    background-color: lightgray;
    padding: 1rem;
  }
  .dash a{
    padding: 1rem;
    font-size: 1.2rem;
    color: black;
  }
  .div0{
    display: flex;
    flex-direction: column;
    width: 100%;
  }
  </style>
    <!-- Your head content goes here -->
</head>

<body>
<div class="div0">
<div class="dash">
  <div class="div1">
    <div class="div2">
    <img style="width: 100px; height:100px;" src="../images/cutlery-cross-couple-of-fork-and-spoon (1).png" alt="">
  <h1>The Outer Clove Restaurant Admin Dashboard</h1>
  <a style="background-color:whitesmoke; border-radius:10px; color:black;letter-spacing:1px" href="logout.php"> Logout</a>
  </div>
  <div class="div3">
  <a href="index.php"> Home</a>
  <a href="manage-admin.php"> Manage Admins</a>
  <a href="manage-category.php">  Manage categories</a>
  <a href="manage-food.php"> Manage Food</a>
  <a href="manage-order.php">  Manage Orders</a>
  <a href="manage-reservation.php"> Manage Reservations</a>
  <a href="manage-feedback.php"> Manage Feedback</a>
  </div>
  </div>
</div>
    <div style="width: 100%;display:flex;justify-content:center;flex-direction:column ;align-items:center;" class="admin-page">
        <h2>Manage Orders</h2>

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        
        ?>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Phone No</th>
                <th>Address</th>
                <th>payment Method</th>
                <th>Status</th>
                <th></th>
            </tr>
            <?php
            $sql = "SELECT * FROM order_table ORDER BY id DESC";
            $res = mysqli_query($conn, $sql);

            // Initialize $count
            $count = 0;

            if ($res) {
                $count = mysqli_num_rows($res);
            }

            $sn = 1;

            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $total_amount = $rows['total_amount'];
                    $order_date = $rows['order_date'];
                    $customer = $rows['customer'];
                    $phone_no = $rows['phone_no'];
                    $address = $rows['address'];
                    $payment_method = $rows['payment_method'];
                    $status = $rows['status'];

            ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $total_amount; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $customer; ?></td>
                        <td><?php echo $phone_no; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $payment_method; ?></td>
                        <td><?php echo $status; ?></td>
                        <td>
                            <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                                <select name="new_status">
                                    <option value="Processing" <?php echo ($status == 'Processing') ? 'selected' : ''; ?>>Processing</option>
                                    <option value="Dispatched" <?php echo ($status == 'Dispatched') ? 'selected' : ''; ?>>Dispatched</option>
                                    <option value="Delivered" <?php echo ($status == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                                </select>
                                <button style="background-color: green; font-weight:600; color:whitesmoke; padding:0.7em; border-radius:10px; border:none; margin-top:0.5rem " type="submit" name="update_status">Update Status</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            } else {
              
                "<div style='background-color:red; position:absolute;top:200px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>No Orders..!!</div>";
            }
            ?>
        </table>
    </div>
</div>
</body>

</html>
