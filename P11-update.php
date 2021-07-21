<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Bartender"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php
    include_once("functions.php");
    navigasi_P11();
?>

<!Doctype html>
<link rel="stylesheet" type="text/css" href="style_diaz.css">
<html>
<head><title>Update Value Stok</title></head>
<body>
<div class="background">
    </div>
<h1>Update Value Stok</h1>

<?php
if(isset($_GET{"id_menu"}))
{
    $db=dbconnect();
    $idMenu = $db->escape_string($_GET['id_menu']);
    $dataMenu = getDataMenu($idMenu);
    //var_dump($dataMenu);
    if($dataMenu = getDataMenu($idMenu))
    {
    ?>  
        <form method="post" name="frm" action="P11-proses.php">
        <table border="2">
        <tr><td>Id Menu</td>
        <td><input type="text" name="id_menu" size="20" maxlength="20"
        value="<?php echo $dataMenu["id_menu"];?>" readonly></td></tr>
        <tr><td>Stok Minuman
            <td><select name="stok">
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
            </td>
            <tr><td>&nbsp;</td>
            <td><input type="submit" name="TblUpdate" value="Simpan">
            <Input type="reset"></td></tr>
    <?php   
    
    }
    else
    echo "Data Barang tidak dapat ditemukan";
}
else
echo "Data Barang tidak dapat ditemukan";
?>
            