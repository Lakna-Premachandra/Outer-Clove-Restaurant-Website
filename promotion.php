<?php
include('include-files/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
 
    .image-box {

      height: 450px;
      width: 350px;
      border: 1px solid grey;
      box-shadow: rgba(0, 0, 0, 0.25) 0px 5px 15px;
      border-radius: 10px;
      background-color: lightgrey;
      text-align: center;
      overflow: hidden;

    }

    .image-box img {

      width: 100%;
      height: 250px;
    }

    .gallery-container {
      display: flex;
      justify-content: center;
      gap: 3rem;
      align-items: center;
      height: auto;
      flex-wrap: wrap;
      margin: 3rem;

    }

    .title {

      color: black;
      border: none;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .content {
      padding: 1rem;

    }
    h2{
      font-size: 1.2rem;
    }
    .carousel-slide {
  width: 100%;
  height: 400px;
  position: relative;
  background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
    url(images/banners/pexels-senuscape-2313686.jpg);
  background-position: center;
  background-repeat: no-repeat;
  /* border-radius: 10px; */
  background-size: cover;
  animation: slide 15s infinite;
}

@keyframes slide {
  25% {
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/banners/pexels-jonathan-borba-2878745.jpg);
  }

  50% {
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/banners/pexels-chan-walrus-958547.jpg);
  }

  75% {
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/banners/pexels-senuscape-2313686.jpg);
  }

  100% {
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/banners/pexels-chan-walrus-958545.jpg);
  } 
}
  </style>
</head>

<body>
<div class="carousel-slide ">

</div>
  <div class="title">
    <h1 class="title">Promotions</h1>
  </div>
  <div class="gallery-container">


    <div class="image-box">
      <img src="images/gallery/pro02.jpg" alt="">
      <div class="content">
        <h2 >
          Afternoon High Tea Offer
        </h2>
        <p> 05 Jan 2023 - 30 Dec 2023</p>
        <p> Indulge in a delightful Afternoon Tea platter at Sapphyr Lounge.</p>
      </div>
    </div>

    <div class="image-box">
    <img src="images/gallery/pexels-ivan-samkov-8951247.jpg" alt="">
    <div class="content">
        <h2>Weekend Family Feast</h2>
        <p>Available Every Saturday and Sunday</p>
        <p>Enjoy a special family meal package for a delightful weekend gathering.</p>
    </div>
</div>

<div class="image-box">
    <img src="images/gallery/pexels-narda-yescas-1566837.jpg" alt="">
    <div class="content">
        <h2>Date Night Special</h2>
        <p>Valid on Fridays</p>
        <p>Make your date night memorable with a romantic dinner for two.</p>
    </div>
</div>

<div class="image-box">
    <img src="images/gallery/pexels-salo-al-59943.jpg" alt="">
    <div class="content">
        <h2>Lunch Combo Delight</h2>
        <p>Available Monday to Friday</p>
        <p>Try our special lunch combo for a quick and delicious midday meal.</p>
    </div>
</div>

<div class="image-box">
    <img src="images/gallery/pexels-shameel-mukkath-10980013.jpg" alt="">
    <div class="content">
        <h2>Free Dessert Friday</h2>
        <p>With Every Main Course</p>
        <p>Sweeten your Friday with a complimentary dessert when you order a main course.</p>
    </div>
</div>

<div class="image-box">
    <img src="images/gallery/pexels-magda-ehlers-1189261.jpg" alt="">
    <div class="content">
        <h2>Happy Hour Cocktails</h2>
        <p>Every Day from 4 PM to 7 PM</p>
        <p>Unwind after work with discounted prices on our signature cocktails.</p>
    </div>
</div>


<div class="image-box">
    <img src="images/gallery/pexels-engin-akyurt-2673353.jpg" alt="">
    <div class="content">
        <h2>Weekday Takeout Special</h2>
        <p>Order Online Monday to Thursday</p>
        <p>Get exclusive discounts on takeout orders during the weekdays.</p>
    </div>
</div>

<div class="image-box">
<img src="images/gallery/pexels-simplyart-10682119.jpg" alt="">
    <div class="content">
        <h2>Seafood Extravaganza</h2>
        <p>Available Every Friday Night</p>
        <p>Dive into a feast of the freshest seafood delicacies.</p>
    </div>
</div>
  </div>


</body>

</html>

<?php
include('include-files/footer.php');
?>