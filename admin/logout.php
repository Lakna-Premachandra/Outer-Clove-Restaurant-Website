<?php
include('../database/db_conn.php');

session_destroy();

header("location:" . URL . 'user-login.php');

?>

