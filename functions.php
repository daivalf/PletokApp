<?php

function dbconnect(){
    $db = new mysqli ("localhost", "root", "db_pletokapp");
    return $db;
}

function navigasi_pelayan()
{
    ?>
    <html>
        <head>
            <title>Home Pelayan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a href="">Daftar Meja</a></li>
                    <li><a href="P07.php">List Pesanan</a></li>
                    <li><a href="P08.php">Daftar Menu</a></li>
                    <li><a style="color: red;" href="">Logout</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_bartender()
{
    ?>
    <html>
        <head>
            <title>Home Pelayan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a href="">Buat Menu Baru</a></li>
                    <li><a href="">Konfirmasi Stok</a></li>
                    <li><a href="">List pesanan</a></li>
                    <li><a style="color: red;" href="">Logout</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_kasir()
{
    ?>
    <html>
        <head>
            <title>Home Kasir</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a href="">Konfirmasi Pembayaran</a></li>
                    <li><a href="">Laporan Pendapatan</a></li>
                    <li><a href="">Pengecekan Stok</a></li>
                    <li><a href="">List Pesanan</a></li>
                    <li><a style="color: red;" href="">Logout</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_owner()
{
    ?>
    <html>
        <head>
            <title>Home Owner</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a href="">Laporan Pendapatan</a></li>
                    <li><a href="">Konfirmasi Tambah Menu</a></li>
                    <li><a href="">Daftar Menu</a></li>
                    <li><a style="color: red;" href="">Logout</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_P07()
{
    ?>
    <html>
        <head>
            <title>List Pesanan pelayan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P02.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}


function navigasi_P08()
{
    ?>
    <html>
        <head>
            <title>Daftar Menu</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P02.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}
?>