<?php
include('include-files/header.php');
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu page</title>
 
  <style>
.section-1 {
  background-image: linear-gradient(rgba(0, 0, 0, 0.37), rgba(0, 0, 0, 0.47)),
    url(./images/search.jpg);
  height: 500px;
  background-repeat: no-repeat;
  padding-top: 6rem;
  background-position: center;
  background-size: cover;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}
.topic h1 {
  color: whitesmoke;
  font-size: 4rem;
  font-weight: 600;
  display: flex;
  align-items: center;
  cursor: pointer;
}
.topic img {
  height: 80px;
  width: 80px;
}

/*section-2 styling*/

.section-2 {
  background-color: rgb(244, 244, 244);
  width: 100%;

}

.menu-container-1 {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
}

.menu-container-1 h1 {
  margin-top: 2rem;
  font-size: 2.4rem;
  color: rgb(42, 42, 42);
  margin-bottom: 2rem;
}

/*section-3 styling*/

.section-3 {
  background-color: rgb(25, 25, 25);
  width: 100%;
  margin-bottom: 1rem;
  

}

.menu-container-2 {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
 
}
.menu-container-2 h1 {
  margin-top: 2rem;
  font-size: 2.4rem;
  color: rgb(244, 244, 244);
  margin-bottom: 4rem;
}

.menu-2 img {
  border-radius: 40px;
  opacity: 0.8;
  height: 800px;
  width: 850px;
}

/*section-4 styling*/
.section-4 {
  background-color: rgb(244, 244, 244);
  width: 100%;
  padding: 2rem;

}

.menu-container-3 {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  position: relative;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
}
.menu-container-3 h1 {
  margin-top: 2rem;
  font-size: 2.4rem;
  color: rgb(25, 25, 25);
  margin-bottom: 1rem;
}
.menu-3 img {
  border-radius: 40px;
  opacity: 0.8;
  height: 720px;
  width: 900px;
}

.image-1{

    position: absolute;
    top: 300px;
    right: 100px;
}
.image-1 img{

    height: 400px;
    transform: rotate(-10deg);
}

.image-2{

    position: absolute;
    top: 200px;
    left: 0;
}

.image-2 img{

    height: 500px;

}


/*section-5 styling*/
.section-5{

    width: 100%;
    background-color: rgb(25, 25, 25);


}

.menu-container-4 {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    position: relative;
    background-repeat: no-repeat;
    background-position: center;
    background-image: linear-gradient(rgba(0, 0, 0, 0.37), rgba(0, 0, 0, 0.47)),
    url(./images/CHICKEN.png);
    background-size: contain;
  }
  .menu-container-4 h1 {
    margin-top: 2rem;
    font-size: 2.4rem;
    color: rgb(244, 244, 244);
    margin-bottom: 2rem;
  }

  .menu-4 img {
    border-radius: 40px;
    opacity: 0.8;
    height: 720px;
    width: 900px;
    margin-bottom: 2rem;
  }

  
  </style>

</head>

<body>


  <section class="section-1">
    <!--section-1-->

    <div class="topic">
      <h1 style="color:whitesmoke  ;display:flex; align-items:center; width :auto;border:none">
        Ouer Clove Dine-in Menu &nbsp;
        <img src="./images/system-regular-93-pizza-slice (1).gif" alt="" />
      </h1>
    </div>
  </section>

  <section class="section-2">
    <!--section-2-->

    <div class="menu-container-1">
      <h1 style="color:whitesmoke  ;display:flex; align-items:center; width :auto;border:none">- Best Selling Dishes and Appetizers -</h1>
      <div class="menu-1">
        <img src="./images/kisspng-casa-del-sole-pizza-fast-food-menu-0-pizza-menu-5b30c8752be3d2.4638584815299237011798.png" alt="" />
      </div>
    </div>
  </section>

  <section class="section-3">
    <!--section-3-->
    <div class="menu-container-2">
      <h1 style="color:whitesmoke  ;display:flex; align-items:center; width :auto;border:none">- Juicers and Drinks -</h1>
      <div class="menu-2">
        <img src="./images/Screenshot 2023-12-11 133930.png " alt="" />
      </div>
    </div>
  </section>

  <section class="section-4">
    <!--section-4-->
    <div class="menu-container-3">
      <h1 style="color:whitesmoke  ;display:flex; align-items:center; width :auto;border:none">- Thai mix Specials -</h1>
      <div class="menu-3">
        <img src="./images/menu.png" alt="" />
      </div>

      <div class="images image-1">
        <!--side images-->
        <img src="./images/pngwing.com (9).png" alt="" />
      </div>
      <div class="images image-2">
        <!--side images-->
        <img src="./images/pngwing.com.png" alt="" />
      </div>
    </div>
  </section>

  <section class="section-5">
    <!--section-5-->
    <div class="menu-container-4">
      <h1 style="color:whitesmoke  ;display:flex; align-items:center; width :auto;border:none">- Thai Chicken and Mutton Specials -</h1>
      <div class="menu-4">
        <img src="./images/Screenshot 2023-12-11 145420.png" alt="" />
      </div>
    </div>
  </section>



</body>

</html>

<?php
  include('include-files/footer.php');
  ?>