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
                Update sukses<br>
                <a href="P06.php"><button class="btn06">View meja</button></a>
                <?php
            }
            else{
                ?>
                Update Gagal<br>
                <a href="P06.php"><button class="btn06">Kembali</button></a>
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