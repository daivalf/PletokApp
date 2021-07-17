<?php 
include_once("functions.php");
$db = dbconnect();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style_diaz.css">
<title>
    Daftar Menu
</title>

<head>
    <?php
    navigasi_P07();
    ?>
</head>

<body>
    <div class="background">
    </div>

    <h1>Daftar Menu</h1>

    <?php
        if($db -> connect_errno==0)
        {
            $sql = "select * from tb_menu";

            $res = $db->query($sql);
            if($res)
            {
    ?>
                <table border="2">
                <tr><th>ID Menu</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                </tr>
    <?php
                $data = $res->fetch_all(MYSQLI_ASSOC);
                foreach($data as $barisdata)
                {
    ?>
                    <tr>
                    <td><?php echo $barisdata["id_menu"];?></td>
                    <td><?php echo $barisdata["nama_menu"];?></td>
                    <td><?php echo $barisdata["harga"];?></td>

                    </tr>
    <?php
                }
            }
        }
        else
        echo "Gagal menampilkan data" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    ?>

</body>