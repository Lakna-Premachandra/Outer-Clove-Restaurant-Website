<?php
include('include-files/header.php');
?>
<style>
    .carousel-slide {
        display: none;
    }

    #search {

        width: 500px;
        font-size: 1.2rem;
        padding: 0.3rem;

    }

    .btn {

        background-color: red;
        color: white;
        font-size: 1.2rem;
        border-radius: 5px;
    }

    .container {

        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        align-items: center;
        height: auto;
        position: relative;
    }

    .food-search {

        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)),
            url(images/search.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
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
  margin-bottom: 2rem;
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

</style>

<body>
  
    <section>
        <h2 class="text-center" style="color:black; margin-top:1.2rem;">Our Food</h2>

        <div class="container">


            <?php

            $sql2 = "SELECT * FROM food_table";
            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if ($count2 > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];

            ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">

                            <?php
                            if ($image_name == "") {
                                echo "<div> not available </div>";
                            } else {
                            ?>
                                <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>" alt="image" class="img-responsive img-curve">
                            <?php
                            }
                            ?>

                        </div>

                     <div class="food-menu-desc">
                    <h4 style="font-size: 1.5rem;"><?php echo $title; ?></h4>
                    <p>Rs.<?php echo $price; ?></p>
                    <p><?php echo $description; ?></p>
                    <br>

                            <a style="background-color:#E32636; color :whitesmoke; font-size:1rem; font-weight:600; padding:0.7rem; border-radius:5px; " href="<?php echo URL; ?>cart.php?action=add&id=<?php echo $id; ?>&title=<?php echo $title; ?>&price=<?php echo $price; ?>" class="btn btn-primary">Add to cart</a>

                        </div>

                    </div>

            <?php

                }
            } else {
                echo "<div class='msg'> not available </div>";
            }
            ?>


        </div>

    </section>

</body>
<?php
include('include-files/footer.php');
?>