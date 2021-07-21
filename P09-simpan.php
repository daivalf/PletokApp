<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Bartender"))
    {
        header("Location: index.php?error=4");
    }
?>

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
    $id_menu   =$db->escape_string($_POST["id_menu"]);
    $nama_menu      =$db->escape_string($_POST["nama_menu"]);
    $harga     =$db->escape_string($_POST["harga"]);
    if ($id_menu== ''||
       $nama_menu== ''||
       $harga== '')
       {
        echo "Semua data harus diisi" . "<br>";
                    ?>
                    <a href="javascript:history.back()"><button>Kembali</button></a>
                    <?php
       }
       else
       {
    
    $id_menu   =$db->escape_string($_POST["id_menu"]);
    $nama_menu =$db->escape_string($_POST["nama_menu"]);
    $harga =$db->escape_string($_POST["harga"]);

    $sql="INSERT INTO tb_menu VALUES('$id_menu','$nama_menu','$harga', 'tidak tersedia', 'belum')";
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