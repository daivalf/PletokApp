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
<link rel="stylesheet" type="text/css" href="styleZaqi.css">
<title>
    Rincian Pesanan Pelayan
</title>
<style>
    .th1 {
    background-color: white;
}
    .btn191 {
    position:relative;
    top: 220px;
    left: 100px;
    border : 0;
    border-radius: 100px;
    font-size: 16px;
    font-weight: bold;
    line-height: 1;
    padding : 16px 30px;
    background : #fac990;
}

</style>
<head>
    <?php
    navigasi_P19();
    ?>
</head>

<body>
    <div class="background"></div>

    <h1>Rincian Pesanan</h1>

    <?php
        $id_pesanan = $_GET["id_pesanan"];
        if($db -> connect_errno==0)
        {
            $sql = "SELECT tb_rincian_pesanan.id_pesanan, tb_menu.nama_menu, tb_menu.harga, tb_menu.id_menu, tb_rincian_pesanan.jumlah_pesanan, tb_rincian_pesanan.id_menu,
                    (tb_menu.harga * tb_rincian_pesanan.jumlah_pesanan) as Subtotal, (SELECT SUM(tb_menu.harga * tb_rincian_pesanan.jumlah_pesanan) FROM tb_menu, tb_rincian_pesanan WHERE tb_menu.id_menu = tb_rincian_pesanan.id_menu AND tb_rincian_pesanan.id_pesanan = '$id_pesanan') as Total
                    FROM tb_menu join tb_rincian_pesanan using(id_menu)
                    WHERE tb_rincian_pesanan.id_pesanan='$id_pesanan'";
            $res = $db -> query($sql);

            if($res)
            {
    ?>        
            <table border ="1">
            <tr><th>Nama Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
    <?php       
             $data = $res->fetch_all(MYSQLI_ASSOC);
             foreach($data as $barisdata)
             {
                 ?>
                 <tr>
                     <td><?php echo $barisdata["nama_menu"];?></td>
                     <td><?php echo $barisdata["jumlah_pesanan"];?></td>
                     <td><?php echo $barisdata["harga"];?></td>
                     <td><?php echo $barisdata["Subtotal"]; ?></td>
                 </tr>
                 <?php
             }
             ?>
            <tr>
                <td colspan="3" class="th1">Total Bayar</td>
                <td><?php echo $barisdata["Total"]; ?></td>
            </tr>
            </table>
            <a style="text-decoration: none; color: black;" name="tblsimpan" class="btn191" href="P24.php?id_pesanan=<?php echo $id_pesanan; ?>">Tambah Rincian</a>
             <?php
            } 
            else
            echo "GAGAL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
        }
        else
        echo "Gagal menampilkan data" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    ?>
</body>