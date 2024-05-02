<?php
include('include-files/header.php');
?>

<style>
    
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
  margin-bottom: 2rem;;
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
.food-search{

    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)),
      url(images/search1.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }




</style>

    <section class="food-search">
        <div class="container">

        <?php 
        $search = $_POST['search']; 
         ?>
            <h2 style="color:azure" > Foods on &nbsp;<a style="color: red;" href="" class="text-white"><?php echo $search; ?></a></h2>
         
        </div>
    </section>

    <section class="food-menu">
    <h2 class="text-center">Our Foods</h2>

        <div class="container">

      

            <?php 
            
            $sql = "SELECT * FROM FOOD_TABLE WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                            if($image_name == ""){
                                echo "<div class='msg'>Not available</div>";
                            } else {
                            ?>
                            <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>" id="item" >
                            <?php 
                            }
                            ?>
                        </div>
                        <div class="food-menu-desc">
                            <h4 style="font-size:1.4rem;" ><?php echo $title; ?></h4>
                            <p class="food-price">Rs.<?php echo $price; ?></p>
                            <p class="food-detail"><?php echo $description; ?></p>
                            <br>
                            <a style="background-color:#E32636; color :whitesmoke; font-size:1rem; font-weight:600; padding:0.7rem; border-radius:5px; " href="<?php echo URL; ?>cart.php?action=add&id=<?php echo $id; ?>&title=<?php echo $title; ?>&price=<?php echo $price; ?>" class="btn btn-primary">Add to cart</a>
                 
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div style='background-color:red;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Food Not Found..!!</div>";
              
            }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    
    <?php
include('include-files/footer.php');
?>