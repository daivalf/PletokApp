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
<Link rel="stylesheet" href="style_fauzan.css">
<?php
$db = dbConnect();
if($db->connect_errno==0) {

    $nomor_meja =$db->escape_string($_POST["nomor_meja"]);
    $status =$db->escape_string($_POST["status"]);

    $sql="UPDATE tb_meja SET tb_meja.status='$status'
         WHERE tb_meja.nomor_meja='$nomor_meja'";
        
        $res = $db->query($sql);
    if($res){
            if($db->affected_rows > 0) {
                ?>
                <script>
                    alert("Status meja berhasil diupdate");
                    window.location.href="P06.php";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Status meja gagal diupdate");
                    window.location.href="P06.php";
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