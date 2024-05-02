<?php
include('database/db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            margin: 0 0;
            padding: 0 0;
            font-family: "Poppins", sans-serif;
            text-decoration: none;
            list-style: none;

        }

        .nav-bar-second {
  
          background-color: #E9E9E9;
    
            display: flex;
            align-items: center;
            justify-content: center;


        }

     

        .navbar-new {
       
            /* background-color: #FF8C00; */
            background-color: #E32636;
            display: flex;
            align-items: center;
            justify-content: space-between;
        
        }

        .links-footer li a {

            color: whitesmoke;
        }

        .hours-footer {

            color: whitesmoke;
        }

        #titles {
            color: rgb(213, 160, 0);

        }

   
        .links {
            display: flex;
            align-items: center;
            padding-right: 3rem;
        }

        .links li a {
            margin-right: 2rem;
            /* color: orangered; */
            color: #E32636;
            font-weight: 600;
        }

        .links li a:hover {
            color: red;
        }

        .links button:hover {
            background-color: rgb(255, 221, 0);
            color: black;
            cursor: pointer;
        }

        ul li {
            padding: 1rem;
            color: black;
        }


        .links button {
            background-color: rgb(213, 160, 0);
            color: whitesmoke;
            font-weight: 600;
            padding: 0.7rem 1rem;
            border: none;
            border-radius: 50px;
        }



        #active {
            color: red;
            font-weight: 800;
            transition: 0.2s;

        }

        #active:hover {
            box-shadow: rgba(0, 0, 0, 0.55) 0px 5px 15px;
            transition: 0.2s;

        }

        #search {

            padding: 0.7rem;
            width: 450px;
            border-radius: 5px;
            height: 42px;
            margin-right: 5px;
            border: 1px solid red;
        }

        #search-btn {

            /* background-color: #ff4757; */
            background-color:whitesmoke ;
            color: #E32636;
            border-radius: 5px;
            transition: 0.2s;
            font-size: 0.6rem;
            height: 44px;
            font-weight: bold;
            border: 1px solid yellow;
        }

        #search-btn:hover {
            transition: 0.2s;
            box-shadow: rgba(0, 0, 0, 0.55) 0px 5px 15px;

        }   
        .logo-1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* gap: 1rem; */
        }

        .logo-1 img {
            width: 70px;
            height: 70px;
            border-radius: 30px;
            object-fit: cover;
           
        }

        .logo-1 h2 {
      font-size: 1.3rem;
            margin: 0;
            /* color: #ff4757; */
            color: whitesmoke;
            text-align: center;
            /* color: black; */
        }

        .form{

            display: flex;
        }
        
        
    </style>
</head>

<body>
  
    <section class="navbar">
        <div style="padding: 0.3rem;" class="navbar-new">
            <div class="logo-1">
           
       
        <img src="images\cutlery-cross-couple-of-fork-and-spoon (1).png" alt="Restaurant Image">
        
        <h2 >The Outer Clove </h2>
        <h2>Restaurant</h2>
  
   
            </div>
            <div class="container-search">
                <form class="form" id="container-search" action="<?php echo URL; ?>menu-search.php" method="POST">
                    <input style="border: none; font-size:1.2rem" id="search" type="search" name="search" placeholder="Search for Food.." required>
                    <input style="border: none; font-size:1rem" id="search-btn" type="submit" name="submit" value="Search" class="btn btn-primary">
                </form>
            </div>

            <div class="menu ">
                <ul class="links">

                    <?php

                    if (isset($_SESSION['user_id'])) {

                    ?>
                        <li>
                            <a style="background-color:whitesmoke; color:#E32636;padding :1rem;border-radius:10px; letter-spacing:1px" id="active" href="<?php echo URL; ?>logout.php">Logout</a>
                            <a style="background-color: whitesmoke; color :#E32636;padding :1rem;border-radius:10px; letter-spacing:1px" id="active" href="cart.php">Cart</a>

                        </li>
                    <?php
                    } else {

                    ?>
                        <li>
                            <a style="background-color: whitesmoke;color  :#E32636;padding :1rem;border-radius:10px; letter-spacing:1px" id="active" href="user-login.php">Login</a>

                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>

        </div>
        </div>

        <div class="nav-bar-second">
            <div class="div ">
                <ul class="links">
                    <li>
                        <a href="<?php echo URL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>food-category.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>all-foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>menu.php">Menu</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>event-reservation.php">Reservation</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>promotion.php">Promotions</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>pictures.php">Gallery</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>aboutus.php">About Us</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>feedback.php">Contact Us</a>
                    </li>


                </ul>
            </div>
        </div>

    </section>