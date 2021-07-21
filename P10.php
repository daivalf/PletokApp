<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Bartender"))
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
    List Pesanan Bartender
</title>

<head>
    <?php
    navigasi_P10();
    ?>
</head>

<body>
    <div class="background">
    </div>

    <h1>List Pesanan</h1>

    <?php
        if($db -> connect_errno==0)
        {
            $sql = "select tb_pesanan.id_pesanan, tb_pelanggan.nama_pelanggan, tb_pelanggan.nomor_pelanggan, tb_meja.nomor_meja, tb_pesanan.tgl_pemesanan
                    from tb_pelanggan join tb_pesanan on tb_pelanggan.nomor_pelanggan = tb_pesanan.nomor_pelanggan
                                      join tb_meja on tb_meja.nomor_meja = tb_pelanggan.nomor_meja ";
            $res = $db->query($sql);
            
            if($res)
            {
    ?>            
                <table border ="2">
                <tr><th>ID pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomor Meja</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Rincian Pesanan</th>
                </tr>    
    <?php
                $data = $res->fetch_all(MYSQLI_ASSOC);
                foreach($data as $barisdata)
                {
                    ?>
                    <tr>
                        <td><?php echo $barisdata["id_pesanan"];?></td>
                        <td><?php echo $barisdata["nama_pelanggan"];?></td>
                        <td><?php echo $barisdata["nomor_meja"];?></td>
                        <td><?php echo $barisdata["tgl_pemesanan"];?></td>
                        <td><a href = "P20.php?id_pesanan=<?php echo $barisdata["id_pesanan"]; ?>">Detail</a></td>
                        </td>
                    </tr>
                    <?php
                }
            }
            else
            echo "GAGAL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
        }
        else
        echo "Gagal menampilkan data" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    ?>
</body>