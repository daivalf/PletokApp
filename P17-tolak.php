<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Owner"))
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
    navigasi_P171();
    ?>
</head>
<body>
<div class="background"></div>
<Link rel="stylesheet" href="style_fauzan.css">
<?php
if(isset ($_GET["id_menu"])) {
    $db = dbConnect();
    $id_menu=$db->escape_string($_GET["id_menu"]);
    $datamenu = getDatamenu($id_menu);
    if($datamenu){
        ?>
<form method="post" name="frm" action="P17-delete.php">
<table border="1" class="table">
        <tr><td>Id_Menu</td>
    <td><input style="text-align: center;" type="text" name="id_menu" size="11" maxlength="10" 
    value="<?php echo $datamenu["id_menu"]?>" readonly></td></tr>
    <tr><td>nama_menu</td>
    <td><input style="text-align: center;" type="text" name="nama_menu" size="30" maxlength="31" 
    value="<?php echo $datamenu["nama_menu"]?>" readonly></td></tr>
    <tr><td>harga</td>
    <td><input style="text-align: center;" type="text" name="harga" size="10" maxlength="11" 
    value="<?php echo $datamenu["harga"]?>" readonly></td></tr>
</table>
<input class="btn17-2" type="submit" name="tolakmenu" value="Tolak">
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