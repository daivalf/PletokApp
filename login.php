<?php
    include_once("functions.php");
?>
<?php
    $db = dbConnect();
    if (isset($_POST["TblLogin"])) 
    {
        $id_pegawai = $db->escape_string($_POST["id_pegawai"]);
        $password = $db->escape_string($_POST["password"]);
        $sql = "SELECT id_pegawai, nama_pegawai
                FROM tb_pegawai
                WHERE id_pegawai = '$id_pegawai' and password = '$password'";
        $res = $db->query($sql);
        if ($res) 
        {
            if ($res->num_rows == 1) 
            {
                $data = $res->fetch_assoc();
                session_start();
                $_SESSION["id_pegawai"] = $data["id_pegawai"];
                $_SESSION["nama_pegawai"] = $data["nama_pegawai"];
                header("Location: transaksi.php");
            }
            else 
            {
                header("Location: index.php?error=1");
            }
        }
        else 
        {
            header("Location: index.php?error=2");
        }
    }
    else {
        header("Location: index.php?error=3");
    }
?>