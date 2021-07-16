<?php
include_once("functions.php");?>
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
        <table border="1" class="table">
        <tr>
            <th>Nomor Meja</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>01</td>
            <td>Tersedia</td>
        </tr>
        <tr>
            <td>02</td>
            <td>Tidak Tersedia</td>
        </tr>
        <tr>
            <td>03</td>
            <td>Tersedia</td>
        </tr>
        <tr>
            <td>04</td>
            <td>Tersedia</td>
        </tr>
        </table>
        
        <h1></h1>
        <button class="btn" href="M02.php">save</button>
        <button class="btn">reset</button>
    </body>