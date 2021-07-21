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
    Daftar Menu
</title>

<head>
    <?php
    navigasi_P20();
    ?>
</head>

<body>
    <div class="background">
    </div>

    <?php
        if($db -> connect_errno==0)
        {
            $idPesanan = $db->escape_string($_GET["id_pesanan"]);

            $sql = "select tb_rincian_pesanan.id_pesanan, tb_menu.nama_menu, tb_rincian_pesanan.jumlah_pesanan
                    from tb_rincian_pesanan, tb_menu where tb_rincian_pesanan.id_menu=tb_menu.id_menu and id_pesanan='$idPesanan'";
            $res = $db->query($sql);
            
            if($res)
            {
    ?>          
                <table border ="2">
                <tr><th>Nama Menu</th>
                    <th>Jumlah</th>
                </tr>    
    <?php
                $data = $res->fetch_all(MYSQLI_ASSOC);
                foreach($data as $barisdata)
                {
                    ?>
                    <tr>
                        <td><?php echo $barisdata["nama_menu"];?></td>
                        <td><?php echo $barisdata["jumlah_pesanan"];?></td>
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