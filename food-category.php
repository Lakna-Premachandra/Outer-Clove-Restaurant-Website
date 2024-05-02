<?php
include('include-files/header.php');
?>

<head>
    <style>
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

}

.box-3 img {
  height: 200px;
  width: 200px;
}
    </style>
</head>

    <section class="categories">
    <h2 class="text-center">Explore Foods by Category</h2>

        <div class="container">

      <?php 
       $sql = "SELECT * FROM category_table";
       $res = mysqli_query($conn, $sql);

       $count = mysqli_num_rows($res);

       if($count>0){
        
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
                <h3 style="color:whitesmoke;" class="float-text "><?php echo $title; ?></h3>
        
                 </div>
                </a>
                <?php
       }
    }
       else{

       }
      ?>
        </div>
    </section>
    <?php
include('include-files/footer.php');
?>