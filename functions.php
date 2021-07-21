<link rel="stylesheet" href="styledaiva.css">

<?php
define("DEVELOPMENT" , TRUE);

function dbconnect(){
    $db = new mysqli ("localhost", "root", "", "db_pletokapp");
    return $db;
}

function getListPesanan()
{
    $db=dbconnect();
    if($db->errno==0)
    {
        $res=$db->query("select * from tb_pesanan");
            if($res)
            {
                $data=$res->fetch_all(MYSQLI_ASSOC);
                return $data;
            }
            else 
                return false;
    }
    else
        return false;
}

function getListPelanggan()
{
    $db=dbconnect();
    if($db->errno==0)
    {
        $res=$db->query("select * from tb_pelanggan order by id_pelanggan");
            if($res)
            {
                $data=$res->fetch_all(MYSQLI_ASSOC);
                return $data;
            }
            else 
                return false;
    }
    else
        return false;
}

function getListMenu()
{
    $db=dbconnect();
    if($db->errno==0)
    {
        $res=$db->query("select * from tb_menu where stok='tersedia' order by id_menu");
            if($res)
            {
                $data=$res->fetch_all(MYSQLI_ASSOC);
                return $data;
            }
            else 
                return false;
    }
    else
        return false;
}

function getListMeja()
{
    $db=dbconnect();
    if($db->errno==0)
    {
        $res=$db->query("select * from tb_meja where tb_meja.status='tersedia' order by nomor_meja");
            if($res)
            {
                $data=$res->fetch_all(MYSQLI_ASSOC);
                return $data;
            }
            else 
                return false;
    }
    else
        return false;
}

function getDataMenuSementara($id_menu_sementara) {
    $db = dbConnect();
    if($db->errno==0) {
        $res=$db->query(("SELECT id_menu_sementara,nama_menu_sementara,harga_sementara
        FROM tb_menu_sementara
        WHERE id_menu_sementara='$id_menu_sementara'"));
        if($res) {
            $data=$res->fetch_assoc();
            
            return $data;
        }
        else
        return false;
    }
    else
    return false;
}

function getDataMenu($idMenu)
{
$db = dbConnect();
if ($db->connect_errno == 0) {
    $res = $db->query("select * from tb_menu
                       where id_menu='$idMenu'"); 
    if ($res) {
        if ($res->num_rows > 0) {
            $data = $res->fetch_assoc();
            $res->free();
        return $data;
        } else
            return FALSE;
    } else
        return FALSE;
} else
return FALSE;
}

function showError($message)
{
	?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <div class="showerror show">
        <span class="msg">
            <?php echo $message;?>
        </span>
        <span class="close-btn">
            <span class="fas fa-times"></span>
        </span>
    </div>

    <script>
         $('.close-btn').click(function(){
           $('.showerror').removeClass("show");
           $('.showerror').addClass("hide");
         });
    </script>

	<?php
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
                    <li><a href="P06.php">Daftar Meja</a></li>
                    <li><a href="P07.php">List Pesanan</a></li>
                    <li><a href="P08.php">Daftar Menu</a></li>
                    <li><a style="color: red;" href="logout.php">Logout</a></li>
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
                    <li><a href="P09.php">Buat Menu Baru</a></li>
                    <li><a href="P11.php">Konfirmasi Stok</a></li>
                    <li><a href="P10.php">List pesanan</a></li>
                    <li><a style="color: red;" href="logout.php">Logout</a></li>
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
                    <li><a href="P12.php">Konfirmasi Pembayaran</a></li>
                    <li><a href="P14.php">Pengecekan Stok</a></li>
                    <li><a href="P15.php">List Pesanan</a></li>
                    <li><a style="color: red;" href="logout.php">Logout</a></li>
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
                    <li><a href="P16.php">Laporan Pendapatan</a></li>
                    <li><a href="P17.php">Konfirmasi Menu</a></li>
                    <li><a href="P18.php">Daftar Menu</a></li>
                    <li><a style="color: red;" href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}
function navigasi_P06()
{
?>
    <html>
        <head>
            <title>List Meja</title>
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
function navigasi_P061()
{
?>
    <html>
        <head>
            <title>List Meja</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P06.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}
function getDataMeja($nomor_meja) {
    $db = dbConnect();
    if($db->errno==0) {
        $res=$db->query(("SELECT tb_meja.nomor_meja, tb_meja.status
        FROM tb_meja
        WHERE tb_meja.nomor_meja='$nomor_meja'"));
        if($res) {
            $data=$res->fetch_assoc();
            
            return $data;
        }
        else
        return false;
    }
    else
    return false;
}

function getDataPesanan($id_pesanan)
{
    $db = dbconnect();
    if ($db->errno==0) 
    {
        $res = $db->query("select tb_pesanan.id_pesanan, tb_pelanggan.nama_pelanggan, tb_pelanggan.nomor_pelanggan, tb_meja.nomor_meja, tb_pesanan.tgl_pemesanan
        from tb_pelanggan join tb_pesanan on tb_pelanggan.nomor_pelanggan = tb_pesanan.nomor_pelanggan
                          join tb_meja on tb_meja.nomor_meja = tb_pelanggan.nomor_meja ");
        if ($res) 
        {
            $data = $res->fetch_assoc();

            return $data;
        }
        else
        return false;
    }
    else
    return false;
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
                    <li><a style="color: red;" class="thick" href="P02.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_P071()
{
    ?>
    <html>
        <head>
            <title>Hapus Data Pesanan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" class="thick" href="P07.php">Back</a></li>
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
function navigasi_P09()
{
?>
    <html>
        <head>
            <title>Pengajuan Menu</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P03.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}
function navigasi_P17()
{
?>
    <html>
        <head>
            <title>List Meja</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P05.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}
function navigasi_P171()
{
?>
    <html>
        <head>
            <title>List Meja</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P17.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_P19()
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
                    <li><a style="color: red;" href="javascript:history.back();" class="thick">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_P22()
{
    ?>
    <html>
        <head>
            <title>Tambah List Pesanan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P07.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_P10()
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
                    <li><a style="color: red;" href="P03.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}


function navigasi_P11()
{
    ?>
    <html>
        <head>
            <title>Tambah List Pesanan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P11.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}


function navigasi_P23()
{
?>
    <html>
        <head>
            <title>Tambah Data Konfirmasi Pembayaran</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P12.php" class="thick">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_P18()
{
    ?>
    <html>
        <head>
            <title>Tambah List Pesanan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P05.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_P20()
{
    ?>
    <html>
        <head>
            <title>Tambah List Pesanan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="P10.php">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

function navigasi_P24()
{
    ?>
    <html>
        <head>
            <title>Tambah Data Rincian Pesanan</title>
            <link rel="stylesheet" type="text/css" href="navbar.css">
            <nav>
                <div class="logo">
                    <p>Pletok App</p>
                </div>
                <ul>
                    <li><a style="color: red;" href="javascript:history.back()" class="thick">Back</a></li>
                </ul>
            </nav>
        </head>
        <body>
        </body>
    </html>
    <?php
}

?>
