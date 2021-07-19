<?php
include_once("functions.php");
?>
<!DOCTYPE html>
<html>
<Link rel="stylesheet" href="style_fauzan.css">
<?php
$db = dbConnect();
if($db->connect_errno==0) {

    $id_menu_sementara =$db->escape_string($_POST["id_menu_sementara"]);
    $nama_menu_sementara =$db->escape_string($_POST["nama_menu_sementara"]);
    $harga_sementara =$db->escape_string($_POST["harga_sementara"]);

    $sql="DELETE from tb_menu_sementara where id_menu_sementara='$id_menu_sementara'";
        $res = $db->query($sql);
    if($res){
            if($db->affected_rows > 0) {
                ?>
                <h1 class="h1">sukses<br>
                <a href="P17.php"><button class="btn06">View pengajuan penambahan</button></a>
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