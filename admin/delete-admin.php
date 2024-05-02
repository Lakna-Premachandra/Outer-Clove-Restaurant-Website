<?php
include('../database/db_conn.php');

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE user_id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
$res = mysqli_stmt_execute($stmt);

if ($res == true) {
    $_SESSION['delete'] = "<div style='background-color:green; position:absolute;top:400px;left:750px;color:whitesmoke;padding:1rem 2rem;font-size:1.3rem;border-radius:10px;' class='msg'>Administrator Deleted Successfully</div>";
    header("location:". URL .'admin/manage-admin.php');
} else {
    $_SESSION['delete'] = "<div style='background-color:red; position:absolute;top:400px;left:750px;color:whitesmoke;padding:1rem 2rem;font-size:1.3rem;border-radius:10px;' class='msg'>Failed to Delete Administrator..!!</div>";
    header("location:". URL .'admin/manage-admin.php');
}
?>
