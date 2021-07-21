<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Kasir"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php require_once("functions.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bir Pletok P21</title>
  <link rel="stylesheet" type="text/css" href="style12.css">
  
  <style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Pacifico&display=swap');	
  </style>
</head>
<body>
<div class="container">
		<div class="navbar">
			<div class="judul">PLETOK APP</div>
			<ul>
				<li><a href="javascript:history.back();">Back</a></li>	
				<div class ="clear"></div>
			</ul>
		</div>
	<div class="background"></div>
			<div class="konfirmasi14">Rincian Pesanan </div>

			<div class="tabel21">
			<?php
		$db = dbconnect();
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
             <?php
            } 
            else
            echo "GAGAL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
        }
        else
        echo "Gagal menampilkan data" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    ?>				
			</div>
</div>
</body>
</html>
