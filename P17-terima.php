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
if(isset ($_GET["id_menu_sementara"])) {
    $db = dbConnect();
    $id_menu_sementara=$db->escape_string($_GET["id_menu_sementara"]);
    $datamenusementara = getDatamenu($id_menu_sementara);
    if($datamenusementara){
        ?>
<form method="post" name="frm" action="P17-simpan.php">
<table border="1" class="table">
        <tr><td>Id_Menu</td>
    <td><input type="text" name="id_menu_sementara" size="11" maxlength="10" 
    value="<?php echo $datamenusementara["id_menu_sementara"]?>" readonly></td></tr>
    <tr><td>nama_menu</td>
    <td><input type="text" name="nama_menu_sementara" size="30" maxlength="31" 
    value="<?php echo $datamenusementara["nama_menu_sementara"]?>" readonly></td></tr>
    <tr><td>harga</td>
    <td><input type="text" name="harga_sementara" size="10" maxlength="11" 
    value="<?php echo $datamenusementara["harga_sementara"]?>" readonly></td></tr>
        <td><input class="btn06" type="submit" name="terimamenu" value="Terima">
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