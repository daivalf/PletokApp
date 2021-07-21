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
  <title>Bir Pletok P15</title>
  <link rel="stylesheet" type="text/css" href="style12.css">
  
  <style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Pacifico&display=swap');	
  </style>
</head>
<body>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT pes.id_pesanan,  pel.nama_pelanggan, pel.nomor_meja, pel.tgl_pemesanan FROM tb_pesanan pes JOIN tb_pelanggan pel ON pes.nomor_pelanggan = pel.nomor_pelanggan";
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
			<div class="konfirmasi14">List Pesanan : </div>
				<div class="tabel15">
				<table border="1">
					<tr><th>ID Pesanan</th>
					<th>Nama Pelanggan</th>
					<th>Nomor Meja</th>
					<th>Tanggal Pemesanan</th>
					<th>Rincian Pesanan</th>
					<th>Hapus Pesanan</th>
			<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); 
		foreach($data as $barisdata){ 
			?>
			<tr>
			<td><?php echo $barisdata["id_pesanan"];?></td>
			<td><?php echo $barisdata["nama_pelanggan"];?></td>
			<td><?php echo $barisdata["nomor_meja"];?></td>
			<td><?php echo $barisdata["tgl_pemesanan"];?></td>
			<td class="detail"><a href="P21.php?id_pesanan=<?php echo $barisdata["id_pesanan"]; ?>">Detail</a>
			<td align="center"><a href="#" class="hapus">Hapus</a></td>
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
			</div>
</div>	
</body>
</html>
