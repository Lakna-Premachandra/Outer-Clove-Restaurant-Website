<?php
include('../database/db_conn.php');

if(isset($_GET['id']) AND isset($_GET['image_name'])){
  $id = $_GET['id'];
  $image_name = $_GET['image_name'];

  if($image_name!=""){
    $path ="../images/food/" .$image_name;
    $delete = unlink($path);
    if($delete==false){
      $_SESSION['delete'] = "<div style='background-color:red; position:absolute;top:380px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;left:820px;' class='msg'>Failed. Image Not Found..!!</div>";


    header("location:" . URL . 'admin/manage-food.php');

      die();
    }
  }

$sql = "DELETE FROM food_table WHERE id=$id";

$res = mysqli_query($conn,$sql);

if($res==true){
  $_SESSION['remove'] = "<div style='background-color:green; position:absolute;top:380px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;left:840px;' class='msg'>Successfully Deleted.</div>";
  header("location:".URL.'admin/manage-food.php');
}
    else{
      $_SESSION['remove'] = "<div style='background-color:red; position:absolute;top:380px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;left:820px;' class='msg'>Failed to Delete..!!</div>";

      header("location:".URL.'admin/manage-food.php');
    }
  }

else{
  $_SESSION['unathorize'] = "unathorize";
  header('location:'.URL.'admin/manage-category.php');
}
?>