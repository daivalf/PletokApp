<link rel="stylesheet" href="style.css">

<?php
    include_once("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="overflow: hidden;">
    <div class="backgroundlogin">
    <div class="loginbox">
        <h1>Welcome</h1>
        <form method="post" name="f" action="login.php">
            <div class="textbox">
                <input type="text" placeholder="Username" name="id_pegawai" maxlength="10" style="font-size: 30px;">
            </div>
            <div class="textbox">
                <input type="password" placeholder="Password" name="password" maxlength="40" style="font-size: 30px;">
            </div>
            <br>
                <input class="btnlogin" type="submit" name="TblLogin" value="Login">
        </form>
    </div>
    </div>

    <?php
        if (isset($_GET["error"]))
         {
            $error = $_GET["error"];
            if ($error ==1) 
            {
                showError("Username dan Password tidak sesuai");
            }
            else 
            if ($error == 2)
            {
                showError("Error database. Silahkan hubungi administrator");
            }
            else 
            if ($error == 3)
            {
                showError("Koneksi ke Database gagal. Autentikasi gagal.");
            }
            else 
            if ($error == 4)
            {
                showError("Anda tidak boleh mengakses halaman karena belum login.
                           Silahkan login.");
            }
            else 
            {
                showError("Unknown Error");
            }
        }
    ?>
</body>
</html>