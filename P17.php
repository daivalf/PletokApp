<?php
include_once("functions.php");
$db=dbconnect();
?>
<!DOCTYPE html>
<html>
<head>
<?php
    navigasi_P17();
    ?>
</head>
<Link rel="stylesheet" href="style_fauzan.css">
    <body>
        <div class="background"></div>
    <h1 class="h1">Pengajuan Penambahan Menu Baru </h1>
    <?php
    $db = dbConnect();
    if($db->connect_errno==0){
        $sql = "SELECT id_menu_sementara,nama_menu_sementara,harga_sementara
        FROM tb_menu_sementara
        ";
        $res= $db->query($sql);
        if($res) {
    ?>
        <table border="1" class="table">
        <tr>
            <th>id_menu</th>
            <th>Nama_Menu</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
   $data=$res->fetch_all(MYSQLI_ASSOC);
    foreach($data as $barisdata) {
?>
        <tr>
            <td><?php echo $barisdata["id_menu_sementara"]?></td>
            <td><?php echo $barisdata["nama_menu_sementara"]?></td>
            <td><?php echo $barisdata["harga_sementara"]?></td>
            <td><a href="P17-terima.php?id_menu_sementara=<?php echo $barisdata["id_menu_sementara"]?>"><button class="btn17">Terima</button></a>
            <a href="P17-tolak.php?id_menu_sementara=<?php echo $barisdata["id_menu_sementara"]?>"><button class="btn17">Tolak</button></a></td>
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