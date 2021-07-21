<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Bartender"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php 
include_once("functions.php");
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

<?php
$db=dbconnect();
if($db->connect_errno==0)
    {
        $idMenu     = $db->escape_string($_POST["id_menu"]);
        $namaMenu   = $db->escape_string($_POST["nama_menu"]);
        $stok       = $db->escape_string($_POST["stok"]);

        $sql = "update tb_menu set stok = '$stok'
                where id_menu= '$idMenu'";

        //echo $sql;
        $res=$db->query($sql);
        if($res)
            {
                if($db->affected_rows > 0)
                    {
                    ?>
                       <script>
                        alert("Data Berhasil di update");
                        window.location.href = "P11.php";
                    </script>
                    <?php
                    }
                    else
                    {
                        ?>
                        <script>
                        alert("Data Gagal di update");
                        window.location.href = "P11.php";
                        </script>
                        <?php
                    }
            }
            else
                echo "Error Query : ".$db->error."<br>";
            ?>
                <a href="barang-tambah.php"><button>Tambah produk</button></a>
                <a href="barang.php"><button>Liat Produk</button></a>
            <?php
    }
    else
    echo "error : " . $db->connect_error ."<br>";
?>