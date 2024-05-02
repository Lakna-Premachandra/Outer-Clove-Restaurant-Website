<?php
include('../database/db_conn.php');
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

  * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;


  }

  body {

    background-color: whitesmoke;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    overflow: hidden;
  }

  .dash {
    display: flex;
    /* justify-content: center; */
    text-align: center;
    flex-direction: column;
    /* background-color: #2f3542; */
    background-color: whitesmoke;
    /* padding: 1rem; */
    height: 300px;
    margin: 0;
    width: 100%;
    position:  absolute;
    top: 0;
    right: 0;

  }

  .dash a {

    text-decoration: none;
    font-size: 1rem;
    color: whitesmoke;
    font-weight: 600;
    padding: 1rem;
  }

  h1 {

    font-size: 2.5rem;
    padding: 1rem;
    margin: 1rem 0;
    color: whitesmoke;
    text-align: center;
  }
  img{
   
    border-radius: 10px;
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
</style>
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
  
  <div class="div1">
    <img  style="height: 650px; width:800px; border:1px solid gray; margin-top:2.5rem; object-fit:contain;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;" src="../images/Lovepik_com-450062417-Pack of Business Intelligence and Statistics Icons Vector.png" alt="">
  </div>

  
</div>
</div>
<?php
if (isset($_SESSION['login'])) {
  echo $_SESSION['login'];
  unset($_SESSION['login']);
}
?>