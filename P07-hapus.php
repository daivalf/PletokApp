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
<head>
    <title>Hapus Data Pesanan</title>
</head>
<body>
    <h1>Hapus Data Pesanan</h1>
    <?php
        if (isset($_POST["TblHapus"])) 
        {
            $db = dbConnect();
            getListPelanggan();
            $nomor_pelanggan = $db->escape_string($_GET["nomor_pelanggan"]);
            if ($db->connect_errno == 0) 
            {
                $id_pesanan = $db->escape_string($_POST["id_pesanan"]);
                // susun query delete
                $sql = "DELETE FROM tb_pesanan WHERE id_pesanan='$id_pesanan'";
                // eksekusi query
                $res = $db->query($sql);
                if ($res) 
                {
                    if ($db->affected_rows > 0) // jika ada data terhapus
                    {
                        ?>
                        <script>
                            alert("Data berhasil dihapus");
                            window.location.href="P07.php";
                        </script>
                        <?php
                    }
                    else // jika sql sukses tapi tidak ada data dihapus
                    {
                        ?>
                        <script>
                            alert("Data gagal dihapus");
                            window.location.href="P07.php";
                        </script>
                        <?php
                    }
                }
                else // gagal query
                {
                    echo "Data gagal dihapus <br><br>";
                }
            }
            else 
            {
                echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
            }
        }
    ?>
</body>
</html>