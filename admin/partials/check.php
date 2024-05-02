<?php
if(!isset($_SESSION['user'])){
  $_SESSION['no_login'] = "<div style='background-color:red; position:absolute;top:200px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Failed. No User Found...!!</div>";
  header("location:" . URL . 'admin/login.php');
}
?>