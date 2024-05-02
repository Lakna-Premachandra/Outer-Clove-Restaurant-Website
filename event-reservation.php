<?php
include('include-files/header.php');


if (isset($_POST['submit'])) {
  $events = $_POST['event-name'];
  $customer = $_POST['full-name'];
  $phone_no = $_POST['contact'];
  $person = $_POST['person'];
  $date = $_POST['reservation-date'];
  $time = $_POST['reservation-time'];
  $message = $_POST['message'];

  $sql2 = "INSERT INTO reservation_table 
             SET event_name = '$events',
                 customer_name = '$customer',
                 phone_number = '$phone_no',
                 person = '$person',
                 reservation_date = '$date',
                 reservation_time = '$time',
                 message = '$message'";

  $res2 = mysqli_query($conn, $sql2); 
  if ($res2 == true) {
   
    echo "<div style='background-color:red; position:absolute;top:213px;left:800px; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'> Failed to Add Reservation </div>";

  

  } else {
    $_SESSION['reservation'] = '<div class="error">Failed</div>';
    header('location:' . URL);
  }
}
?>
<head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap");

  * {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    text-decoration: none;
    list-style: none;
  }

  body {
    overflow-x: hidden;
    width: 100%;
    background-color: whitesmoke;
  }


 
  
  .box-main-input {
    display: flex;
    justify-content: center;
    gap: 3rem;
  }

  .box-input {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  input {
    padding: 0.8rem;
    width: 350px;
    font-size: 1.2rem;
    margin: 0.4rem;
    border-radius: 5px;
  }

  .order {
    margin-top: 6rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color:#E32636;
    width: 800px;
    height: 530px;
    padding: 4rem;
    border-radius: 20px;
  }
  textarea {
    height: 130px;
    border-radius: 5px;
    width: 340px;

  }
  label{
    text-align: left;
    width: 340px;
    color: whitesmoke;
    font-weight: bold;
    font-size: 1.2rem;
  }
  #btn-submit {
    margin-top: 2rem;
    background-color: whitesmoke;
    color: #E32636;

        border-radius: 10px;
        width: 300px;
        font-weight: bold;
      
  }
  .container-input {
    width: 100%;
    height: 750px;
    display: flex;
    justify-content: center;
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)),
      url(images/restaurant-3.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

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
    width: 80px;
  }

</style>



</style>
</head>
<body>
<!-- 
<div class="overlay" id="popupOverlay">
  <div class="popup">
    <p id="popupMessage"></p>
    <button onclick="confirmOrder()">OK</button>
  </div>
</div> -->

<section class="reservation">



<div class="container-input">
  <form  action="" method="post" class="order">
    <div class="box-main-input">
      <div class="box-input">
        <label for="">Event name</label>
        <input
          type="text"
          name="event-name"
          placeholder="event-name"
          class="input-responsive"
        />

        <label for="">Full name</label>
        <input
          type="text"
          name="full-name"
          placeholder="full name"
          class="input-responsive"
          required
        />

        <label for="">Contact Number</label>
        <input
          type="tel"
          name="contact"
          placeholder="Number"
          class="input-responsive"
          required
        />

        <label for="">Number of persons</label>
        <input
          type="number"
          name="person"
          class="input-responsive"
          value="1"
          required
        />
      </div>

      <div class="box-input">
        <label for="">Reservation date</label>
        <input
          type="date"
          name="reservation-date"
          class="input-responsive"
          required
        />
        <label for="">Reservation Time</label>

        <input
          type="time"
          name="reservation-time"
          class="input-responsive"
          required
        />

        <label for="">Adiitional message</label>
        <textarea
          name="message"
          rows="5"
          placeholder="Additional message.."
          class="input-responsive"
        ></textarea>
      </div>
    </div>
    <input
    
      type="submit"
      name="submit"
      value="Confirm "
      class="btn btn-primary"
      id="btn-submit"
    />
  </form>
</div>

</section>

<!-- <script>
  function showPopup(message) {
    document.getElementById('popupOverlay').style.display = 'flex';
    document.getElementById('popupMessage').innerHTML = message;
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