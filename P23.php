
<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Kasir"))
    {
        header("Location: index.php?error=4");
    }
?>
<?php
include_once("functions.php");
$db=dbconnect();
?>
<!DOCTYPE html>
<html>
<head>
<?php
    navigasi_P23();
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
        <form method="post" name="F" action="P23-simpan.php">
    <h1>Konfirmasi Pembayaran</h1>
    <table border="1" class="table">
<tr><td>ID Pemesanan</td>
    <td><input type="text" name="id_pesanan" size="20" maxlength="21"></td>
<tr><td>Metode Bayar</td>
    <td><select name="metode_bayar">
            <option>-Pilih opsi-</option>
            <option value="cash">Cash</option>
            <option value="debit">Debit</option>
        </select></td>
</table>
        <input type="submit" name="tblsimpan" value="Tambah" class="btn231">
        <input type="reset" class="btn23">
    </form>
</body>