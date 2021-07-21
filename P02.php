<?php
    session_start();
    if (!isset($_SESSION["id_pegawai"]) || ($_SESSION["jabatan"] != "Pelayan"))
    {
        header("Location: index.php?error=4");
    }
?>

<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style_diaz.css">
<title>
    Halaman Awal Pelayan
</title>

<head>
    <?php
    navigasi_pelayan();
    ?>
</head>

<body style="overflow: hidden;">
    <div class="container">
        <h2>SELAMAT DATANG</h2>
        <h2>- <?php echo $_SESSION["nama_pegawai"]; ?> -</h2>
    </div>
    
    <div class="background">
    </div>
</body>