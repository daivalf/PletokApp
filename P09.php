<?php
include_once("functions.php");
$db=dbconnect();
?>
<!DOCTYPE html>
<html>
<head>
<?php
    $getdatap09 = navigasi_P09();
    ?>
</head>
<Link rel="stylesheet" href="style09.css">
<body>
        <div class="background"></div>
        <form method="post" name="F" action="P09-simpan.php">
    <h1 class="h1">Pengajuan Penambahan Menu Baru </h1>
    <h1></h1>
    <table border="1" class="table">
<tr><td>Id Menu </td>
    <td><input type="text" name="IdMenu" size="20" maxlength="21"></td></tr>
<tr><td>Nama Menu </td>
    <td><input type="text" name="NamaMenu" size="20" maxlength="21"></td></tr>
<tr><td>Harga</td>
    <td><input type="text" name="Harga" size="20" maxlength="21"></td></tr>
</table>
<input type="submit" name="tblsimpan" value="simpan" class="btn">
        <input type="reset"class="btn">
    </form>
</body>