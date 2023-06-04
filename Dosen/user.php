<?php
$db = mysqli_connect("localhost", "root", "", "siakad");
?>

<html>
<head>
    <title>dosen</title>
</head>
<body>
    <form method="post">
        <label>ID</label>
        <input type="text" name="ID" placeholder="ID">
        <br><br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama">
        <br><br>
        <label>NIDN</label>
        <input type="text" name="NIDN" placeholder="NIDN">
        <br><br>
        <label>JenjangPendidikan</label>
        <input type="text" name="JenjangPendidikan" placeholder="JenjangPendidikan">
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <hr>

    <h3>List dosen</h3>
    <table style="width: 80%" border="1">
    <tr>
        <th>No.</th>
        <th>ID</th>
        <th>Nama</th>
        <th>NIDN</th>
        <th>JenjangPendidikan</th>
    </tr>
    <?php
    $i = 1;
    $qry = "SELECT * FROM dosen";
    $run = $db->query($qry);
    if ($run->num_rows > 0) {
        while ($row = $run->fetch_assoc()) {
            $id = $row['ID'];
    ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['ID'] ?></td>
                <td><?php echo $row['Nama'] ?></td>
                <td><?php echo $row['NIDN'] ?></td>
                <td><?php echo $row['JenjangPendidikan'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo$id; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo$id; ?>" onclick="return confirm('Yakin?')">Delete</a>
                </td>
            </tr>
    <?php
        }
    }
    ?>
    </table>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $ID = $_POST['ID'];
    $Nama = $_POST['nama'];
    $NIDN = $_POST['NIDN'];
    $JenjangPendidikan = $_POST['JenjangPendidikan'];

    $qry = "INSERT INTO dosen (ID, Nama, NIDN, JenjangPendidikan) VALUES ('$ID', '$Nama', '$NIDN', '$JenjangPendidikan')";
    if (mysqli_query($db, $qry)) {
        echo '<script>alert("Berhasil");</script>';
        header('location: user.php');
        exit();
    } else {
        echo mysqli_error($db);
    }
}
?>
