<link rel="stylesheet" href="style.css">

<?php
define("DEVELOPMENT" , TRUE);

function dbConnect()
{
    $db = new mysqli("localhost", "root", "", "db_pletokapp");
    return $db;
}

function banner()
{
    ?>
    <div class="header" id="banner" align="center">
        <h1>Fish Market</h1>
    </div>
    <?php
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

?>