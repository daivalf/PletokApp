<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Kasir"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Kasir"))
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
    $id_pegawai =$db->escape_string($_SESSION["id_pegawai"]);
    $id_pesanan =$db->escape_string($_POST["id_pesanan"]);
    $metode_bayar =$db->escape_string($_POST["metode_bayar"]);
    if ($id_pesanan== ''||
       $metode_bayar== '')
       {
        echo "Semua data harus diisi" . "<br>";
                    ?>
                    <a href="javascript:history.back()"><button>Kembali</button></a>
                    <?php
       }
       else
       {
    
    $id_pegawai   =$db->escape_string($_SESSION["id_pegawai"]);
    $id_pesanan =$db->escape_string($_POST["id_pesanan"]);
    $metode_bayar =$db->escape_string($_POST["metode_bayar"]);
    $sql1 = "SELECT tb_rincian_pesanan.id_pesanan, tb_menu.nama_menu, tb_menu.harga, tb_menu.id_menu, tb_rincian_pesanan.jumlah_pesanan, tb_rincian_pesanan.id_menu,
    (tb_menu.harga * tb_rincian_pesanan.jumlah_pesanan) as Subtotal, (SELECT SUM(tb_menu.harga * tb_rincian_pesanan.jumlah_pesanan) FROM tb_menu, tb_rincian_pesanan WHERE tb_menu.id_menu = tb_rincian_pesanan.id_menu AND tb_rincian_pesanan.id_pesanan = '$id_pesanan') as Total
    FROM tb_menu join tb_rincian_pesanan using(id_menu)
    WHERE tb_rincian_pesanan.id_pesanan='$id_pesanan'";
    $res = $db -> query($sql1);
    $data = $res->fetch_all(MYSQLI_ASSOC);
    foreach($data as $barisdata)
    {
        $total_bayar = $barisdata["Total"];
    }
    $sql="INSERT INTO tb_pembayaran VALUES('$id_pegawai','$id_pesanan','$metode_bayar', '$total_bayar', 'belum')";
    //echo $sql;
    $res = $db->query($sql);
    if($res){
            if($db->affected_rows>0) {
                ?>
                <script>
                    alert("Data Pembayaran telah dimasukkan");
                    window.location.href="P12.php";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Data pembayaran gagal dimasukkan");
                    window.location.href="javascript.history.back()";
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