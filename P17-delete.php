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
<Link rel="stylesheet" href="style_fauzan.css">
<?php
$db = dbConnect();
if($db->connect_errno==0) {

    $id_menu =$db->escape_string($_POST["id_menu"]);
    $nama_menu =$db->escape_string($_POST["nama_menu"]);
    $harga =$db->escape_string($_POST["harga"]);

    $sql="DELETE from tb_menu where id_menu='$id_menu'";
        $res = $db->query($sql);
    if($res){
            if($db->affected_rows > 0) {
                ?>
                <script>
                    alert("Data menu baru telah ditolak");
                    window.location.href="P17.php";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Data gagal ditolak");
                    window.location.href="P17.php";
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