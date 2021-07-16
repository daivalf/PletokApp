<?php
include_once("functions.php");?>
<!DOCTYPE html>
<html>
<head>
<?php
    $getdatap06 = navigasi_P09();
    ?>
</head>
<Link rel="stylesheet" href="style09.css">
<body>
        <div class="background"></div>
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
<button class="btn" href="P17.php">Ajukan</button>
        <button class="btn">Reset</button>
</body>