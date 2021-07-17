<?php 
include_once("functions.php");
$db = dbconnect();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style_diaz.css">
<title>
    Rincian Pesanan Pelayan
</title>

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
            <table border ="2">
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