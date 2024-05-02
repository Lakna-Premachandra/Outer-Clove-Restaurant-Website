<?php
include('../database/db_conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/add.css">
    <style> 
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

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
a{
      margin: 1rem;
      color: red;
      padding: 1rem;
      border-radius: 40px;
      text-decoration: none ;
    }
.admin-page{

height: auto;
margin-top: 3rem;
text-align: center;

}

button{

padding: 1rem;
background-color: rgb(255, 88, 88);
color: whitesmoke;
}
h1{

margin-bottom: 2rem;
}
table{

margin-top: 8rem;
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
padding: 1.5rem;
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
<div style="width: 100%;display:flex;justify-content:center;flex-direction:column ;align-items:center;"class="admin-page">
        <h2>Manage Reservations</h2>
       

        <?php
        
  if (isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if (isset($_SESSION['delete'])){
  echo $_SESSION['delete'];
  unset($_SESSION['delete']);
}
    ?>

        <table border="1">
            <tr>
           
                <th>ID</th>
                <th>Event Name</th> 
                <th>Customer Name</th>
                <th>Phone No</th>
                <th>No of Guests</th>
                <th>Reservation Date</th>
                <th>Reservation Time</th>
                <th>Additional Message</th>
                <th></th>
                
            </tr>
            <?php
              $sql = "SELECT * FROM reservation_table ORDER BY id DESC"; 

              $res = mysqli_query($conn, $sql);

              // if ($res == TRUE) {
                $count = mysqli_num_rows($res);
              
                $sn = 1;

                if ($count > 0) {
                  while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $events = $rows['event_name'];
                    $customer= $rows['customer_name'];
                    $phone_no= $rows['phone_number'];
                    $person = $rows['person'];
                    $date= $rows['reservation_date'];
                    $time= $rows['reservation_time'];
                    $message = $rows['message'];



                    ?>
                   
                    <tr>
                      

<td><?php echo $sn++; ?></td>
<td><?php echo $events; ?></td> 
<td><?php echo $customer; ?></td>
<td><?php echo $phone_no; ?></td>
<td><?php echo $person; ?></td>
<td><?php echo $date; ?></td>
<td><?php echo $time; ?></td>
<td><?php echo $message; ?></td>
<td>
  
    <a style="background-color: red; font-weight:600; color:whitesmoke; padding:0.8em;" href="<?php echo URL; ?>admin/delete-reservation.php?id=<?php echo $id; ?>">Delete</a>

</td>

                    </tr>
                   <?php
                    
                  }
                }
                else{
                  echo "<tr><td colspan='12' classs='error'>No Reservations Found..!!</td></tr>";
                }
              ?>
            
        </table>
    </div>
</div>
</body>
</html>
