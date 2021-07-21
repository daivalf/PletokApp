<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Kasir"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php
include_once("functions.php");
?>
<!DOCTYPE html>
<html>
<Link rel="stylesheet" href="style_fauzan.css">
<?php
$db = dbConnect();
if($db->connect_errno==0) {

    $id_pesanan =$db->escape_string($_GET["id_pesanan"]);

    $sql="UPDATE tb_pembayaran SET tb_pembayaran.status_bayar='sudah'
         WHERE tb_pembayaran.id_pesanan='$id_pesanan'";
        
    $res = $db->query($sql);
    if($res){
            if($db->affected_rows > 0) {
                ?>
                <script>
                    alert("Status bayar berhasil diupdate");
                    window.location.href="P12.php";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Status bayar gagal diupdate");
                    window.location.href="P12.php";
                </script>
                <?php
            }
    }
    else
    echo"Error Query :".$db->error."<br>";
}
    else 
    echo "Error :".$db->connect_error."<br>";
?>
</body>
</html>