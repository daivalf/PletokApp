<?php
    include_once("functions.php");
    $db=dbconnect();
?>

<!Doctype html>
<link rel="stylesheet" type="text/css" href="style_diaz.css">
<html>
    <title>Proses Tambah Pesanan</title>
    <body>
        

        <?php
        //navigasi_P22();
    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>"
        if($db-> connect_errno==0)
        {
            $idPesanan = $db->escape_string($_POST["idPesanan"]);
            $nomorPelanggan = $db->escape_string($_POST["nomorPelanggan"]);
            $namaPelanggan = $db->escape_string($_POST["namaPelanggan"]);
            $nomorMeja = $db->escape_string($_POST["nomorMeja"]);
            $tglPesan = $db->escape_string($_POST["tglPesan"]);

            $sql1 = "insert into tb_pelanggan values ('$nomorPelanggan','$nomorMeja', '$namaPelanggan', '$tglPesan')";            
            $sql2 = "insert into tb_pesanan values ('$idPesanan', '$nomorPelanggan', '$tglPesan')";

            //echo $sql1;
            //echo $sql2;

            $res=$db->query($sql1);
            $res=$db->query($sql2);

            if($res)
            {
                if($db->affected_rows > 0)
            {
                ?>
                    <script>
                        alert("Data Berhasil Ditambahkan");
                        window.location.href = "P07.php";
                    </script>
                        <a href="P07.php"><button class="btn">View List Pesanan</button></a>
                <?php
            }
            else
            {
                ?>
                     <script>
                        alert("Gagal Menambah Data Pesanan");
                        window.location.href = "P07.php";
                    </script>
                <?php
            }
            }
            else
            ?>
            <script>
                alert("Gagal Menambah Data Pesanan");
                window.location.href = "P07.php";
            </script>
            <?php
        }
        else
        echo "error : " .$db->connect_error."<br>";
        ?>
    </body>