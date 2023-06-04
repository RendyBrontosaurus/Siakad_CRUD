<?php
$db = mysqli_connect("localhost", "root", "", "siakad");
if (!$db) {
    die('error in db' . mysqli_error($db));
}

$ID = $_GET['id'];

$qry = "DELETE FROM dosen WHERE ID = $ID;";
if (mysqli_query($db, $qry)) {
    header('location: user.php');
} else {
    echo mysqli_error($db);
}
?>
