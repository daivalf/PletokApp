<?php
include_once("functions.php");
$db=dbconnect();
?>
<!DOCTYPE html>
<html>
<head>
<?php
    $getdatap06 = navigasi_P06();
    ?>
</head>
<Link rel="stylesheet" href="style06.css">
    <body>
        <div class="background"></div>
    <h1 class="h1">Daftar meja : </h1>
    <form method="post" name="F" action="P06-update.php">
    <?php
    $db = dbConnect();
    if($db->connect_errno==0){
        $sql = "SELECT tb_meja.nomor_meja,tb_meja.status
        FROM tb_meja
        ";
         if (isset($_POST["cari"])) {
            $sql = cari_jenis($_POST["keyword"]);
        }
        $res= $db->query($sql);
        if($res) {
    ?>
        <table border="1" class="table">
        <tr>
            <th>Nomor Meja</th>
            <th>Status</th>
        </tr>
        <?php
   $data=$res->fetch_all(MYSQLI_ASSOC);
    foreach($data as $barisdata) {
?>
        <tr>
            <td><?php echo $barisdata["nomor_meja"]?></td>
            <td>
                <select name="status">
                <option value="tersedia">Tersedia</option>
                <option value="tidaktersedia">Tidak Tersedia</option>
            </select></td>
        </tr>
            <?php
    }
?>
            
	
        </table>
        <h1></h1>
        <input type="submit" name="tblsimpan" value="simpan" class="btn">
        <input type="reset"class="btn">
    </form>
    </body>
</html>
<?php
        }
        else
        echo"Error : ".$db->error."<br>"; 
        }
    else
    echo"Error koneksi db";
        ?>