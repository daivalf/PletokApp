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
  <title>Bir Pletok P14</title>
  <link rel="stylesheet" type="text/css" href="style12.css">
  
  <style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Pacifico&display=swap');	
  </style>
</head>
<body>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * FROM tb_menu ORDER BY id_menu";
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
			<div class="konfirmasi14">Pengecekan Stok </div>

			<div class="tabel14">
				<table border="1">
					<tr><th>ID Menu</th><th>Nama Menu</th><th>Harga</th><th>Stok</th>
<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); 
		foreach($data as $barisdata){ 
			?>
			<tr>
			<td><?php echo $barisdata["id_menu"];?></td>
			<td><?php echo $barisdata["nama_menu"];?></td>
			<td><?php echo $barisdata["harga"];?></td>
			<td><?php echo $barisdata["stok"];?></td>
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
