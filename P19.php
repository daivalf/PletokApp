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
        if($db -> connect_errno==0)
        {
            $sql = "select tb_menu.nama_menu, tb_menu.harga, tb_menu.id_menu, tb_rincian_pesanan.jumlah_pesanan, tb_rincian_pesanan.id_menu
                    from tb_menu join tb_rincian_pesanan using(id_menu)";
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
                     <td>&nbsp;</td>
                     
                 </tr>
                 <?php
             }
             ?>
            <tr>
                <th colspan="3" class="th1">Total Bayar</th>
            </tr>
            </table>
            <input type="submit" name="tblsimpan" value="Tambah Rincian" class="btn191"> 
             <?php
            } 
            else
            echo "GAGAL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
        }
        else
        echo "Gagal menampilkan data" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    ?>
</body>