<?php
include('include-files/header.php');
?>
<head>
    <style>
        .carousel-slide {
  width: 100%;
  height: 400px;
  position: relative;
  background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
    url(images/bannerner.jpg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  animation: slide 15s infinite;
  border-radius: 0;
}

#choose :hover{
  background-color: #ff4757;

}

@keyframes slide {
  25% {
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/bannerner.jpg);
  }

  50% {
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/banners/rare-home-new-desk-header-2.jpg);
  }

  75% {
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/banners/gallery-cusine-new-feat-10.jpg);
  }

  100% {
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/banners/gallery-cusine-new-feat-19.jpg);
  } 
}

.container-res {
    background-image: url(./images/img.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
}
.food-menu-box {
   /* background-color: #FF9C00; */
   border-radius: 10px;
   box-shadow: rgba(50, 50, 93, 0.10) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

  border: none;
  width: 280px;
  height: 440px;
  text-align: center;
  display: flex;
  flex-direction: column;
  border: 1px solid lightgrey;
  align-items: center;
  transition: 0.2s;
  padding: 1.4rem;
}

.food-menu-box:hover {
  /* transform: scale(1.2); */
  transition: 0.2s;
  cursor: pointer;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

 
}

.food-menu-img {
  width: 210px;
  height: 200px;
}
.food-menu-img img {
  width: 100%;
  height: 160px;
  object-fit:cover;
  border-radius: 5px;
}

.food-menu-desc {
  /* color: whitesmoke; */
  color: black;
  font-size: 0.8rem;
  width: 200px;
}



span {
  color: #fb245c;
}


.p2 p {
  
    font-size: 1.3rem;

}
.name {

  font-size: 2rem;
  
}
.p3 img {
            width: 280px;
            height: 300px;
            object-fit: cover;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 1); 
        }

        .p2 h2{
          font-size: 2.5rem;
        }

        .container-res  p {
            
            line-height: 2px;
        }

        .three-boxes {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 450px;
  /* margin-top: 20px; */
}

.box {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  /* border: 1px solid #ccc; */
  
}

.box p {
  margin-bottom: 10px;
  font-size: 1.5rem;
  text-align: center;
  padding: 9rem;
  font-weight: bold;
  line-height: 48px;
  
}

.box img {
  width:230px;
  height: 170px;
}

.food-detail{
  margin-bottom: 1rem;
}

.container-1 {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 3rem;
  flex-wrap: wrap;
  width: 100%;
  height: auto;
}

.box-3 {
  border-radius: 40px;
  text-align: center;
  position: relative;
  border-radius: 10px;
  background-color:#E32636;
  border: none;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  color: whitesmoke;
}

.box-3:hover {
  background-color: #fd5c63;
  color: whitesmoke;
}

.box-3 img {
  height: 200px;
  width: 200px;
}

    </style>
</head>


<section>
    <div style="display: flex;justify-content:center;gap:3rem;align-items:center;margin:2rem 0; height:450px;"  class="sec">
      <div  class="p2">
        <h2>Welcome to</h2>
        <h2 style="color: #fb245c;" >The Outer Clove Restaurant</h2>
        <p style="width: 900px; line-height:2.5rem;"> Delight your senses and embark on a culinary journey like no other at The Outer Clove. With a presence in many cities across Sri Lanka, our restaurant chain is synonymous with exquisite flavors, warm hospitality, and a commitment to culinary excellence.
        </p>
       
      </div>
      <div class="p3">
        <img style="width: 300px;height :300px;border-radius:10px" src="images/homeee.webp" alt="">
      </div>
      </div>
    </section>

    <div class="carousel-slide ">

</div>

<section class="categories">


<h2  class="text-center" style="color: black;">Explore Food by Category</h2>

    <div class="container">

        <?php
        // Display from DB
        $sql = "SELECT * FROM category_table LIMIT 7";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];

                ?>
                <a href="<?php echo URL; ?>searched-food.php?id=<?php echo $id; ?>">
                    <div class="box-3 ">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='msg'> not available </div>";
                        } else {
                            ?>
                            <img src="<?php echo URL; ?>images/category/<?php echo $image_name; ?>"
                                 alt="Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                        <h3 style="color:whitesmoke" class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>
                <?php
            }
        } else {
            echo "<div class='msg'> Failed </div>";
        }
        ?>

    </div>
</section>



<?php 
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);

    if (isset($_SESSION['reservation'])) {
        echo $_SESSION['reservation'];
        unset($_SESSION['reservation']);
    }
}
?>




<section class="food-menu">
<h2 class="text-center" style="color: black;" > Our Popular Meals</h2>

        <div class="container-1">

            <?php
        // Display from DB
        $sql2 = "SELECT * FROM food_table LIMIT 10";
        $res2 = mysqli_query($conn, $sql2);

        $count2 = mysqli_num_rows($res2);

        if($count2>0){
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

                ?>
                   <div  class="food-menu-box">
                <div  class="food-menu-img">

                <?php 

                 if ($image_name == "") {
                            echo "<div class='msg'> not available </div>";
                        } else {
                            ?>
                            <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>"
                                 alt="Pizza" class="img-responsive img-curve">
                            <?php
                        }
                ?>
                </div>

                <div class="food-menu-desc">
                    <h4 style="font-size: 1.3rem;"><?php echo $title; ?></h4>
                    <p class="food-price">Rs.<?php echo $price; ?></p>
                    <p class="food-detail"><?php echo $description; ?></p>
                    <br>

             

                    <a style="background-color:#E32636; color :whitesmoke; font-size:1rem; font-weight:600; padding:0.7rem; border-radius:5px; " href="<?php echo URL; ?>cart.php?action=add&id=<?php echo $id; ?>&title=<?php echo $title; ?>&price=<?php echo $price; ?>" class="btn btn-primary">Add to cart</a>

                </div>
            </div>
                <?php
                
        }
    }
        else{
            echo "<div class='msg'> not available </div>";
        }
?>

        </div>

        <p style="margin-top:2rem; font-size:1.2rem; color:red;" class="text-center">
            <a s href="all-foods.php">See All Foods</a>
        </p>
    </section>

    <section class="reservation-link text-center">
    <div style=" height:480px;" class="container-res">

        <h2 style="margin-top: 1rem; color:whitesmoke" >Host Your Memorable Events with Us!</h2>
        <p style="text-align: center; font-size:1.2rem; margin:3rem; margin-top:1.3rem; color:whitesmoke; line-height:32px; padding:0 5.5rem;"  >Plan your next special event at Outer Clove Restaurant and make it an unforgettable experience. Whether it's a birthday, anniversary, corporate gathering, or any other celebration, our dedicated team is ready to cater to your unique needs. Enjoy the elegant ambiance, exquisite catering options, and personalized service that will ensure your event is a success. Reserve your spot now and let us turn your vision into reality, creating lasting memories for you and your guests.
</p>
        <a style="width: 200px; background-color:red;color:whitesmoke;padding:1rem;font-size:1.2rem; font-weight:600; border-radius:10px;" href="<?php echo URL; ?>event-reservation.php" class="booking">Book Now</a>
    </div>
</section>

<section class="three-boxes">
  <div class="box">
    <p>Do you know that we now deliver Islandwide?
Your Safety is our priority, We will deliver your favourite food to your doorstep 🍽</p>
  </div>
  <div class="box">
    <img src="images/WhatsApp-Image-2022-01-11-at-23.16.55.jpeg" alt="Image">
  </div>
  <div class="box">
    <p>Call us at 0717 901 354 to place your order.
    Don't miss out on our special offers and discounts for online orders!. </p>
  </div>
</section>

<?php
include('include-files/footer.php');
?>
