<link rel="stylesheet" href="style_fauzan.css">

<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Pelayan"))
    {
        header("Location: index.php?error=4");
    }
?>
<?php
    include_once("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hapus Data Pesanan</title>
</head>
<body>
    <?php navigasi_P071(); ?>
    <h1>Hapus Data Pesanan</h1>
    <?php
        if (isset($_GET["id_pesanan"])) 
        {
            $db = dbConnect();
            $id_pesanan = $db->escape_string($_GET["id_pesanan"]);
            if ($datapesanan = getDataPesanan($id_pesanan)) 
            {
    ?>
                <form method="post" name="frm" action="P07-hapus.php">
                    <input type="hidden" name="id_pesanan" value="<?php echo $datapesanan["id_pesanan"];?>">
                    <table class="table" border="1">
                        <tr>
                            <td>Id Pesanan</td>
                            <td><?php echo $datapesanan["id_pesanan"]; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td><?php echo $datapesanan["nama_pelanggan"]; ?></td>
                            <tr>
                        </tr>
                        <tr>
                            <td>Nomor Meja</td>
                            <td><?php echo $datapesanan["nomor_meja"]; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pemesanan</td>
                            <td><?php echo $datapesanan["tgl_pemesanan"]; ?></td>
                        </tr>
                            <input style="font-size: 20px;" class="btn07" type="submit" name="TblHapus" value="Hapus">
                    </table>
                </form>
    <?php
            }
            else 
            {
                echo "Pesanan dengan Id : $id_pesanan tidak ada.";
            }
        }
        else 
        {
            echo "Id Pesanan tidak ada.";
        }
    ?>
</body>
</html>