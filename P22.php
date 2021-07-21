<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Pelayan"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php 
include_once("functions.php");
$db = dbconnect();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style_diaz.css">
<title>
    Tambah List pesanan
</title>

<head>
    <?php
    navigasi_P22();
    ?>
</head>

<body>
    <div class="background">
    </div>

    <h1>Tambah List Pesanan</h1>

    <form method="post" name="frm" action="P22-proses.php">
        
        <table border="2">
            <tr><td >Id Pesanan</td>
                <td align="left"><input type="text" placeholder="ddmmyy-urutanpelanggan-nomormeja" name="idPesanan" size="30" maxlength="30"></td></tr>
            <tr><td>Tanggal Pemesanan</td>
                <td align="left"><input type="date" name="tglPesan" size="30" maxlength="30"></td></tr>    
            <tr><td>Nomor Meja</td>
                <td align="left"><select name="nomorMeja">
                    <option value="">Nomor Meja
                    <?php
                    $data=getListMeja();
                    foreach($data as $barisData)
                    {
                        echo "<option value=\"" . $barisData["nomor_meja"] . "\">" . $barisData["nomor_meja"] . "</option>\n";
                    }
        ?> 
            <tr><td>Nomor pelanggan</td>
                <td align="left"><input type="text" name="nomorPelanggan" size="30" maxlength="30"></td></tr>
            <tr><td>Nama Pelanggan</td>
                <td align="left"><input type="text" name="namaPelanggan" size="40" maxlength="40"></td></tr>

                
             <td><td><input type="submit" name="TblSimpan" value="Tambah"> |
             <input type="reset"></td></tr>
        </table>
</body>