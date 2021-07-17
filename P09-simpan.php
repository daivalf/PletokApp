<?php
include_once("functions.php");
$db=dbconnect();
?>
<!DOCTYPE html>
<html>
    <head><Link rel="stylesheet" href="style_fauzan.css"></head>
    <body>
    <?php
$db = dbConnect();
if($db->connect_errno==0) {
    $id_menu_sementara   =$db->escape_string($_POST["id_menu_sementara"]);
    $nama_menu_sementara      =$db->escape_string($_POST["nama_menu_sementara"]);
    $harga_sementara     =$db->escape_string($_POST["harga_sementara"]);
    if ($id_menu_sementara== ''||
       $nama_menu_sementara== ''||
       $harga_sementara== '')
       {
        echo "Semua data harus diisi" . "<br>";
                    ?>
                    <a href="javascript:history.back()"><button>Kembali</button></a>
                    <?php
       }
       else
       {
    
    $id_menu_sementara   =$db->escape_string($_POST["id_menu_sementara"]);
    $nama_menu_sementara =$db->escape_string($_POST["nama_menu_sementara"]);
    $harga_sementara =$db->escape_string($_POST["harga_sementara"]);

    $sql="INSERT INTO tb_menu_sementara(id_menu_sementara,nama_menu_sementara,harga_sementara)
                    VALUES('$id_menu_sementara','$nama_menu_sementara','$harga_sementara')";
    //echo $sql;
    $res = $db->query($sql);
    if($res){
            if($db->affected_rows>0) {
                ?>
                <h1 class="h1">Data Berhasil Diajukan</h1><br>
                <a href="P09.php"><button class="btn09">View penambahan menu baru</button></a>
                <?php
            }
            else{
                ?>
                pemyimpanan Gagal<br>
                <a href="javascript.history.back();"><button class="btn09">Kembali</button></a>
                <?php
            }
    }
    else
    echo"Error Query :".$db->error."<br>";
}
}
    else "Error :".$db->connect_error."<br>";
?>
</body>
</html>