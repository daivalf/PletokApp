<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Pelayan"))
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
    getListMenu();
    $id_pesanan = $db->escape_string($_GET["id_pesanan"]);
    $id_menu   =$db->escape_string($_POST["id_menu"]);
    $jumlah = $db->escape_string($_POST["jumlah"]);
    if ($id_pesanan== ''||
       $id_menu== ''||
       $jumlah== '')
       {
        echo "Semua data harus diisi" . "<br>";
                    ?>
                    <a href="javascript:history.back()"><button>Kembali</button></a>
                    <?php
       }
       else
       {
    
        $id_pesanan = $db->escape_string($_GET["id_pesanan"]);
        $id_menu   =$db->escape_string($_POST["id_menu"]);
        $jumlah = $db->escape_string($_POST["jumlah"]);

    $sql="INSERT INTO tb_rincian_pesanan VALUES('$id_pesanan','$id_menu','$jumlah')";
    //echo $sql;
    $res = $db->query($sql);
    if($res){
            if($db->affected_rows>0) {
                ?>
                <script>
                    alert("Rincian menu telah ditambahkan");
                    window.location.href="P19.php?id_pesanan=<?php echo $id_pesanan; ?>";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Rincian menu telah ditambahkan");
                    window.location.href="P19.php?id_pesanan=<?php echo $id_pesanan; ?>";
                </script>
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