<?php
session_start();
include('include-files/header.php');

$totalAmount = isset($_SESSION['total_amount']) ? $_SESSION['total_amount'] : 0;
?>
<head>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap");


  body {
    overflow-x: hidden;
    width: 100%;
    background-color: whitesmoke;
  }

  .icons {
    background-color: whitesmoke;
    padding: 1.2rem;
  }

  .icons li a {
    background-color: transparent;
    border: none;
  }

  h1 {
    color: orange;
    padding: 1rem;
    border: 3px SOLID orange;
    width: 200px;
    text-align: center;
    border-radius: 30px;
  }




  .container-res {
    margin-top: 3rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: orange;
  }

  .container-2 {
    width: 100%;
    display: flex;
    border: 1px solid red;
    align-items: center;
    background-color: rgb(255, 244, 225);
  }

  .container {
    width: 100%;
    margin: 0 auto;
    padding: 1%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2rem;
  }

  .img-responsive {
    width: 100%;
  }

  .img-curve {
    border-radius: 15px;
  }

  .text-center {
    text-align: center;
  }

  .text-left {
    text-align: left;
  }

  .text-white {
    color: white;
  }

  .clearfix {
    clear: both;
    float: none;
  }

  a {
    color: #ff6b81;
    text-decoration: none;
  }

  a:hover {
    color: #ff4757;
  }

  .btn {
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
  }

  .btn-primary {
    background-color: yellow;
    color: red;
    cursor: pointer;
    padding: 0.7rem;
    border-radius: 40px;
  }

  .btn-primary:hover {
    color: white;
    background-color: #ff4757;
  }

  h2 {
    color: #2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
  }

  h3 {
    font-size: 1.5rem;
  }

  .float-text {
    bottom: 10px;
    right: 100px;
    font-size: 1rem;
    color: #2f3542;
    padding: 0.4rem;
  }

  fieldset {
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
    border: none;
  }

  /* CSSS for navbar section */

  .logo-1 {
    margin-left: 3rem;
  }

  .links {
    display: flex;
    padding-right: 6rem;
  }

  /* CSS for Food SEarch Section */

  .food-search {
    background-image: url(../images/Lovepik_com-401727686-summer-refreshing-drink.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
  }

  /* 
.food-search input[type="search"] {
  padding: 1rem;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
} */

  #search {

    padding: 0.7rem;
    width: 400px;
    border-radius: 5px;
    height: 40px;
  }

  #search-btn {

    background-color: #ff4757;
    color: whitesmoke;
    border-radius: 5px;
    font-size: 0.7rem;
  }

  /* CSS for Categories */
  .categories {
    padding: 4% 0;
  }

  .container-1 {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .box-3 {
    border-radius: 40px;
    text-align: center;
    position: relative;
  }

  .box-3 img {
    height: 200px;
    width: 200px;
  }

  /* CSS for Food Menu */
  .food-menu {
    background-color: #ececec;
    padding: 4% 0;
  }

  .food-menu-box {
    width: 450px;
    margin: 1%;
    padding: 2%;
    float: left;
    border: 2px solid orange;
    border-radius: 15px;
  }

  .food-menu-img {
    width: 20%;
    float: left;
  }

  .food-menu-desc {
    width: 70%;
    float: left;
    margin-left: 8%;
  }

  .food-price {
    font-size: 1.2rem;
    margin: 2% 0;
  }

  .food-detail {
    font-size: 1rem;
    color: #747d8c;
  }

  /* CSS for Social */
  .social ul {
    list-style-type: none;
  }

  .social ul li {
    display: inline;
    padding: 1%;
  }

  .food-search {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
      url(images/restaurant-3.jpg);

    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
  }

  /* for Order Section */
  .order {
    width: 30%;
    margin: 0 auto;
    background-color: #E32636;
    padding: 1rem;
    border-radius: 5px;
  }

  .input-responsive {
    width: 96%;
    padding: 1%;
    margin-bottom: 3%;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
  }

  .order-label {
    margin-bottom: 1%;
    font-weight: bold;
    color: whitesmoke;
  }

  .container-3 {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* CSS for Mobile Size or Smaller Screen */

  @media only screen and (max-width: 768px) {
    .logo {
      width: 80%;
      float: none;
      margin: 1% auto;
    }

    .menu ul {
      text-align: center;
    }

    .food-search input[type="search"] {
      width: 90%;
      padding: 2%;
      margin-bottom: 3%;
    }

    .btn {
      width: 91%;
      padding: 2%;
    }

    .food-search {
      padding: 10% 0;
    }

    .categories {
      padding: 20% 0;
    }

    h2 {
      margin-bottom: 10%;
    }

    .box-3 {
      width: 100%;
      margin: 4% auto;
    }

    .food-menu {
      padding: 20% 0;
    }

    .food-menu-box {
      width: 90%;
      padding: 5%;
      margin-bottom: 5%;
    }

    .social {
      padding: 5% 0;
    }

    .order {
      width: 100%;
    }
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: orange;
      color: black;
      align-items: center;
      justify-content: center;
    }

    .popup {
      background-color: black;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      text-align: center;
    }

    .close-btn {
      cursor: pointer;
      color: #007bff;
      font-weight: bold;
    }
  }
</style>
<!-- Popup Overlay and Message -->
<!-- <div class="overlay" id="popupOverlay">
  <div class="popup">
    <p>Do you really want to confirm this order?</p>
    <button onclick="confirmOrder()">Yes</button>
    <button class="close-btn" onclick="closePopup()">Cancel</button>
  </div> -->
</div>
</head>
<body>
<section class="food-search">
  <div class="container">

    <form action="" method="post" class="order">

        <div class="order-label">Total Amount</div>
        <input type="text" name="total" value="Rs.<?php echo $totalAmount; ?>" class="input-responsive" readonly>

        <div class="order-label">Full Name</div>
        <input type="text" name="full-name" placeholder="" class="input-responsive">

        <div class="order-label">Phone Number</div>
        <input type="tel" name="contact" placeholder="" class="input-responsive">

        <div class="order-label">Address</div>
        <textarea name="address" rows="10" placeholder="" class="input-responsive"></textarea>

        <div class="order-label">Payment Method</div>
        <label style="color:whitesmoke; margin:0 4.5rem;">
          <input style="margin: 1rem 0 2rem 0;" type="radio" name="payment_method" value="cash_on_delivery" checked>
          Cash on Delivery
        </label>

        <label style="color:whitesmoke;">
          <input type="radio" name="payment_method" value="card_payment">
          Card Payment
        </label>


        <input style="background-color: #FF9C00; color :black;border-radius:10px;width:100%; font-weight:bold; font-size:1.1rem;" type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
    
    </form>

    <?php

    if (isset($_POST['submit'])) {

      if (empty($_POST['full-name']) || empty($_POST['contact']) || empty($_POST['address'])) {
        echo "<div style='background-color:red; position:absolute;top:280px;left:770px; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'> Please fill in all the required fields.</div>";
       
      } else {

      $order_date = date("Y-m-d h:i:sa");
      $customer = $_POST['full-name'];
      $phone_no = $_POST['contact'];
      $address = $_POST['address'];
      $payment_method = $_POST['payment_method'];

      $sql2 = "INSERT INTO order_table 
      SET 
      -- total_amount = '$totalAmount',
      order_date = '$order_date',
      customer = '$customer',
      phone_no = '$phone_no',
      address = '$address',
      payment_method = '$payment_method'";

      $res2 = mysqli_query($conn, $sql2);
      if ($res2 == true) {
        echo "<div style='background-color:green; position:absolute;top:280px;left:800px; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'> Order Added successfully</div>";
       
        // $_SESSION['order'] = '<div class="success" text-center></div>';
        // header('location:' . URL);
        // header("location:" . URL . 'order.php');

      } else {
        echo "<div style='background-color:red; position:absolute;top:280px;left:780px; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'> Failed to Submit Order..!!</div>";

        // $_SESSION['order'] = '<div class="success" text-center>Added Failed</div>';
        // header('location:' . URL);
      }
    }
  }
    unset($_SESSION['total_amount']);
    ?>

  </div>

</section>

<!-- <script>
  function showPopup() {
    document.getElementById('popupOverlay').style.display = 'flex';
  }

  function closePopup() {
    document.getElementById('popupOverlay').style.display = 'none';
  }

  function confirmOrder() {
    closePopup();
  }
</script> -->
</body>
<?php
include('include-files/footer.php');
?>