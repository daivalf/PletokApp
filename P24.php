<?php
include_once("functions.php");
$db=dbconnect();
?>
<!DOCTYPE html>
<html>
<head>
<?php
    $getdatap09 = navigasi_P24();
    ?>
</head>
<Link rel="stylesheet" href="styleZaqi.css">
    <style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

tr {
  text-align: left;
}
    </style>
<body>
        <div class="background"></div>
        <form method="post" name="F" action="">
    <h1>Pengajuan Penambahan Menu Baru </h1>
    <table border="1" class="table">
<tr><td>Nama Menu</td>
    <td><select name="id_menu">
		<option>Pilih Menu</option>
		<?php
			$datamenu=getListMenu();
			foreach($datamenu as $data){
				echo "<option value=\"".$data["id_menu"]."\">".$data["nama_menu"]."</option>";
			}
		?>
		</select></td>
<tr><td>Jumlah</td>
    <td><input type="text" name="Jumlah" size="12" maxlength="2"></td></tr>
</table>
        <input type="submit" name="tblsimpan" value="Tambah" class="btn231">
        <input type="reset" class="btn23">
    </form>
</body>