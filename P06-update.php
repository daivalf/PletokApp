<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Pelayan"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php
include_once("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php
    navigasi_P061();
    ?>
</head>
<body>
<div class="background"></div>
<Link rel="stylesheet" href="style_fauzan.css">
<?php
if(isset ($_GET["nomor_meja"])) {
    $db = dbConnect();
    $nomor_meja=$db->escape_string($_GET["nomor_meja"]);
    $datameja = getDataMeja($nomor_meja);
    if($datameja){
        ?>
<form method="post" name="frm" action="P06-update-meja.php">
<table border="1" class="table">
        <tr><td>Nomor_Meja</td>
    <td><input type="text" name="nomor_meja" size="11" maxlength="10" 
    value="<?php echo $datameja["nomor_meja"]?>" readonly></td></tr>
    <tr><td>Status</td>
    <td><select name="status"><option>Pilih Status</option>
        <option value="tersedia">tersedia</option>
        <option value="tidak tersedia">tidak tersedia</option>
        </td></tr>
        <td><input class="btn06" type="submit" name="updatemeja" value="Update">
        </td></tr>
</table>
    <?php
    }
    else
    echo "Data tidak ada atau sudah di hapus";
}
else
    echo "Data tidak ada";

?>
</body>
</html>