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
            <th>Ubah Status</th>
        </tr>
        <?php
   $data=$res->fetch_all(MYSQLI_ASSOC);
    foreach($data as $barisdata) {
?>
        <tr>
            <td><?php echo $barisdata["nomor_meja"]?></td>
            
            <td><?php echo $barisdata["status"]?></td>
            <td><a href="P06-update.php?nomor_meja=<?php echo $barisdata["nomor_meja"]?>"><button class="btn">Update</button></a></td>
        </tr>
            <?php
    }
?>
            
	
        </table>
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