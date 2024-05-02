<?php
include('include-files/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .carousel-slide {
            display: none;
        }

        .image-box {

            height: 300px;
            width: 400px;
            /* border: 2px solid grey; */
            box-shadow: rgba(0, 0, 0, 0.25) 0px 5px 15px;
            border-radius: 10px;
            background-color: #E32636;
            /* background-color: black; */
        }

        .image-box img {

            width: 100%;
            height: 100%;
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


        .image-box:hover {
            
 padding: 1rem;
  cursor: pointer;
}
    </style>
</head>

<body>
    <div class="title">
        <h1 class="title">Gallery</h1>
    </div>
    <div class="gallery-container">

        <div class="image-box">
            <img src="images/gallery/res9.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/res5.png" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/res1.png" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/res2.png" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/res3.png" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/res6.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/res4.png" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/res10.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/f1.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/f2.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/f3.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/f4.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/f5.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/f6.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/f7.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/gallery/f8.jpg" alt="">
        </div>


    </div>


</body>

</html>

<?php
include('include-files/footer.php');
?>