<?php
$page = isset($_GET['page']) ? $_GET['page'] : "";
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>fathirazCMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="include/css/bootstrap.min.css" rel="stylesheet">
    <head>
    <body>
    <nav class="navbar navbar-default" role="navigation">
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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php
                    if ($page == "" || !isset($page)) {
                        echo "class='active'";
                    } ?>><a href="admin/..">Beranda</a></li>
                    <li <?php
                    if ($page == "login") {
                        echo "class='active'";
                    } ?>><a href="?page=login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        tentuin_halaman($page);
        ?>
    </div>
    <hr/>
    <div class="footer">
        <div class="container">
            <p><b>kompascms &copy; 2015</b></p>
        </div>
    </div>
    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/bootstrap.min.js"></script>
    </body>
    </html>
<?php
function tentuin_halaman($page)
{
    if ($page == "login") {
        include "login.php";
    } else if ($page == "kategori_blog") {
        include "blog/kategori_blog.php";
    } else if ($page == "lihat_blog") {
        include "blog/lihat_blog.php";
    } else {
        include "blog/index_blog.php";
    }
}

?>