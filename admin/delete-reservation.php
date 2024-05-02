<?php
include('../database/db_conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM reservation_table WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
       

        $_SESSION['delete'] = "<div style='background-color:green; position:absolute;top:270px; left:770px; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Reservation Deleted Successfully..!!</div>";


        header('location:' . URL . 'admin/manage-reservation.php');
    } else {
       
        $_SESSION['delete'] = "<div style='background-color:red; position:absolute;top:270px; left:770px; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Failed to Delete Reservation..!!</div>";
        header('location:' . URL . 'admin/manage-reservation.php');
    }
} else {
    $_SESSION['delete'] =  "<div style='background-color:red; position:absolute;top:270px; left:770px; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Invalid Request. Please Try Again..!!</div>";
    header('location:' . URL . 'admin/manage-reservation.php');
}
?>
