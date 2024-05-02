<?php
include('include-files/header.php');

if(isset($_GET['id'])){
    $category = $_GET['id']; 
    $sql = "SELECT title FROM category_table WHERE id=$category";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    if($row) {
        $category_title = $row['title'];
    } else {
        $category_title = "<div style='background-color:red; position:absolute;top:200px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Food Not Found..!!</div>";
        
    }
} else {
    header('location:'.URL);
    exit();
}
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

.food-search{

background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)),
  url(images/search1.jpg);
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}


</style>

<section class="food-search text-center">
    <div class="container">
        <h2>Foods on <a href="#" style="color: red;" class="text-white"><?php echo $category_title; ?></a></h2>
    </div>
</section>

<section class="food-menu">
<h2 style="margin-top: 2rem;;" class="text-center">Food Menu</h2>

    <div class="container">

        <?php 
       
        $sql2 = "SELECT * FROM food_table WHERE category=$category"; 

        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if($count2 > 0){
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];

                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
            ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
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
                    <h4 style="font-size: 1.5rem;"><?php echo $title; ?></h4>
                        <p class="food-price">RS.<?php echo $price; ?></p>
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


<?php include('include-files/footer.php'); ?>
