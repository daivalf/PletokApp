<!DOCTYPE html>
<?php include_once("functions_pletok.php");?>
<html lang="en">
<head>
  <title>Bir Pletok P023</title>
  <link rel="stylesheet" type="text/css" href="style12.css">
  
  <style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Pacifico&display=swap');	
  </style>
</head>
<body>
<?php
if (isset($_GET["id_pembayaran"])) {
$db = dbConnect();
$idPembayaran = $db->escape_string($_GET["id_pembayaran"]);
if ($datapembayaran = getDataBayar($idPembayaran)) {
// cari data produk, kalau ada simpan di $dataproduk
?>
<div class="container">
		<div class="navbar">
			<div class="judul">PLETOK APP</div>
			<ul>
				<li><a href="P04.php">Back</a></li>	
				<div class ="clear"></div>
			</ul>
		</div>
	<div class="background"></div>
			<div class="konfirmasi13">Laporan Pendapatan </div>
	<div class="kotak13">

			<div class="tabel13">
				<table border="1">
					<tr><th>ID Pembayaran</th><th>Total</th>
					<tr><td><?php echo $datapembayaran["id_pembayaran"];?></td><td><?php echo $datapembayaran["total_bayar"];?></td></tr>
				</table>
			<div class="tambah13" align=><a href ="#">Submit Laporan Pendapatan</a></div>			
			</div>
	</div>
</div>	
<?php
} else
echo "Produk dengan Id : $IdProduk tidak ada. Pengeditan dibatalkan";
?>
<?php
} else
echo "IdProduk tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>
