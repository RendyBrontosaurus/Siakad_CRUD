<?php
$db = mysqli_connect("localhost", "root", "", "siakad");
?>

<html>
<head>
    <title>mahasiswa</title>
</head>
<body>
    <form method="post">
        <label>ID</label>
        <input type="text" name="ID" placeholder="ID">
        <br><br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama">
        <br><br>
        <label>NIM</label>
        <input type="text" name="NIM" placeholder="NIM">
        <br><br>
        <label>ProgramStudi</label>
        <input type="text" name="ProgramStudi" placeholder="ProgramStudi">
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <hr>

    <h3>List Mahasiswa</h3>
    <table style="width: 80%" border="1">
    <tr>
        <th>No.</th>
        <th>ID</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>ProgramStudi</th>
    </tr>
    <?php
    $i = 1;
    $qry = "SELECT * FROM mahasiswa";
    $run = $db->query($qry);
    if ($run->num_rows > 0) {
        while ($row = $run->fetch_assoc()) {
            $id = $row['ID'];
    ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['ID'] ?></td>
                <td><?php echo $row['Nama'] ?></td>
                <td><?php echo $row['NIM'] ?></td>
                <td><?php echo $row['ProgramStudi'] ?></td>
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
    $NIM = $_POST['NIM'];
    $ProgramStudi = $_POST['ProgramStudi'];

    $qry = "INSERT INTO mahasiswa (ID, Nama, NIM, ProgramStudi) VALUES ('$ID', '$Nama', '$NIM', '$ProgramStudi')";
    if (mysqli_query($db, $qry)) {
        echo '<script>alert("Berhasil");</script>';
        header('location: user.php');
        exit();
    } else {
        echo mysqli_error($db);
    }
}
?>
