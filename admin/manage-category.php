<?php
include('../database/db_conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/add.css">
    <style> 
    
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

    a{
      margin: 1rem;
      color: red;
      padding: 1rem;
      border-radius: 40px;
      text-decoration: none ;
    }
*{

margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}
body{

display: flex;
justify-content: center;
height: 100vh;
background-color:whitesmoke;
}
.admin-page{

height: auto;
margin-top: 3rem;
text-align: center;

}

button{

padding: 1rem;
background-color: red;
color: whitesmoke;
}

#add{
  padding: 1rem;
background-color: red;
color: whitesmoke;
}
h1{

margin-bottom: 2rem;
}
table{

margin-top: 8rem;
background-color: lightgray;
width: 80%;
}
table th{
font-size: 1.3rem;
padding: 0.8rem;
background-color: black;
color: whitesmoke;

}
table td{
padding: 0.8rem;
font-size: 1.2rem;
}
#item{
 
  width: 100px;
  height: 100px;
}
.dash {
    display: flex;
    /* justify-content: center; */
    text-align: center;
    flex-direction: column;
    /* background-color: #2f3542; */
    /* background-color: grey; */
    /* padding: 1rem; */
    /* height: 1200px; */
    width: 100%;
    gap: 3rem;

  }

  .dash a {

    text-decoration: none;
    font-size: 1rem;
    color: whitesmoke;
    font-weight: 600;
    padding: 1rem;
    border-radius: 30px;
  }

  h1 {

    font-size: 2.5rem;
    padding: 1rem;
    margin: 1rem 0;
    color: whitesmoke;
    border-radius: 50px;
    text-align: center;
  }
  img{
   
    border-radius: 30px;
  }

 
  .div2{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #E32636;
  
    gap: 3rem;
  }
  .div3{
    background-color: lightgray;
    padding: 1rem;
  }
  .dash a{
    padding: 1rem;
    font-size: 1.2rem;
    color: black;
  }
  .div0{
    display: flex;
    flex-direction: column;
    width: 100%;
  }
  </style>
</head>
<body>
<div class="div0">
<div class="dash">
  <div class="div1">
    <div class="div2">
    <img style="width: 100px; height:100px;" src="../images/cutlery-cross-couple-of-fork-and-spoon (1).png" alt="">
  <h1>The Outer Clove Restaurant Admin Dashboard</h1>
  <a style="background-color:whitesmoke; border-radius:10px; color:black;letter-spacing:1px" href="logout.php"> Logout</a>
  </div>
  <div class="div3">
  <a href="index.php"> Home</a>
  <a href="manage-admin.php"> Manage Admins</a>
  <a href="manage-category.php">  Manage categories</a>
  <a href="manage-food.php"> Manage Food</a>
  <a href="manage-order.php">  Manage Orders</a>
  <a href="manage-reservation.php"> Manage Reservations</a>
  <a href="manage-feedback.php"> Manage Feedback</a>
  </div>
  </div>
</div>
<div style="width: 100%;display:flex;justify-content:center;flex-direction:column ;align-items:center;"class="admin-page">
        <h2>Manage Categories</h2>
        <br>
        <?php 
        if (isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])){
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
      }
      if (isset($_SESSION['remove'])){
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
    }
    if (isset($_SESSION['not-found'])){
      echo $_SESSION['not-found'];
      unset($_SESSION['not-found']);
  }
  if (isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if (isset($_SESSION['upload'])){
  echo $_SESSION['upload'];
  unset($_SESSION['upload']);
}
if (isset($_SESSION['failed'])){
  echo $_SESSION['failed'];
  unset($_SESSION['failed']);
}
        
        ?>
        <br>
        
    
        <a style="background-color: #E32636;width: 400px; height: 50px; font-weight:600; color:whitesmoke; padding:1rem 4rem;" href="<?php echo URL; ?>admin/add-category.php">Add New Catergory</a>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category Image</th>
                <!-- <th>instock</th>
                <th>outstock</th> -->
                <th></th>
            </tr>
            <?php
              $sql = "SELECT * FROM category_table"; 

              $res = mysqli_query($conn, $sql);

              // if ($res == TRUE) {
                $count = mysqli_num_rows($res);
              
                $sn = 1;

                if ($count > 0) {
                  while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $title= $rows['title'];
                    $image_name = $rows['image_name'];
                    $in_stock = $rows['in_stock'];
                    $out_stock = $rows['out_stock'];

                    ?>
                   
                    <tr>
                      <td><?php echo $sn++; ?></td>
                      <td><?php echo $title; ?></td>
                      <td><?php
                      
                      if($image_name!=""){
                        ?>
                        <img src= "<?php echo URL; ?>images/category/<?php echo $image_name; ?>"  id="item">

                        <?php 
                      }
                      else{
                        echo "error";
                      }
                      ?></td>
                      <!-- <td><?php echo $in_stock; ?></td>
                      <td><?php echo $out_stock; ?></td> -->
                      <td><a  style="background-color: green; font-weight:600; color:whitesmoke; padding:0.8em;" href="<?php echo URL; ?>admin/update-category.php?id=<?php echo $id; ?>">Update </a>
                      <a style="background-color: red; font-weight:600; color:whitesmoke; padding:0.8em;"  href="<?php echo URL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" >Delete</a>
                     
                      

                      </td>
                    </tr>
                   <?php
                    
                  }
                }
                else{

                  echo "error";

                }
              ?>
            
        </table>
    </div>
              </div>
</body>
</html>
