<?php
$db = mysqli_connect("localhost", "root", "", "siakad");
if (!$db) {
    die('Error in connecting to the database: ' . mysqli_connect_error());
}

$ID = $_GET['id'];

if (isset($_POST['submit'])) {
    $Nama = $_POST['nama'];
    $NIDN = $_POST['NIDN'];
    $JenjangPendidikan = $_POST['JenjangPendidikan'];

    $qry = "UPDATE dosen SET Nama = '$Nama', NIDN = '$NIDN', JenjangPendidikan = '$JenjangPendidikan' WHERE ID = $ID";
    if (mysqli_query($db, $qry)) {
        echo '<script>alert("Update successful");</script>';
        header('location: user.php');
        exit();
    } else {
        echo 'Error in updating the record: ' . mysqli_error($db);
    }
}

$qry = "SELECT * FROM dosen WHERE ID = $ID";
$run = mysqli_query($db, $qry);
if ($run->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($run)) {
        $ID = $row['ID'];
        $Nama = $row['Nama'];
        $NIDN = $row['NIDN'];
        $JenjangPendidikan = $row['JenjangPendidikan'];
    }
} else {
    header('location: user.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <form method="post">
        <label>ID</label>
        <input type="text" name="ID" value="<?php echo $ID; ?>" readonly>
        <br><br>
        <label>Nama</label>
        <input type="text" name="nama" value="<?php echo $Nama; ?>">
        <br><br>
        <label>NIDN</label>
        <input type="text" name="NIDN" value="<?php echo $NIDN; ?>">
        <br><br>
        <label>JenjangPendidikan</label>
        <input type="text" name="JenjangPendidikan" value="<?php echo $JenjangPendidikan; ?>">
        <br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
