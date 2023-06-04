<?php
$db = mysqli_connect("localhost", "root", "", "siakad");
?>

<html>
<head>
    <title>matakuliah</title>
</head>
<body>
    <form method="post">
        <label>ID</label>
        <input type="text" name="ID" placeholder="ID">
        <br><br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama">
        <br><br>
        <label>KodeMatakuliah</label>
        <input type="text" name="KodeMatakuliah" placeholder="KodeMatakuliah">
        <br><br>
        <label>Deskripsi</label>
        <input type="text" name="Deskripsi" placeholder="Deskripsi">
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <hr>

    <h3>List Mata Kuliah</h3>
    <table style="width: 80%" border="1">
    <tr>
        <th>No.</th>
        <th>ID</th>
        <th>Nama</th>
        <th>KodeMatakuliah</th>
        <th>Deskripsi</th>
    </tr>
    <?php
    $i = 1;
    $qry = "SELECT * FROM matakuliah";
    $run = $db->query($qry);
    if ($run->num_rows > 0) {
        while ($row = $run->fetch_assoc()) {
            $id = $row['ID'];
    ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['ID'] ?></td>
                <td><?php echo $row['Nama'] ?></td>
                <td><?php echo $row['KodeMatakuliah'] ?></td>
                <td><?php echo $row['Deskripsi'] ?></td>
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
    $KodeMatakuliah = $_POST['KodeMatakuliah'];
    $Deskripsi = $_POST['Deskripsi'];

    $qry = "INSERT INTO matakuliah (ID, Nama, KodeMatakuliah, Deskripsi) VALUES ('$ID', '$Nama', '$KodeMatakuliah', '$Deskripsi')";
    if (mysqli_query($db, $qry)) {
        echo '<script>alert("Berhasil");</script>';
        header('location: user.php');
        exit();
    } else {
        echo mysqli_error($db);
    }
}
?>
