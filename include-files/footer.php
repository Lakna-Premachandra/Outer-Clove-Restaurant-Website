<head>
    <style>
        footer {
            width: 100%;
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.77), rgba(0, 0, 0, 0.47)),
                url(images/foot.jpg); */
            background-color: #E32636;
            margin: 0;
            height: 300px;


        }

        .footer-details {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin: 0;

        }

        .logo-footer img {

            height: 100px;
            width: 90px;

        }

        .links-footer li a {

            color: whitesmoke;
            margin: 0;
        }

        .hours-footer li {

            color: whitesmoke;
            margin: 0;
        }

        #titles {
            color: white;
            font-weight: 600;
            font-size: 1.3rem;
            list-style-type:georgian;

        }

        .logo-footer {

            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .logo-footer img {

            width: 90px;
            height: 90px;
            border-radius: 50px;
            object-fit: cover;
        }

        .logo-footer h2 {
            font-size: 1.5rem;
            margin: 0;
            color: whitesmoke;
        }
        .bx{
            font-size: 1.5rem;
            /* text-align: center; */
            margin-left: 3.7rem;
        }
        .links-footer li a:hover{
            color: black;
        }
    </style>
</head>
<footer>
    <div class="footer-details">

        <div class="logo-footer">
            <img style="border-radius:30px; margin-bottom:0.8rem;" src="images\cutlery-cross-couple-of-fork-and-spoon (1).png" alt="Restaurant Image">
            <h2>The Outer Clove </h2>
            <h2>Restaurant</h2>

        </div>

        <div class="links-footer">
            <ul>
                <li id="titles">Quick Links</li>
                <li><a href="<?php echo URL; ?>">Home</a></li>
                <li><a href="<?php echo URL; ?>food-category.php">Categories</a></li>
                <li><a href="<?php echo URL; ?>all-foods.php">Foods</a></li>
                <li><a href="<?php echo URL; ?>menu.php">Menu</a></li>
            </ul>
        </div>
        <div class="links-footer">
            <ul>
                <li id="titles">Quick Links</li>
                <li><a href="<?php echo URL; ?>">Reservation</a></li>
                <li><a href="<?php echo URL; ?>food-category.php">Promotions</a></li>
                <li><a href="<?php echo URL; ?>all-foods.php">Gallery</a></li>
                <li><a href="<?php echo URL; ?>menu.php">About Us</a></li>
            </ul>
        </div>
        <div class="hours-footer">
            <ul>
                <li id="titles">Opening Hours</li>
                <li>MONDAY – FRIDAY</li>
                <li>10.00 – 4.00 PM & 6.00 -12.00 PM</li>
                <li>SATURDAY – SUNDAY</li>
                <li>9.00 – 4.00 PM & 6.00 -12.00 PM</li>
            </ul>
        </div>
        <div class="links-footer">
            <ul>
                <li id="titles">Social Media Links</li>
                <li><a href=""><i class='bx bxl-facebook-circle'></i></a></li>
                <li><a href=""><i class='bx bxl-whatsapp' ></i></a></li>
                <li><a href=""><i class='bx bxl-instagram' ></i></a></li>
                <li><a href=""><i class='bx bxl-twitter' ></i></a></li>
            </ul>
        </div>
    </div>

</footer>