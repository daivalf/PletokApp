<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Kasir"))
    {
        header("Location: index.php?error=4");
    }
?>

<!DOCTYPE html>
<?php include_once("functions_pletok.php");?>
<html lang="en">
<head>
  <title>Bir Pletok P12</title>
  <link rel="stylesheet" type="text/css" href="style12.css">
  
  <style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Pacifico&display=swap');	
  </style>
</head>
<body>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * FROM tb_pembayaran WHERE status_bayar='belum' ORDER BY id_pesanan";
	$res=$db->query($sql);
	if($res){
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
	<div class="konfirmasi">Konfirmasi Pembayaran </div>
		<div class="tabel">
			<table border="1">
				<tr><th>ID Pesanan</th><th>Metode Bayar</th><th>Total</th><th>Konfirmasi</th></tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); 
		foreach($data as $barisdata){ 
			?>
			<tr>
			<td><?php echo $barisdata["id_pesanan"];?></td>
			<td><?php echo $barisdata["metode_bayar"];?></td>
			<td><?php echo $barisdata["total_bayar"];?></td>
			<td class="bayar">
				<a href="P12-update.php?id_pesanan=<?php echo $barisdata["id_pesanan"]; ?>">Bayar</a>
			</td>
			</tr>
		
		<?php
		}		
		?>	
			</table>
			<?php
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
		<div class="tambah" align=><a href ="P23.php">Tambah Pembayaran</a></div>			
		</div>

	</div>
	
	
</body>
</html>
