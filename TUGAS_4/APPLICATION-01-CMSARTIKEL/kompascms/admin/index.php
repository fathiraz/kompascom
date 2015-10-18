<?php
session_start();
$sesi = $_SESSION['sesi'];
$halaman = isset($_GET['page']) ? $_GET['page'] : "";
if ($_SESSION['sesi'] == "" || $_SESSION['sesi'] == NULL || empty($_SESSION['sesi'])) {
    echo "<meta http-equiv='refresh' content='0; url=../?page=login'>";
    exit;
} else {

    // fungsi untu menentukan halaman admin
    function tentuin_halaman_admin($halaman)
    {

        // ini cek pilihan dari menu yang di atas
        if ($halaman == "dashbor") {
            echo "halaman dashbor";
        } else if ($halaman == "kategori") {
            include "../kategori/index_kategori.php";
        } else if ($halaman == "post") {
            include "../post/index_post.php";
        } else if ($halaman == "logout") {
            logout();

            // ini cek pilihan dari menu PENGGUNA

        } else if ($halaman == "edit_pengguna") {
            include "../users/form_edit_pengguna.php";

            // ini cek pilihan dari menu POST

        } else if ($halaman == "input_post") {
            include "../post/form_input_post.php";
        } else if ($halaman == "edit_post") {
            include "../post/form_edit_post.php";
        } else if ($halaman == "hapus_post") {
            include "../post/hapus_post.php";

            // ini cek pilihan dari menu KATEGORI

        } else if ($halaman == "input_kategori") {
            include "../kategori/form_input_kategori.php";
        } else if ($halaman == "edit_kategori") {
            include "../kategori/form_edit_kategori.php";
        } else if ($halaman == "hapus_kategori") {
            include "../kategori/hapus_kategori.php";
        } else {
            echo "Welcome, <b>" . $_SESSION['sesi'] . ".</b> Silahkan pilih menu diatas untuk navigasi.";
        }
    }

    // fungsi logout
    function logout()
    {
        session_start();
        session_destroy();
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>kompascms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="../include/css/bootstrap.min.css" rel="stylesheet">
    <head>

    <body>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a class="navbar-brand">kompascms</a>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php
                    if ($halaman == "" || !isset($halaman)) {
                        echo "class='active'";
                    } ?>><a href="../admin/">Dashbor</a></li>
                    <li <?php
                    if ($halaman == "kategori" || $halaman == "edit_kategori" || $halaman == "input_kategori") {
                        echo "class='active'";
                    } ?>><a href="?page=kategori">Kategori</a></li>
                    <li <?php
                    if ($halaman == "post" || $halaman == "edit_post" || $halaman == "input_post") {
                        echo "class='active'";
                    } ?>><a href="?page=post">Post</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php
                            echo $sesi; ?></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="?page=edit_pengguna&id=<?php
                                echo $_SESSION['idsesi']; ?>">Edit pengguna</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="sm-col-12">
            <?php
            tentuin_halaman_admin($halaman);
            ?>
        </div>
    </div>
    <hr/>
    <div class="footer">
        <div class="container">
            <p><b>kompascms &copy; 2015</b></p>
        </div>
    </div>
    </div>
    <script src="../include/js/jquery.min.js"></script>
    <script src="../include/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.4.5/standard/ckeditor.js"></script>
    </body>
    </html>
    <?php
}
?>