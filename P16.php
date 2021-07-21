<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Owner"))
    {
        header("Location: index.php?error=4");
    }
?>
<?php require_once("functions.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bir Pletok P16</title>
  <link rel="stylesheet" type="text/css" href="style12.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Pacifico&display=swap');	
  </style>
</head>
<body>
<div class="container">
		<div style="user-select: none;" class="navbar">
			<div class="judul">PLETOK APP</div>
			<ul>
				<li><a href="P05.php">Back</a></li>	
				<div class ="clear"></div>
			</ul>
		</div>
<div class="background"></div>
			<div style="user-select: none;" class="konfirmasi16">Laporan Pendapatan </div>
<div class="dropdown">				
  	<button onclick="myFunction()" class="dropbtn">Pilih Tahun
		<i class="fa fa-caret-down"></i>
	</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="P16.php">2021</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
<?php
	$db = dbconnect();
		$sql1 = "SELECT SUM(tb_pembayaran.total_bayar) as Total1
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-01-01' AND '2021-01-31' ";
		$sql2 = "SELECT SUM(tb_pembayaran.total_bayar) as Total2
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-02-01' AND '2021-02-28' ";
		$sql3 = "SELECT SUM(tb_pembayaran.total_bayar) as Total3
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-03-01' AND '2021-03-31' ";
		$sql4 = "SELECT SUM(tb_pembayaran.total_bayar) as Total4
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-04-01' AND '2021-04-30' ";
		$sql5 = "SELECT SUM(tb_pembayaran.total_bayar) as Total5
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-05-01' AND '2021-05-31' ";
		$sql6 = "SELECT SUM(tb_pembayaran.total_bayar) as Total6
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-06-01' AND '2021-06-30' ";
		$sql7 = "SELECT SUM(tb_pembayaran.total_bayar) as Total7
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-07-01' AND '2021-07-31' ";
		$sql8 = "SELECT SUM(tb_pembayaran.total_bayar) as Total8
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-08-01' AND '2021-08-31' ";
		$sql9 = "SELECT SUM(tb_pembayaran.total_bayar) as Total9
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-09-01' AND '2021-09-30' ";
		$sql10 = "SELECT SUM(tb_pembayaran.total_bayar) as Total10
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-10-01' AND '2021-10-31' ";
		$sql11 = "SELECT SUM(tb_pembayaran.total_bayar) as Total11
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-11-01' AND '2021-11-30' ";
		$sql12 = "SELECT SUM(tb_pembayaran.total_bayar) as Total12
		FROM tb_pembayaran, tb_pesanan
		WHERE tb_pembayaran.id_pesanan=tb_pesanan.id_pesanan AND tb_pembayaran.status_bayar='sudah' AND tb_pesanan.tgl_pemesanan BETWEEN '2021-12-01' AND '2021-12-31' ";
		$res1=$db->query($sql1);
		$res2=$db->query($sql2);
		$res3=$db->query($sql3);
		$res4=$db->query($sql4);
		$res5=$db->query($sql5);
		$res6=$db->query($sql6);
		$res7=$db->query($sql7);
		$res8=$db->query($sql8);
		$res9=$db->query($sql9);
		$res10=$db->query($sql10);
		$res11=$db->query($sql11);
		$res12=$db->query($sql12);
		$data1=$res1->fetch_all(MYSQLI_ASSOC);
		foreach ($data1 as $barisdata1) 
		{
			$Total1 = $barisdata1["Total1"];
		}
		$data2=$res2->fetch_all(MYSQLI_ASSOC);
		foreach ($data2 as $barisdata2) 
		{
			$Total2 = $barisdata2["Total2"];
		}
		$data3=$res3->fetch_all(MYSQLI_ASSOC);
		foreach ($data3 as $barisdata3) 
		{
			$Total3 = $barisdata3["Total3"];
		}
		$data4=$res4->fetch_all(MYSQLI_ASSOC);
		foreach ($data4 as $barisdata4) 
		{
			$Total4 = $barisdata4["Total4"];
		}
		$data5=$res5->fetch_all(MYSQLI_ASSOC);
		foreach ($data5 as $barisdata5) 
		{
			$Total5 = $barisdata5["Total5"];
		}
		$data6=$res6->fetch_all(MYSQLI_ASSOC);
		foreach ($data6 as $barisdata6) 
		{
			$Total6 = $barisdata6["Total6"];
		}
		$data7=$res7->fetch_all(MYSQLI_ASSOC);
		foreach ($data7 as $barisdata7) 
		{
			$Total7 = $barisdata7["Total7"];
		}
		$data8=$res8->fetch_all(MYSQLI_ASSOC);
		foreach ($data8 as $barisdata8) 
		{
			$Total8 = $barisdata8["Total8"];
		}
		$data9=$res9->fetch_all(MYSQLI_ASSOC);
		foreach ($data9 as $barisdata9) 
		{
			$Total9 = $barisdata9["Total9"];
		}
		$data10=$res10->fetch_all(MYSQLI_ASSOC);
		foreach ($data10 as $barisdata10) 
		{
			$Total10 = $barisdata10["Total10"];
		}
		$data11=$res11->fetch_all(MYSQLI_ASSOC);
		foreach ($data11 as $barisdata11) 
		{
			$Total11 = $barisdata11["Total11"];
		}
		$data12=$res12->fetch_all(MYSQLI_ASSOC);
		foreach ($data12 as $barisdata12) 
		{
			$Total12 = $barisdata12["Total12"];
		}
	?>
	<div class="kotak13">
			<div class="tabel16">
				<table style="user-select: none;" border="1">
					<tr><th>Bulan</th><th>Total</th>
					<tr><td>Januari</td><td><?php echo $Total1;?></td></tr>
					<tr><td>Februari</td><td><?php echo $Total2;?></td></tr>
					<tr><td>Maret</td><td><?php echo $Total3;?></td></tr>
					<tr><td>April</td><td><?php echo $Total4;?></td></tr>
					<tr><td>Mei</td><td><?php echo $Total5;?></td></tr>
					<tr><td>Juni</td><td><?php echo $Total6;?></td></tr>
					<tr><td>Juli</td><td><?php echo $Total7;?></td></tr>
					<tr><td>Agustus</td><td><?php echo $Total8;?></td></tr>
					<tr><td>September</td><td><?php echo $Total9;?></td></tr>
					<tr><td>Oktober</td><td><?php echo $Total10;?></td></tr>
					<tr><td>November</td><td><?php echo $Total11;?></td></tr>
					<tr><td>Desember</td><td><?php echo $Total12;?></td></tr>
				</table>		
			</div>
	</div>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>
