<?php
include_once("functions.php");
$db=dbconnect();
?>
<!DOCTYPE html>
<html>
<head>
<?php
    $getdatap09 = navigasi_P23();
    ?>
</head>
<Link rel="stylesheet" href="styleZaqi.css">
    <style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

tr {
  text-align: left;
}
    </style>
<body>
        <div class="background"></div>
        <form method="post" name="F" action="">
    <h1>Pengajuan Penambahan Menu Baru </h1>
    <table border="1" class="table">
<tr><td>ID Pembayaran</td>
    <td>&nbsp;</td>
    <!-- <td><input type="text" name="id_pembayaran" size="20" maxlength="21"></td></tr> -->
<tr><td>ID Pemesanan</td>
    <td>&nbsp;</td>
    <!-- <td><input type="text" name="nama_menu_sementara" size="20" maxlength="21"></td></tr> -->
<tr><td>Metode Bayar</td>
    <td>&nbsp;</td>
    <!-- <td><input type="text" name="harga_sementara" size="20" maxlength="21"></td></tr> -->
</table>
        <input type="submit" name="tblsimpan" value="Tambah" class="btn231">
        <input type="reset" class="btn23">
    </form>
</body>