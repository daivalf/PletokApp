<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Bartender"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php 
include_once("functions.php");
$db = dbconnect();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style_diaz.css">
<title>
    List Pesanan Bartender
</title>

<head>
    <?php
    navigasi_P10();
    ?>
</head>

<body>
    <div class="background">
    </div>

    <h1>Update Ketersediaan Menu</h1>

    <?php
        if($db -> connect_errno==0)
        {
            $sql = "select tb_menu.id_menu, tb_menu.nama_menu, tb_menu.harga, tb_menu.stok
                    from tb_menu order by id_menu";
            
            $res = $db->query($sql);

            if($res)
            {
    ?>      
                <form method="post" name="frm" action="P11-update.php">
                <table border="2">
                <tr><th>Id Menu</th>
                    <th>nama Menu</td>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Update Stok</th>
                </tr>
    <?php
                $data=$res->fetch_all(MYSQLI_ASSOC);
                foreach($data as $barisdata)
                {
                    ?>
                    <tr>
                        <td><?php echo $barisdata["id_menu"];?></td>
                        <td><?php echo $barisdata["nama_menu"];?></td>
                        <td><?php echo $barisdata["harga"];?></td>
                        <td><?php echo $barisdata["stok"];?></td>
                        <td><a style="text-decoration: none;" href="P11-update.php?id_menu=<?php echo $barisdata["id_menu"]?>">Update Stok</a></td>

                    </tr>    
                    
                    <?php
                }
            }
            else
            echo "GAGAL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
        }
        else
        echo "Gagal menampilkan data" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
        
    ?>
</body>